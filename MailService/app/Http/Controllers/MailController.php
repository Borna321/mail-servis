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

        $mails = Mail::where('reciever_id', Auth()->user()->id)->get();


        return Inertia::render('Inbox', ['mails' => $mails]);
    }

    public function sent(Request $request){

        $mails = Mail::where('sender_id', Auth()->user()->id)->get();
        $users = User::All();

        return Inertia::render('Sent', ['mails' => $mails, 'users' => $users]);
    }

    public function junk(Request $request){

        return Inertia::render('Junk');
    }

    public function trash(Request $request){

        return Inertia::render('Trash');
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
}
