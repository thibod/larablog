<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewComment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentPublished
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to('admin@admin.com')->send(new NewComment($event->comment));
    }
}
