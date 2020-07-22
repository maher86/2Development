<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Video;
use App\page;
use App\Audio;
use App\User;
use App\GusetComment;
use App\Notifications\CreateGusetComment;
use App\Notifications\CreateUserComment;

use App\Notifications\CreatePage;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function saveVideoComment(Request $request,$id){
        $this->validate(request(), [            
            'body'      => ['required', 'string'],          
            
        ]);
        $video=Video::find($id);
        $admins = User::whereRoleIs('super_admin')->get();
        if(Auth::check()){
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $comment->status = "مسودة";
        $comment->commentable()->associate($video);        
        $comment->save();
        foreach($admins as $admin){
            $admin->notify(new CreateUserComment($id,Auth::id(),'App\Video'));                     
         }
        }else{
        $comment = new GusetComment();
        $comment->body = $request->input('body');
        $comment->status = "مسودة";
        $comment->commentable()->associate($video);
        $comment->save();
        foreach($admins as $admin){
            $admin->notify(new CreateGusetComment($id,'App\Video'));                     
         }
        }
        return redirect('/videos/'.$id);
    }

    public function savePostComment(Request $request,$id){
        $this->validate(request(), [            
            'body'      => ['required', 'string'],          
            
        ]);
        $page=Page::find($id);
        if(Auth::check()){
            $comment = new Comment();
            $comment->body = $request->input('body');
            $comment->user_id = Auth::id();
            $comment->commentable()->associate($page);        
            $comment->save();
            }else{
            $comment = new GusetComment();
            $comment->body = $request->input('body');
            $comment->commentable()->associate($page);
            $comment->save();
            }
        return redirect('/pages/'.$id);
    }

    public function saveAudioComment(Request $request,$id){
        $this->validate(request(), [            
            'body'      => ['required', 'string'],           
            
        ]);
        $audio=Audio::find($id);
        if(Auth::check()){
            $comment = new Comment();
            $comment->body = $request->input('body');
            $comment->user_id = Auth::id();
            $comment->commentable()->associate($audio);        
            $comment->save();
            }else{
            $comment = new GusetComment();
            $comment->body = $request->input('body');
            $comment->commentable()->associate($audio);
            $comment->save();
            }
        return redirect('/podcasts/'.$id);
    }
    
}
