<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use lang;

class RejectedEntity extends Notification
{
    use Queueable;
    private $theEntity;
    private $entityId;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($theEntity,$entityId)
    {
        $this->theEntity = $theEntity;
        $this->entityId  = $entityId;
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
            'Entity' =>$this->theEntity,
            'entityId'=>$this->entityId,
            'message'=>'تم رفض  '.__('words.'.$this->theEntity).'الخاص بك',
        ];
    }
}
