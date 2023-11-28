<?php

namespace App\Notifications;

use Illuminate\Support\HtmlString;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NuevaHabilitacion extends Notification
{
    use Queueable;

    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Habilitación de usuarios')
            ->greeting('** '.$notifiable->apellido.', '.$notifiable->nombre.' **')
            ->line('Estás habilitado para la carga de proyectos.')
            ->line(' ')
            ->line("<hr>")
            ->line('Muchas gracias!')
            ->bcc('cachoalbornoz@gmail.com')
            ->bcc('erikacardozo1993@gmail.com');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
