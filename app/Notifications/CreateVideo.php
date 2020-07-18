<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;


class CreateVideo extends Notification
{
    use Queueable;
    private $userId;
    private $videoId;

    public function __construct($userId,$videoId){
        $this->userId =  $userId;
        $this->videoId = $videoId;

    }

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    

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

            'id'=> $this->userId,
            'objId'=> $this->videoId,
            'message'=>'the user '.auth()->user()->name.'  create a video',
        ];
        
    }
}
