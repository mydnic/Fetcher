<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['link', 'title', 'content', 'date'];

    public function source()
    {
        return $this->belongsTo('App\Source');
    }
}
