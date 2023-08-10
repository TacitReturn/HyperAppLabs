<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreated extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $post;

    public function __construct(Post $post)
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
        $subject = "A new post {$this->post->title}";

        return $this->subject($subject)->view('emails.posts.created');
    }
}
