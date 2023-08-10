<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactForm;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $contactForm;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactForm $contactForm)
    {
        $this->contactForm = $contactForm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "New Business Inquiry {$this->contactForm->name}";

        return $this->subject($subject)->view('contact-form.blade.php');
    }
}
