<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $resetUrl = url('/reset-password?token=' . $this->token);

        return (new MailMessage)
            ->line('Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.')
            ->action('Reset Password', $resetUrl)
            ->line('Jika Anda tidak meminta reset password, abaikan email ini.');
    }
}
