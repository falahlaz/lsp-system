<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Apl02Mail extends Mailable
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
        return $this->view('email.apl02-mail', ["name" => $this->name, "url" => $this->url])
                    ->subject('Verifikasi Form APL 01 dan Pengisian Form APL 02');
    }
}
