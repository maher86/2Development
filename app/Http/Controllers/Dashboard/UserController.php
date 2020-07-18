<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Notifications\AddingUser;
use App\Notifications\DeleteUser;
use Illuminate\Support\Facades\Auth;
use DB;



class UserController extends Controller
{


    public function __construct(){
       
        $this->middleware(['role:super_admin|admin']);  
        //$this->middleware(['role:super_admin|admin']);
      }
    public function index()
    {
        $users=User::paginate(15);
        return view('layouts/dashboard/users',compact('users'));
    }

    public function updateAvatar(Request $request){

    }

    public function showProfile(User $user){
        return view('layouts/dashboard/profile',compact('user'));
    }

    public function edit(User $user){
        if(!$user) {
            abort('404');
        }
        return view('layouts/dashboard/edit',Compact('user'));
    }

    public function update(Request $request,User $user){

        $request->validate([
            'name'=>'required',
            'roles'=>'required|array|min:1'
        ]);
        $requestData=$request->except('email');
        $user->update($requestData);
        $user->syncRoles($request->roles);
       // $user->roles()->sync($request->roles);
        session()->flash('success','تم تعديل معلومات المستخدم بنجاح');
        return redirect('/users');


    }


public function searchUser(Request $request){

    $request->validate([
        'q'=> 'required',
    ]);
    $q = $request->q;
    $filteredUsers = User::where('name','like','%'.$q.'%')
                            ->orWhere('email','like','%'.$q.'%')
                            ->paginate(15);
     
    if($filteredUsers->count()){
        return view('layouts.dashboard.users')->with([
            'users'=> $filteredUsers
        ]);

    } else {
        return redirect('/users')->with([
            'status' => 'فشل البحث .. رجاءا حاول مجدداً'
        ]);
    }                       
    // if($request->ajax())
    //     {
    //     $output="";
    //     $users=DB::table('users')
    //         ->where('name','LIKE','%'.$request->search."%")
    //         ->orWhere('email','LIKE','%'.$request->search."%")
    //         ->get();
    //     if($users)
    //     {
    //     foreach ($users as $key => $user) {
    //     $output.='<tr>'.
    //     '<td>'.$user->id.'</td>'.
    //     '<td>'.$user->name.'</td>'.
    //     '<td>'.$user->email.'</td>'.
    //     '<td></td>'.
    //     '</tr>';
    //     }//foreach
    //     return Response($output);
    //     }else{
    //         $output = '
    //    <tr>
    //     <td align="center" colspan="5">No Data Found</td>
    //    </tr>
    //    ';
    //     }
    // }
}
    



    public function delete($id)
    {   
        $user=User::find($id); 
        $user->delete();
        session()->flash('deleting user','تم حذف المستخدم');
        // $admins = User::whereRoleIs('super_admin')->get();
        // foreach($admins as $admin){
        //     $admin->notify(new DeleteUser($id,Auth::id()));
        // }

        return redirect()->back();
    }

    public function addUser(Request $request)
    {
        //$request = app('request');
        // if($request->has('image')){
        //     $image=$request->file('image');
        //     $name = str_slug($request->input('image')).'_'.time().'.'. $image->getClientOriginalExtension();
        //     $folder = '/uploads/avatars';
        //     $filePath = $folder . $name;
        //     $path = $request->file('image')->storeAs( $folder, $name,'public');}
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),            
            'password'=>bcrypt('secret')
            
        ]);
       
        $user->syncRoles($request->roles);
        session()->flash('adding user','تم إضافة المستخدم بنجاح');
        $admins = User::whereRoleIs('super_admin')->get();
        foreach($admins as $admin){
            $admin->notify(new AddingUser($user->id,Auth::id()));
        }
        
        return redirect('/users');      
        
    }

 public function showAddingForm(){
     return view('layouts/dashboard/addUserByAdmin');
 }

public function showEditProfileForm(User $user){
    $user = Auth::user();
    return view('layouts/dashboard/editProfile', compact('user'));
}

public function updateProfile(User $user){
   
    $this->validate(request(), [
        'name' => [ 'string', 'max:255'],
        'email' => [ 'string', 'email', 'max:255'],
        'password' => ['sometimes','string', 'min:6', 'confirmed'],
        'image'=>['mimes:jpeg,png'],
    ]);
    $request = request();
    if($request->has('image')){
        $image=$request->file('image');
        $name = str_slug($request->input('image')).'_'.time().'.'. $image->getClientOriginalExtension();
        $folder = '/uploads/avatars';
        $filePath = $folder . $name;
        $path = $request->file('image')->storeAs( $folder, $name,'public');
    }else{
        $path =$user->avatar;
    }
        $requestData=$request->except('image');
        $user->avatar = $path;
        $user->update($requestData);
        // $user->name = request('name');
        // $user->email = request('email');
        // $user->password = bcrypt(request('password'));
        
        //$user->save();
        session()->flash('profile updated','تم تحديث معلومات حسابك بنجاح');


        return back();
            
 }

}


