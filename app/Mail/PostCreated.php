<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;

class PostCreated extends Mailable
{
    use Queueable;
    use SerializesModels;

    public Post $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        $subject = "A new post has been created: {$this->post->title}";
        
        return $this->subject($subject)->view('emails.posts.created');
    }
}
