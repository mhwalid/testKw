<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContacterMail extends Mailable
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
        return $this->view('emails.contacter')
                    ->with([
                        'reason' => $this->request->input('reason'),
                        'compagny' => $this->request->input('compagny'),
                        'fname' => $this->request->input('fname'),
                        'lname' => $this->request->input('lname'),
                        'email' => $this->request->input('email'),
                        'phone' => $this->request->input('phone'),
                        'msg' => $this->request->input('msg'),
                    ]);
    }
}
