<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public $date = ['created_at', 'updated_at'];

    public function images()
    {

        return $this->belongsToMany('App\Article')->withTimeStamps();
    }
}
