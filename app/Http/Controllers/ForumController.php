<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewTopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){
        return view('forum.forum', [
            'topics' =>Topic::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function store(CreateNewTopic $request){

        if($request->validated()){

            $request['user_id']= auth()->id();

            $topic = new Topic([
                'title' => $request->title,
                'content'=>$request->content,
                'user_id' => $request['user_id'],
            ]);
            $topic->save();

            return redirect()->route('forum')->with('success', 'Uspesno objavljeno');
        }
        else {
            return redirect()->route('forum')->with('fail', $request->validated())->writeInput();
        }
    }

    public function show($id=null){

        return view('forum.topic', ['topic' => Topic::find($id)]);
    }

    public function destroy($id=null){

        $topic=Topic::findOrFail($id);

        if(auth()->user()->id===$topic->user_id){
            $topic->delete();

            return redirect()->route('forum')->with('success', "Deleted successfuly");
        }
        else {
            return redirect()->back()->with('error', "Unauthorized");
        }
    }
}
