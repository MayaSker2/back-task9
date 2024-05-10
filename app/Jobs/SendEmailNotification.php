<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mail\Template;

class SendEmailNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $book;
    protected $action;
    // protected $email;

    public function __construct($email)
    {
        $this->user = $user;
        $this->book = $book;
        $this->action = $action;
        // $this->email = $email;
    }

    public function handle()
    {
      
        Mail::to($this->email->to)->send(new Template($this->user, $this->book, $this->action));
    }
}