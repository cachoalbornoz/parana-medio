<?php

namespace App\Notifications;

use Illuminate\Support\HtmlString;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NuevoUsuario extends Notification
{
    use Queueable;
    protected $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
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
    public function toMail($notifiable){

        return (new MailMessage)
            ->subject('Registro de usuarios')
            ->greeting(('** '.$this->datos['apellido'].', '.$this->datos['nombre']).' **')
            ->line(new HtmlString("<br>"))
            ->line('Te registraste correctamente en nuestro Sistema.')
            ->line(new HtmlString("<br>"))
            ->line(new HtmlString("<hr>"))
            ->line('Muchas gracias!')
            ->bcc('cachoalbornoz@gmail.com');
            //->bcc('erikacardozo1993@gmail.com');
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
