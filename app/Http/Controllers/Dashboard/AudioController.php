<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Audio;
use App\User;
use App\Notifications\CreateAudio;
use Illuminate\Support\Facades\Auth;
class AudioController extends Controller
{
    public function __construct(){
       
       
        $this->middleware(['role:super_admin|admin']);
      }
    public function index(){
        $audios = Audio::paginate(15);
        return view('layouts/dashboard/audiosFront/audios',compact('audios'));
    }

    public function create(){
        return view('layouts/dashboard/audiosFront/createAudio');
    }

    public function store(Request $request){
        $audioUploaded=new Audio();
        $id = Auth::id();
        $this->validate(request(), [
            'title'     => ['required', 'string', 'max:255'],
            'body'      => ['required', 'string'],
            'catergory' => ['required','string'],
            'audioFile'=>['mimes:audio/mpeg,mpga,mp3,wav,aac'],
            
        ]);
        
        if($request->has('audioFile')){
            $audio=$request->file('audioFile');
            $name = str_slug($request->input('audioFile')).'_'.time().'.'. $audio->getClientOriginalExtension();
            $folder = '/uploads/audios';
            $filePath = $folder . $name;
            $path = $request->file('audioFile')->storeAs( $folder, $name,'public');
        // }else{
        //     $path =$page->image;
        }
            $audioUploaded->title = $request->input('title');
            $audioUploaded->body = $request->input('body');            
            $audioUploaded->url = $path;
            $audioUploaded->status =$request->input('status');
            $audioUploaded->user_id = $id;
            $audioUploaded->cat_id = $request->input('category');
            $audioUploaded->save();
            $admins = User::whereRoleIs('super_admin')->get();
             if($audioUploaded->status=="نشطة"){
             session()->flash('audio created','تم إنشاء البودكاست بنجاح والمصادقة عليها ');
             }else{
                session()->flash('draft audio','تم انشاء البودكاست بصيغة مسودة وهي بانتظار مصادقة المسؤول');                
            } 
            foreach($admins as $admin){
                $admin->notify(new CreateAudio($id,$audioUploaded->id)); 
             }
            return redirect('/audios');
         }


         public function destroy(Audio $audio){
            $audio->delete();
            //here we will delete all things related with page like comments and image on disk
            session()->flash('pagedeleted','تم حذف الصفحة بنجاح');
            return back();
         }



         public function edit(Audio $audio){
            return view('layouts/dashboard/audiosFront/editForm',compact('audio'));

         }

         public function update(Request $request,Audio $audio){

            $this->validate(request(), [
                'title'     => [ 'string', 'max:255'],
                'body'      => [ 'string'],
                'audioFile'=>['mimes:audio/mpeg,mpga,mp3,wav,aac'],
                'category' =>['string']
            ]);
            
            if($request->has('audioFile')){
                $audiohandler=$request->file('audioFile');
                $name = str_slug($request->input('audioFile')).'_'.time().'.'. $audiohandler->getClientOriginalExtension();
                $folder = '/uploads/audios';
                $filePath = $folder . $name;
                $path = $request->file('audioFile')->storeAs( $folder, $name,'public');
             }else{
                 $path =$audio->url;
            }
            $audio->url = $path;
            $audio->update($request->all());
            //notify here if page status goes to draft
            return redirect('/audios');
               

         }

         public function showAudios(){

            return view('layouts/endUserUi/audios');
         }

         public function showAudio(Audio $audio){

            return view('layouts/endUserUi/audioPage',compact('audio'));
         }


         public function searchAudios(Request $request){

            $request->validate([
                'q'=> 'required',
            ]);
            $q = $request->q;
            $filteredAudios = Audio::where('title','like','%'.$q.'%')
                                    ->orWhere('id','like','%'.$q.'%')
                                    ->orWhere('status','like','%'.$q.'%')
                                    ->paginate(15);
             
            if($filteredAudios->count()){
                return view('layouts.dashboard.audiosFront.audios')->with([
                    'audios'=> $filteredAudios
                ]);
        
            } else {
                return redirect('/audios')->with([
                    'status' => 'فشل البحث .. رجاءا حاول مجدداً'
                ]);
            }   
        }                    
}
