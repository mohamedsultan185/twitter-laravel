<?php

namespace App\Notifications;

use App\Services\FCMService;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewTweetNotification extends Notification
{
    use Queueable;
    protected $tweet;

    public function __construct($tweet)
    {
        $this->tweet = $tweet;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

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
        ];
    }


}
