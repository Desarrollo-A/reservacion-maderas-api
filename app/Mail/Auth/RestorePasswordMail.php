<?php

namespace App\Mail\Auth;

use App\Helpers\Enum\Message;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestorePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user,public string $newPassword)
    {}

    public function build()
    {
        return $this
            ->subject(Message::RESTORE_PASSWORD)
            ->markdown('mail.auth.restore-password', [
                'fullName' => $this->user->full_name,
                'newPassword' => $this->newPassword
            ]);
    }
}
