<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $name='張三';
        $content='Hello, Laravel 8. <br>This is a mail testing.';
        $data = ['name' => $name, 'content'=> $content, ];
        Mail::send('mail.test', $data, function($message) {
            $message->subject('Laravel Mail Testing');
            $message->to('lwc32005@gmail.com', '張三');
            $message->from('wcliao1962@gmail.com', 'admin');
        });
        return 'mail sent!';

    }
}
