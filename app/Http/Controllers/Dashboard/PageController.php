<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\User;
use App\Notifications\CreatePage;
use Illuminate\Support\Facades\Auth;
use DB;

class PageController extends Controller
{

    public function __construct(){       
       
        $this->middleware(['role:super_admin|admin']);
      }

    public function index(){
        $pages = Page::paginate(15);
        return view('layouts/dashboard/pagesFront/pages',compact('pages'));
    }

    public function create(){
        return view('layouts/dashboard/pagesFront/createPage');
    }

    public function store(Request $request){
        $page=new Page();
        $id = Auth::id();
        $this->validate(request(), [
            'title'     => ['required', 'string'],
            'body'      => ['required', 'string'],
            'category'  => ['exists:categories,id'],
            'imagePage'=>['required','mimes:jpeg,png,JPG,jpg'],
        ]);
        
        if($request->has('imagePage')){
            $image=$request->file('imagePage');
            $name = str_slug($request->input('imagePage')).'_'.time().'.'. $image->getClientOriginalExtension();
            $folder = '/uploads/pageImages';
            $filePath = $folder . $name;
            $path = $request->file('imagePage')->storeAs( $folder, $name,'public');
         }else{
            $path =$page->url;
        }
            $page->title = $request->input('title');
            $page->body = $request->input('body');            
            $page->url = $path;
            $page->status =$request->input('status');
            $page->user_id = $id;
            $page->category_id  = $request->input('category');
            $page->save();
            $admins = User::whereRoleIs('super_admin')->get();
             if($page->status=="نشطة"){
             session()->flash('page created','page created');
             }else{
                session()->flash('draft page','تم انشاء الصفحة بصيغة مسودة وهي بانتظار مصادقة المسؤول');
                foreach($admins as $admin){
                    $admin->notify(new CreatePage($id,$page->id)); 
                } 
            } 
            
            return redirect('/pages');
         }


         public function destroy(Page $page){
            $page->delete();
            //here we will delete all things related with page like comments and image on disk
            session()->flash('pagedeleted','تم حذف الصفحة بنجاح');
            return back();
         }



         public function edit(Page $page){
            return view('layouts/dashboard/pagesFront/editForm',compact('page'));

         }

         public function update(Request $request,Page $page){

            $this->validate(request(), [
                'title'     => ['required', 'string', 'max:255'],
                'body'      => ['required', 'string' ],
                'category'  => ['exists:categories,id'],
                'imagePage'=>['mimes:jpeg,png'],
            ]);
            
            if($request->has('imagePage')){
                $image=$request->file('imagePage');
                $name = str_slug($request->input('imagePage')).'_'.time().'.'. $image->getClientOriginalExtension();
                $folder = '/uploads/pageImages';
                $filePath = $folder . $name;
                $path = $request->file('imagePage')->storeAs( $folder, $name,'public');
             }else{
                 $path =$page->url;
            }
            $page->url = $path;
            $page->update($request->all());
            session()->flash('pageedited','تم حذف الصفحة بنجاح');
            //notify here if page status goes to draft
            return redirect('/pages');
               

         }

         public function showPage(Page $page){

            return view('layouts/endUserUi/postPage',compact('page'));
         }

//          public function searchPages(Request $request){
//             if($request->ajax())
//             {
//             $output="";
//             $pages=DB::table('pages')->where('title','LIKE','%'.$request->search."%")->get();
//             if($pages)
//             {
//             foreach ($pages as $key => $page) {
//             $output.='<tr role="row" class="odd">
//             <td class="sorting_1">
//            $page->id</td>
//             <td>{{$page->title}}</td>
            
//             <td>{{$page->status}}
//             </td>
            
//             <td>{{$page->user->name}}
//             </td>
//             <td><button onclick="callRoute('. $page->id .')" class="btn btn-primary btn-sm"><i class="fa  fa-edit" style="padding-left:10px"></i>تحرير</button>
            
//             <form action="{{ route("pages.destroy", $page) }}" method="POST" style="display:inline-block">
              
              
//               <button onclick="return confirm("!هل أنت متأكد من هذا الإجراء ..لا يمكن التراجع عنه؟")" class="btn btn-danger btn-sm"><i class="fa  fa-trash-o" style="padding-left:10px"></i>حذف</button>
              
//             </form>
           
//             </td>
            
          
          
            
//           </tr>';
//             }
//             return Response($output);
//             }
//             }
// }

public function searchPages(Request $request){

    $request->validate([
        'q'=> 'required',
    ]);
    $q = $request->q;
    $filteredPages = Page::where('title','like','%'.$q.'%')
                            ->orWhere('id','like','%'.$q.'%')
                            ->orWhere('status','like','%'.$q.'%')                            
                            ->paginate(15);
     
    if($filteredPages->count()){
        return view('layouts.dashboard.pagesFront.pages')->with([
            'pages'=> $filteredPages
        ]);

    } else {
        return redirect('/pages')->with([
            'status' => 'فشل البحث .. رجاءا حاول مجدداً'
        ]);
    }   
}                    

}

