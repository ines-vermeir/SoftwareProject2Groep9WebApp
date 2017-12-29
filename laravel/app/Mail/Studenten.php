<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;


use DB;

class Studenten extends Mailable
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
    public function build()
    {   
        $vandaag = date("Y-m-d");
        $morgen = date("Y-m-d", strtotime($vandaag .'+ 1 days'));
        
        $quote_parent_results = DB::table('Students_enrolled_in_session')
            ->join('users', 'Students_enrolled_in_session.employeeIDenrolled', '=', 'users.odata_id')
            ->join('Sessions', 'Students_enrolled_in_session.sessionID', '=', 'Sessions.id')
            ->select('Students_enrolled_in_session.employeeIDenrolled', 'users.odata_id', 'Students_enrolled_in_session.sessionID', 'Sessions.date', 'users.email')
            ->where('Sessions.date', "=", $morgen)
            ->pluck('email');
        
        
        $to = $quote_parent_results->toArray();
        

        
        return $this->view('email')->with('nothing')->to($to)->from('gilltest@gmail.com', 'Human Resource Manager')->subject('Training Reminder');
    }
}
