<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $table = 'blog_tag';


    public function blog()
    {
        return $this->belongsTo('App\Blog', 'blog_id');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag', 'tag_id');
    }
}
