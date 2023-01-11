<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','home']);
    }

    public function home(){
        $article = Article::latest()->limit(3)->get();
        return view('articles.home',[
            'articles' => $article,
        ]);
    }
    public function index()
    {
        $categories = Category::all();

        if(request()->has('q')){
            $search_text = request()->q;
            $article = Article::where('title', 'LIKE' , '%'.$search_text.'%')->paginate(1);
        }else{
            $article = Article::latest()->paginate(6);
        }

        return view("articles.index",[
            'articles' => $article,
            'category' => $categories,
        ]);


    }

    public function add()
    {
        $categories = Category::All();
        $users = User::all();
        return view('articles.add',[
            'category' => $categories,
            'user' => $users,
        ]);
    }

    public function create()
    {
        $validator = validator(request()->all(),[
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        if(request()->hasfile('photo'))
        {
            $file = request()->file("photo");
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/articles/',$filename);
            $article->photo = $filename;
        }
        $article->category_id = request()->category_id;
        $article->user_id = request()->user_id;
        $article->save();
        return redirect('/articles/add')->with('info','An article created Successfully');
    }

    public function detail($id)
    {
        $data = Article::find($id);
        return view('articles.detail',[
            'article' => $data,
        ]);
    }
}
