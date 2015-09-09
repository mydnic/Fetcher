<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $fillable = ['link', 'title', 'content', 'date'];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    public function source()
    {
        return $this->belongsTo('App\Source');
    }
}
