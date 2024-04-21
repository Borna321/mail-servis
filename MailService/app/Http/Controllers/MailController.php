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
       
        return Inertia::render('Sent');
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
}
