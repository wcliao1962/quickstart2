<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to all users.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $content='XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
        User::all()->each( function ($user) use($content){
            Mail::send(
                'mail.test',
                [
                    'name' => $user->name,
                    'content'=> $content,
                ],
                function($message) use($user){
                    $message->subject('Welcome to our Web Space!');
                    $message->to($user->email, $user->name);
                    $message->from('netadmin@ncut.edu.tw', 'netadmin');
                }
            );
        });
    }
}
