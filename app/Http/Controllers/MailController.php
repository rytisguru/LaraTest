<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class MailController extends Controller
{
    public function contact() {
        return view('emails.contact');
    }

    public function send(Request $request) {

        $rules = [
            'name' => ['required', 'max:32'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'min:5', 'max:50'],
            'mail_message' => ['required', 'min:20', 'max:2000'],
        ];

        $this->validate($request, $rules);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'mail_message' => $request->mail_message,
        ];
        Mail::send('emails.send', $data, function($message)  {
            $message->to('r.pleckauskas@gmail.com', 'Rytis')->subject('Mail received: LaraTets');
        });

        Session::flash('contact_form_send', 'Thanks for the message!');

        return redirect('/');
    }
}
