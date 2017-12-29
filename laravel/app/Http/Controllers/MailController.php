<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Mail\Studenten;

class MailController extends Controller
{
   
    
    public function studentenMail()
    {
    	Mail::send(new Studenten());
    }
    
    public function send()
    {
        $vandaag = date("Y-m-d");
        $morgen = date("Y-m-d", strtotime($vandaag .'+ 1 days'));
        
        $quote_parent_results = DB::table('Students_enrolled_in_session')
            ->join('users', 'Students_enrolled_in_session.employeeIDenrolled', '=', 'users.odata_id')
            ->join('Sessions', 'Students_enrolled_in_session.sessionID', '=', 'Sessions.id')
            ->select('Students_enrolled_in_session.employeeIDenrolled', 'users.odata_id', 'Students_enrolled_in_session.sessionID', 'Sessions.date', 'users.email')
            ->where('Sessions.date', "=", $morgen)
            ->pluck('email');
        
        $resultArray = json_decode(json_encode($quote_parent_results), true);
        
        
        for ($i=0; $i<count($resultArray);$i++){
            Mail::send(['html'=>'mail'], array('quote_parent_results'=>$quote_parent_results), function($message){
                
                
            $message->to($resultArray[i]['email'])->subject('test email');
            $message->from('gillsteens@gmail.com', 'From Gill');
        });
            
        }
        
//        Mail::send(['html'=>'mail'], array('quote_parent_results'=>$quote_parent_results), function($message){
//            $message->to('gill.steens@student.ehb.be', 'To Student')->subject('test email');
//            $message->from('gillsteens@gmail.com', 'From Gill');
//        
//        
//        
//        
//        
//        });
        
    }
    
    public function sendmail(Request $request) {
        
        

            
            

               Mail::send('email', ['title' => 'testtitle', 'content' =>   'testcontent'],function ($message) 
                 {
                     $vandaag = date("Y-m-d");
        $morgen = date("Y-m-d", strtotime($vandaag .'+ 1 days'));

            $emails = DB::table('Students_enrolled_in_session')
             ->select('Students_enrolled_in_session.employeeIDenrolled', 'users.odata_id', 'Students_enrolled_in_session.sessionID', 'Sessions.date', 'users.email')
            ->join('users', 'Students_enrolled_in_session.employeeIDenrolled', '=', 'users.odata_id')
            ->join('Sessions', 'Students_enrolled_in_session.sessionID', '=', 'Sessions.id')
           
            ->where('Sessions.date', "=", $morgen)
            ->get();
                     
            $resultArray = json_decode(json_encode($emails), true);
                     dd($resultArray[0]['email']);
                     
                 $message->from('gillsteens@gmail.com', 'gill');
                 $message->to($resultArray->email);
                 $message->subject("Hello");

                 });
           

         return response()->json(['message' => 'message send successfully']);
    }
    
     public function sendEmaill()
        {
        

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
    
}
