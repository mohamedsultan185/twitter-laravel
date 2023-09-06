<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTweetNotification extends Notification
{
    use Queueable;
    protected $tweet;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tweet)
    {
        $this->tweet = $tweet;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**cle
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $tweet = $this->tweet;
        $tweetAuthor = $tweet->user->name;

        return (new MailMessage)
            ->line("{$tweetAuthor} has posted a new tweet:")
            ->line("Tweet Content: {$tweet->content}")
            ->action('View Tweet', url("/tweets/{$tweet->id}"))
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
        $tweet = $this->tweet;
        $tweetAuthor = $tweet->user->name;
        

        return [
            'type' => 'tweet',
            'tweet_id' => $this->tweet->id,
            'user_name' => $this->tweet->user->name,
            'tweet_content' => $this->tweet->content,
            'message' => "{$tweetAuthor} has posted a new tweet : ",

            //
        ];

    }
}
