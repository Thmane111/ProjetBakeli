<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;
class MailController extends Controller
{
    public function index(){
        $mailData= [
            'title'=>'Mail from Expat-Rim',
            'body'=> 'This is for testing email unsign smtp',
        ];

        Mail::to('bagwelle51@gmail.com')->send(new TestMail($mailData));
        dd('Email send successfully');
    }
}
