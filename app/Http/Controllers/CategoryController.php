<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::find($id);
        $category->all();
        $article = Article::all();
        return view("articles.index",[
            'articles' => $article,
            'category' => $category,
        ]);
    }
}
