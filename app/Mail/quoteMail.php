<?php

namespace App\Mail;

use App\Model\RequestQuote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class quoteMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var RequestQuote
     */
    public $requestQueue;

    /**
     * Create a new message instance.
     *
     * @param RequestQuote $requestQuote
     */
    public function __construct(RequestQuote $requestQuote)
    {
        $this->requestQueue = $requestQuote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.queueMail');
    }
}
