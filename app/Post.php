<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Get the user that authored the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the post's comments'
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }
}
