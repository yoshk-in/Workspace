<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\CreateArtilceRequest;
use App\Tag;
use Carbon\Carbon;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all()->pluck('name');

        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArtilceRequest $request)
    {

        $article = Article::create($request->all());

        $article->updateTags($request, $article);

        $article->uploadImages($request, $article);

        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        $images = $article->images;

        $tags = $article->tags->all();

        return view('articles.show', compact('article', 'images', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        $images = $article->images;

        $tags = Tag::pluck('name')->toArray();

        $selected_tags = $article->tags()->pluck('name')->toArray();

        return view('articles.edit', compact('article', 'images', 'tags', 'selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateArtilceRequest $request, $id)
    {

        $article = Article::findOrFail($id);

        $article->updated_at = Carbon::now();

        $article->update($request->all());

        $article->save();

        $article->updateTags($request, $article);

        $article->uploadImages($request, $article);

        return redirect()->action('ArticleController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $article->deleteImages($article);

        $article->tags()->detach();

        $article->delete();

        return redirect('articles');
    }

}
