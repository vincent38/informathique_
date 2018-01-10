<?php

namespace Illuminate\Auth\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Tu reçois ce message car nous avons reçu une demande de réinitialisation de mot de passe pour le compte associé à cette adresse mail.')
            ->action('C\'est bien moi, réinitialisez mon mot de passe !', url(config('app.url').route('password.reset', $this->token, false)))
            ->line("Si tu n'as pas demandé à réinitialiser ton mot de passe, ne tiens pas compte de ce mail.");
    }
}
