<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmail extends Mailable {

    use Queueable, SerializesModels;
    public $view;
    public $dados;
    public $titulo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view, $dados, $titulo) {
        $this->view = $view;
        $this->dados = $dados;
        $this->titulo = $titulo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view($this->view)
            ->from("gilgea@gmail.com", "SIG")
            // ->cc($address, $name)
            // ->bcc($address, $name)
            // ->replyTo($address, $name)
            ->subject($this->titulo)
            ->with('dados', $this->dados);
    }
}
