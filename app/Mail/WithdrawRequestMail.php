<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WithdrawRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public $program,
        public $transaction_hash,
        public $receipt
    ) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.withdraw-request')
            ->attachData($this->receipt->get(), 'receipt.' . $this->receipt->getClientOriginalExtension(), 
            [
                'mime' => $this->receipt->getClientMimeType(),
            ]);
    }
}
