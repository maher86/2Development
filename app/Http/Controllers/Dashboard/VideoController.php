<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\User;
use App\Notifications\CreateVideo;
use Illuminate\Support\Facades\Auth;
class VideoController extends Controller
{

    public function __construct(){     
       
        $this->middleware(['role:super_admin|admin'])->except('showVideo');
      }

    public function index(){
        $videos = Video::paginate(15);
        return view('layouts/dashboard/videosFront/videos',compact('videos'));
    }

    public function create(){
        return view('layouts/dashboard/videosFront/createVideo');
    }

    public function store(Request $request){
        $videoUploaded=new Video();
        $id = Auth::id();
        //dd($request->file('videoFile')->getMimeType());
        $this->validate(request(), [
            'title'     => ['required', 'string', 'max:255'],
            'body'      => ['required', 'string'],
            'category'  => ['exists:categories,id'],
            'video'     => ['mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi']
            
        ]);
        
        if($request->has('videoFile')){
            $video=$request->file('videoFile');
            $name = str_slug($request->input('videoFile')).'_'.time().'.'. $video->getClientOriginalExtension();
            $folder = '/uploads/videos';
            $filePath = $folder . $name;
            $path = $request->file('videoFile')->storeAs( $folder, $name,'public');
        // }else{
        //     $path =$page->image;
        }
            $videoUploaded->title = $request->input('title');
            $videoUploaded->body = $request->input('body');            
            $videoUploaded->url = $path;
            $videoUploaded->cat_id = $request->input('category');
            $videoUploaded->status =$request->input('status');
            $videoUploaded->user_id = $id;
            $videoUploaded->save();
            $admins = User::whereRoleIs('super_admin')->get();
            if($videoUploaded->status=="نشطة"){
             session()->flash('video created','تم إنشاء الصفحة بنجاح والمصادقة عليها ');
             }else{
                session()->flash('draft video','تم انشاء الصفحة بصيغة مسودة وهي بانتظار مصادقة المسؤول');
                foreach($admins as $admin){
                    $admin->notify(new CreateVideo($id,$videoUploaded->id));
                     
                 }
            }  
            
            return redirect('/videos');
         }


         public function destroy(Video $video){
            $video->delete();
            //here we will delete all things related with page like comments and image on disk
            session()->flash('pagedeleted','تم حذف الصفحة بنجاح');
            return back();
         }



         public function edit(Video $video){
            return view('layouts/dashboard/videosFront/editForm',compact('video'));

         }

         public function update(Request $request,Video $video){

            $this->validate(request(), [
                'title'     => [ 'string', 'max:255'],
                'body'      => [ 'string'],
                'category'  =>['exists:categories,id'],
                'videoFile' =>['mimes:mp4,mov,ogg,qt,avi'],
            ]);
            
            if($request->has('videoFile')){
                $videohandler=$request->file('videoFile');
                $name = str_slug($request->input('videoFile')).'_'.time().'.'. $videohandler->getClientOriginalExtension();
                $folder = '/uploads/videos';
                $filePath = $folder . $name;
                $path = $request->file('videoFile')->storeAs( $folder, $name,'public');
             }else{
                 $path =$video->video;
            }
            $video->url = $path;
            $video->update($request->all());
            //notify here if page status goes to draft
            return redirect('/videos');
               

         }


         public function showVideo(Video $video){

            return view('layouts/endUserUi/videoPage',compact('video'));
         }

         public function searchVideos(Request $request){

            $request->validate([
                'q'=> 'required',
            ]);
            $q = $request->q;
            $filteredVideos = video::where('title','like','%'.$q.'%')
                                    ->orWhere('id','like','%'.$q.'%')
                                    ->orWhere('status','like','%'.$q.'%')
                                    ->paginate(15);
             
            if($filteredVideos->count()){
                return view('layouts.dashboard.videosFront.videos')->with([
                    'videos'=> $filteredVideos
                ]);
        
            } else {
                return redirect('/videos')->with([
                    'status' => 'فشل البحث .. رجاءا حاول مجدداً'
                ]);
            }   
        }                  

}
