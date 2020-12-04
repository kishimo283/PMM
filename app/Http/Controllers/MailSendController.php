<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendTestMail;
use Mail;
use Illuminate\Support\Facades\Auth;

class MailSendController extends Controller
{
    public function send(){

        $user = Auth::user();
        $to = [
            [
                'email' => $user->email,
                'name' => $user->name,
            ]
        ];

        Mail::to($to)->send(new SendTestMail());

        return redirect(route('main'));
        }
}
