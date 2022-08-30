<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class TaskShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $task;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$user=auth()->user();
        //dd($user);
        return $this->markdown('emails.tasks.shipped')
            ->with([
                'user'=> auth()->user(),
                'task' => $this->task,
                'url' => 'www.ncut.edu.tw',
            ])
            ->subject('新任務通知');
    }
}
