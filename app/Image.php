<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'size', 'article_id'];

    public function article() {

        return $this->belongsTo('App\Article')->withTimestamps();
    }
}
