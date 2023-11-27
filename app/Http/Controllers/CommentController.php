<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNewComment;
use App\Http\Requests\DeleteComment;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(CreateNewComment $request){

        if($request->validated()){

            $comment= new Comment ([

                'comment_content' => $request->comment_content,
                'user_id' => auth()->id(),
                'topic_id' => $request->topic_id,

            ]);

            $comment->save();

            return redirect()->route('forum')->with('success', 'Uspesno objavljeno');
        }
    }

    public function destroy($id=null){

        $comment=Comment::findOrFail($id);

        if(auth()->user()->id===$comment->user_id){

            $comment->delete();

            return redirect()->route('forum.topic', ['id'=>$comment->topic_id])->with('success', "Uspesno obrisan komentar");
        }
        else {
            return redirect()->back()->with('error', "Doslo je do greske");
        }
    }
}
