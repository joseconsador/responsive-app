<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Inquiry;

class NewInquiry extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Inquiry
     */
    private $inquiry;

    /**
     * Create a new message instance.
     *
     * @param Inquiry $inquiry The inquiry object.
     * 
     * @return void
     */
    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry->toArray();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.inquiry', $this->inquiry)
            ->subject($this->inquiry['subject'])
            ->from($this->inquiry['email']);
    }
}
