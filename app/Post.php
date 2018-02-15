<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{



    protected $fillable = [

      'title',


    ];



    public function photo()
    {
      return $this->belongsTo('App\Photo');
    }

    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }
}
