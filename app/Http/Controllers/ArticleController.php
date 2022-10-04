<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit']);
    }

    public function index()
    {
        $articles = Article::all();
        return view('articles.index',compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());
        $article->user_id = Auth::user()->id;
        if($request->hasFile('photo')) {
            $article
                ->addMediaFromRequest('photo')
                ->toMediaCollection('article');
        }
        $article->save();
        return redirect(route('articles.index'));
    }

    public function edit($id)
    {
        $model = Article::findOrFail($id);
        return view('articles.edit',compact('model'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        $article->user_id = Auth::user()->id;
        if($request->hasFile('photo')) {
            $article
                ->clearMediaCollection('article')
                ->addMediaFromRequest('photo')
                ->toMediaCollection('article');
        }
        $article->save();
        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index');
    }
}
