<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build(request $request)
    {   
        $data = array(
            'voornaam' => 'gill',
            'achternaam' => 'steens',
            'email' => 'gillsteens@gmail.com',
            'telefoon' => '0496',
            'gemeente' => 'halle',
            'bericht' => 'test',
        );
        
        $recipients = ['gillsteens@gmail.com','student@winwatt.eu'];

        return $this->view('emails.test')->with($data)->to($recipients)->from($request->email,$request->voornaam)->subject('Contact Aanvraag Website');
    }
}
