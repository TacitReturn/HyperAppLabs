<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostCreated extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $post;

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
//        url(secure_asset('storage/' . $post->image)) }}
//        attachData(Storage::get($this->post->image), Str::random(16))
        return $this->subject($subject)->view('emails.posts.created');
    }
}