<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForeignMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.foreign_register')
                    ->with([
                        'civiliter' => $this->request->input('contact_civility'),
                        'nom' => $this->request->input('contact_name'),
                        'firstName' => $this->request->input('contact_firstName'),
                        'phoneNumber' => $this->request->input('contact_phoneNumber'),
                        'compagnyName' => $this->request->input('contact_compagny_name'),
                        'country' => $this->request->input('contact_country'),
                        'mail' => $this->request->input('contact_email'),
                        'messages' => $this->request->input('contact_message'),
                    ]);
    }
}
