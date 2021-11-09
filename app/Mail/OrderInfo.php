<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderInfo extends Mailable
{
    use Queueable, SerializesModels;
    public $info;
    public $data;
    public $totalOrderPrice;


    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($info, array $data, $totalOrderPrice)
    {
        $this->info = $info;
        $this->data = $data;
        $this->totalOrderPrice = $totalOrderPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(config('mail.from.address'), config('mail.from.name'))->view('email.orders');
    }
}
