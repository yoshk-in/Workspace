<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{

    protected $fillable = [
        'title',
        'body',
    ];

    public function images()
    {

        return $this->hasMany('App\Image');
    }

    public function tags()
    {

        return $this->belongsToMany('App\Tag');
    }

    public function uploadImages($request, $article)
    {
        if ($uploads = $request->file('images')) {

            foreach ($uploads as $upload) {

                $path = $upload->store('images', 'public');

                $size = Storage::size('public/' . $path);

                Image::create(['path' => $path, 'size' => $size, 'article_id' => $article->id]);
            }
            return true;
        }
        return false;
    }

    public function deleteImages($article)
    {

        if ($article->images->first()) {

            foreach ($article->images as $image) {

                $image->delete();

                Storage::delete('/public/' . $image->path);
            }
            return true;
        }
        return false;
    }

    public function updateTags($request, $article)
    {

        $article->tags()->detach();

        if ($request->tags) {

            foreach (($request->tags) as $tag) {

                $tag = Tag::where('name', $tag)->first() ?: Tag::create(['name' => $tag, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

                $article->tags()->attach($tag->id);
            }
            return true;
        }
        return false;
    }

}
