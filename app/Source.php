<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = ['feed_url'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
