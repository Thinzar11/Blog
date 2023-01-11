<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function create()
    {
        $validator = validator(request()->all(),[
            'article_id' => 'required',
            'content' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }


        $comment = new comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return back()->with('info','A Comment Created');
    }

    public function delete($id){
        $comment = comment::find($id);
       

        if(Gate::allows('comment-delete',$comment)){
            $comment->delete();
            return back()->with("info","A comment deleted");
        }

        return back()->with("info","Unthorize to delete");

    }
}
