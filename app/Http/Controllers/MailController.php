<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $recipient_name='張三';
        $recipient_address='lwc32005@gmail.com';

        $to = ['name' => $recipient_name, 'address' => $recipient_address];
        $from = ['name' => 'admin', 'address'=>'wcliao1962@gmail.com'];
        $subject = 'Laravel Mail Testing';
        $content='Welcome to Laravel 8. <br>This is a mail testing.<br>******';
        $msg = ['name' => $recipient_name, 'content'=> $content, ];
        Mail::send('mail.test', $msg, function($message) use($to, $from, $subject) {
            $message->subject($subject);
            $message->to($to['address'], $to['name']);
            $message->from($from['address'], $from['name']);
        });
        return 'mail sent!';

    }
}
