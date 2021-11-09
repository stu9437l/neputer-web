<?php

namespace App\Mail;

use App\Model\ServiceCustomerEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class serviceMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var ServiceCustomerEnquiry
     */
    public $serviceCustomerEnquiry;

    /**
     * Create a new message instance.
     *
     * @param ServiceCustomerEnquiry $serviceCustomerEnquiry
     */
    public function __construct(ServiceCustomerEnquiry $serviceCustomerEnquiry)
    {
       $this->serviceCustomerEnquiry = $serviceCustomerEnquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.serviceMail');
    }
}
