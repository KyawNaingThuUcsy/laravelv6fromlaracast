<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name',request('tag'))->firstOrFail()->articles;
        }else{
            $articles = Article::latest()->get();
        }

        return view('articles.index',['articles'=>$articles]);
    }
    public function show(Article $article)
    {
        return view('articles.show',['article'=>$article]);
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store()
    {
        // request()->validate([
        //     'title'=>'required',
        //     'excerpt'=>'required',
        //     'body'=>'required'
        // ]);

        // $article = new Article();
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');
        // $article->save();

        // Article::create([
        //     'title' => request('title'),
        //     'excerpt' => request('excerpt'),
        //     'body' => request('body'),
        // ]);

        Article::create($this->validateArticle());

        return redirect(route('articles.index'));

    }
    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }
    public function update(Article $article)
    {    
        $article->update($this->validateArticle());
        
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');
        // $article->save();

        return redirect($article->path());
    }
    protected function validateArticle()
    {
        return request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);
    }
}
