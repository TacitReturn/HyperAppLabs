<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Post $post)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Updates made to {$this->post->title}";

        return $this->subject($subject)->view('emails.posts.updated');
    }
}
