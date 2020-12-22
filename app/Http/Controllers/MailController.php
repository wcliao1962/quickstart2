<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $name='張三';
        $content='Welcome to Laravel 8. <br>This is a mail testing.<br>******';
        $data = ['name' => $name, 'content'=> $content, ];
        Mail::send('mail.test', $data, function($message) use($name) {
            $message->subject('Laravel Mail Testing');
            $message->to('lwc32005@gmail.com', $name);
            $message->from('wcliao1962@gmail.com', 'admin');
        });
        return 'mail sent!';

    }
}
