<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreateGusetComment extends Notification
{
    use Queueable;
    private $entityId;
    private $entityType;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($entityId,$entityType)
    {
        $this->entityId = $entityId;
        $this->entityType = $entityType;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'message' =>'تم إضافة تعليق من قبل مستخدم غير مسجل',
            'id'      => $this->entityId,
            'EntityTpe'=> $this->entityType

        ];
    }
}
