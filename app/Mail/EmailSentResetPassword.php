<?php

namespace App\Mail;

use App\Models\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSentResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $resetPassword;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ResetPassword $resetPassword)
    {
        //
        $this->resetPassword = $resetPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sent-mail-password', [
            'email' => $this->resetPassword->email,
            'token' => $this->resetPassword->token,
        ])->subject('Apple Store');
    }
}
