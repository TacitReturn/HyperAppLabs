<?php

namespace App\Observers;

use App\Mail\PostCreated;
use App\Mail\PostUpdated;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;
use \Illuminate\Support\Collection;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @return void
     */
    public function created(Post $post)
    {
        $emails = DB::table("emails")->get();

        $emailsAddresses = $emails->pluck("email");

        foreach($emailsAddresses as $email)
        {
            Mail::to($email)->send(new PostCreated($post));
        }

        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
        if (Mail::failures() != 0) {
            info("Emails have been sent successfully.");
        }

        info("Oops! There was some error sending the emails.");
    }

    /**
     * Handle the Post "updated" event.
     *
     * @return void
     */
    public function updated(Post $post)
    {
        $emails = DB::table("emails")->get();

        $emailsAddresses = $emails->pluck("email");

        foreach($emailsAddresses as $email)
        {
            Mail::to($email)->send(new PostUpdated($post));
        }

        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
        if (Mail::failures() != 0) {
            info("Emails have been sent successfully on " . Carbon::now());
        }

        info("Oops! There was some error sending the emails on " . Carbon::now());
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
