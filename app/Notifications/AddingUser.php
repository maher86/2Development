<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use App\User;

class AddingUser extends Notification
{
    use Queueable;
    private $userId;
    private $adminId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userId,$adminId)
    {
        $this->userId = $userId;
        $this->adminId= $adminId;
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
            //
        ];
    }

    /**
     * 
     * @param mixed $notifiable
     * @return array
     */

    public function toDatabase($notifiable)
    {
        return[

            'id'=> $this->userId,
            'admin_id'=> $this->adminId,
            'message'=>'the admin'. Auth::user()->name .'added new user'
            

        ];

    }
}
