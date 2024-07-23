<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class NewCommentNotification extends Notification
{
    use Queueable;
    protected $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct($comment)
    {
        //
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    // public function via(object $notifiable): array
    // {
    //     return ['mail'];
    // }
    public function via($notifiable)
    {
        return ['database'];  // Vous pouvez ajouter 'mail' ou d'autres canaux si besoin.
    }


    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         //
    //     ];
    // }
    public function toArray($notifiable)
{
    return [
        'comment_id' => $this->comment->id,
        'comment_body' => $this->comment->body,
        'comment_p' => $this->comment->le_profil,
        'comment_name' => $this->comment->user->name,
        'comment_prenom' => $this->comment->user->prenom,
        'comment_photo' => $this->comment->user->le_profil, // Utilise l'accessoire
        'comment_post' => $this->comment->post->title,
    ];
}

}
