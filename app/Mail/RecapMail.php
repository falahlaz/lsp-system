<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecapMail extends Mailable
{
    use Queueable, SerializesModels;

    private $tuk;
    private $form01;
    private $scheme;
    private $exam_date;
    private $graduation;
    private $practical_date;
    private $practical_time;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form01, $exam_date, $scheme, $graduation, $tuk = null, $practical_date = null, $practical_time = null)
    {
        $this->tuk = $tuk;
        $this->form01 = $form01;
        $this->scheme = $scheme;
        $this->exam_date = $exam_date;
        $this->graduation = $graduation;
        $this->practical_date = $practical_date;
        $this->practical_time = $practical_time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'form01' => $this->form01,
            'exam_date' => $this->exam_date,
            'scheme' => $this->scheme,
            'graduation' => $this->graduation,
            'tuk' => $this->tuk,
            'practical_time' => $this->practical_time,
            'practical_date' => $this->practical_date,
        ];

        return $this->view('email.recap', $data)->subject("Hasil Ujian Teori");
    }
}
