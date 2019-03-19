<?php

namespace App\Mail;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewComment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The post instance.
     *
     * @var Post
     */
    protected $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('back.emails.newCommentNotif');
    }
}
