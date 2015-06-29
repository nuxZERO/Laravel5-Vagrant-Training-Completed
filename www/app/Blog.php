<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function blogTags()
    {
        return $this->hasMany('App\BlogTag', 'blog_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'blog_tag', 'blog_id', 'tag_id');
    }
}
