<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use App\Models\Mail;

class MailController extends Controller
{
    public function inbox(Request $request){
        
        $mails = Mail::where('reciever_id', auth()->user()->id)
             ->where('reciever_deleted', 0)
             ->where('trash', 0)
             ->get();


        return Inertia::render('Inbox', ['mails' => $mails]);
    }

    public function sent(Request $request){

        
        $mails = Mail::where('sender_id', auth()->user()->id)
             ->where('sender_deleted', 0)
             ->get();
        $users = User::All();
       
        return Inertia::render('Sent', ['mails' => $mails, 'users' => $users]);
    }

    public function junk(Request $request){
        
        return Inertia::render('Junk');
    }

    public function trash(Request $request){
        
        $mails = Mail::where('trash', true)->get();

        
        return Inertia::render('Trash', ['mails' => $mails]);
        
    }

    public function newmail(Request $request){
        
        return Inertia::render('NewMail');
    }

    public function addmail(Request $request){


                    $income = $request->validate([
                        'reciever_mail' => 'required',
                        'title' => 'required',
                        'body' => 'required',
                    ]);

                    $email = $request->reciever_mail;
                    $receiver = User::where('email', $email)->first(); 
                            
                    if($receiver) {
                        $income['reciever_id'] = $receiver->id; 
                    } else {
                        return Inertia::render('NewMail');
                    }
                    
                    $income['sender_id'] = Auth()->user()->id;
                    $income['sender_mail'] = Auth()->user()->email;

                    
                    

                    Mail::Create($income);
        
        return Inertia::render('NewMail');
    }

    public function delete_sender_mail(Request $request){
        

        $mail = Mail::find($request->mailId);
        $mail->sender_deleted = 1;
        $mail->save();
        
        if($mail->sender_deleted && $mail->reciever_deleted && !$mail->trash) $mail->delete();
        

        return redirect('/sent');

    }

    public function delete_reciever_mail(Request $request){
        

        $mail = Mail::find($request->mailId);
        $mail->reciever_deleted = 1;
        $mail->save();
        
        if($mail->sender_deleted && $mail->reciever_deleted && !$mail->trash) $mail->delete();
        

        return redirect('/inbox');

    }

    
    public function move_to_trash(Request $request){
        

        $mail = Mail::find($request->mailId);
        $mail->trash = 1;
        $mail->save();
        
        //if($mail->sender_deleted && $mail->reciever_deleted && !$mail->trash) $mail->delete();
        $mails = Mail::where('trash', true)->get();

        //return redirect('/trash');
        return Inertia::render('Trash', ['mails' => $mails]);

    }

    
    public function delete_from_trash(Request $request){
        

        $mail = Mail::find($request->mailId);
        $mail->trash = 0;
        $mail->reciever_deleted = 1;
        $mail->save();
        
        //if($mail->sender_deleted && $mail->reciever_deleted && !$mail->trash) $mail->delete();
        $mails = Mail::where('trash', true)->get();

        if($mail->sender_deleted && $mail->reciever_deleted && !$mail->trash) $mail->delete();

        //return redirect('/trash');
        return Inertia::render('Trash', ['mails' => $mails]);

    }


    
}
