<?php namespace App\Mailers;

use Illuminate\Support\Facades\Mail;

abstract class Mailer {
    protected $to;
    protected $email;
    protected $subject;
    protected $view;
    protected $data = [];
    protected $options;

    public function deliver()
    {
        return Mail::send($this->view, $this->data, function($message)
        {
            $message->to($this->email, $this->to)->subject($this->subject);

            if (is_callable($this->options))
            {
                call_user_func($this->options, $message);
            }

        });
    }

} 