<?php

namespace App\Mail;

use App\Model\CareerForm;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CareerMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var CareerForm
     */
    public $careerData;

    /**
     * Create a new message instance.
     *
     * @param CareerForm $careerForm
     */
    public function __construct(CareerForm $careerForm)
    {
        $this->careerData = $careerForm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.careerMail');
    }
}
