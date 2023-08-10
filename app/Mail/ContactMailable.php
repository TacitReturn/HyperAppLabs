<?php

namespace App\Mail;

use App\Models\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $contactForm;

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

        return $this->subject($subject)->view('emails.contact-form');

        return $this->from('example@example.com')
            ->markdown('emails.contact-form', [
                'contactForm' => $this->contactForm,
            ]);
    }
}
