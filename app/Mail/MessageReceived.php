<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $subject='Solicitud de Crédito';
    public $msg;
    public $exist_conyugue; 
    public $conyugues;  
    public $creditos; 
    public $ingresos; 
    public $exist_prestamo; 
    public $prestamos; 
    public $exist_bien; 
    public $bienes; 
    public $total_bienes; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg,$exist_conyugue,$conyugues,$creditos,$ingresos,$exist_prestamo,$prestamos,$exist_bien,$bienes,$total_bienes)
    {
        $this->msg=$msg;       
        $this->exist_conyugue=$exist_conyugue;     
        $this->conyugues=$conyugues;        
        $this->creditos=$creditos;        
        $this->ingresos=$ingresos;     
        $this->exist_prestamo=$exist_prestamo;    
        $this->prestamos=$prestamos; 
        $this->exist_bien=$exist_bien; 
        $this->bienes=$bienes;       
        $this->total_bienes=$total_bienes; 
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('emails.message-received');
    }
}
