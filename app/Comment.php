<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    public $timestamps = false;

    /**
     * Get the post on which was posted the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
