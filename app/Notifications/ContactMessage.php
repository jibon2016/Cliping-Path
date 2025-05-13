<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMessage extends Notification
{
    use Queueable;

    public $message;

    /**
     * Create a new notification instance.
     *
     * @param  array  $message
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail']; // Add 'mail' channel
    }

    /**
     * Get the array representation of the notification for database channel.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $this->message['title'],
            'content' => $this->message['content'],
            'url' => $this->message['action'],
        ];
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
            ->subject($this->message['title'])
            ->greeting('Hello!')
            ->line($this->message['content'])
            ->action('View Message', url($this->message['action']))
            ->line('Thank you for using our application!');
    }
}
