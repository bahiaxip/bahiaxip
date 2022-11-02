<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
class MyResetPassword extends ResetPassword
{
    use Queueable;

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hola')
                    ->line('Si estás recibiendo este E-Mail es porque se ha establecido una solicitud de cambio de contraseña para tu cuenta en Bahiaxip.com')
                    ->action('Establecer nueva contraseña', route('password.reset',$this->token))
                    ->line('Si tú no enviaste una solicitud puedes ignorar este mensaje')
                    ->salutation('Saludos, '.config('app.name'))
                    ->line('Si tú no enviaste una solicitud puedes ignorar este mensaje');
    }

}
