<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [''];

    public function getRouteKeyName()
    {
        return 'label';
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
    	return $this->morphToMany(Tag::class, 'taggable');
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function stream()
    {
    	return $this->where('stream_id', '!=', 0)->belongsTo(Stream::class, 'stream_id');
    }
}
