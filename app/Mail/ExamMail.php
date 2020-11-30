<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.exam-mail', ["name" => $this->name, "url" => $this->url])
                    ->subject('Verifikasi Form APL 02 dan Ujian Mandiri');
    }
}
