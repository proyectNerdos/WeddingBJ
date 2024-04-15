<?php

namespace Modules\WebContent\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormNotification extends Notification
{
    use Queueable;

    protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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

        $mailMessage = new MailMessage();


        //mc 2023.09.28
        $app_name = config('global.app_name');


        $mailMessage
            ->subject('Nuevo contacto del sitio web de '.$app_name)
            ->line("Se ha recibido un mensaje de contacto del sitio web de " . $app_name )
            ->line('Nombre: ' .   $this->data['name'])
            ->line('Email: ' . $this->data['email'])
            ->line('Asistencia: ' . $this->data['asistencia'])
            ->line('Numero de asistencia: ' . $this->data['numero_de_asistencia']);

            return $mailMessage;

            // return (new MailMessage)
            // ->subject('Nuevo contacto del sitio web de '.$app_name)
            // ->view('webcontent::website.javiersanchez.notifications.contact', ['data' => $this->data ,'app_name' => $app_name]);

        return $mailMessage;
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
