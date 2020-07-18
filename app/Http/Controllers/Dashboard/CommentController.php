<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Video;
use App\page;
use App\Audio;
use App\User;
use App\Notifications\CreatePage;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function saveVideoComment(Request $request,$id){
        $this->validate(request(), [            
            'body'      => ['required', 'string'],          
            
        ]);
        $video=Video::find($id);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $comment->commentable()->associate($video);        
        $comment->save();
        return redirect('/videos/'.$id);
    }

    public function savePostComment(Request $request,$id){
        $this->validate(request(), [            
            'body'      => ['required', 'string'],          
            
        ]);
        $page=Page::find($id);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $comment->commentable()->associate($page);        
        $comment->save();
        return redirect('/pages/'.$id);
    }

    public function saveAudioComment(Request $request,$id){
        $this->validate(request(), [            
            'body'      => ['required', 'string'],           
            
        ]);
        $audio=Audio::find($id);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $comment->commentable()->associate($audio);        
        $comment->save();
        return redirect('/podcasts/'.$id);
    }
    
}
