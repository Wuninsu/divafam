<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeTestNotification extends Notification
{
    use Queueable;

    protected string $subject;
    protected string $message;
    protected ?string $actionText;
    protected ?string $actionUrl;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        string $subject = 'Welcome to Diva Farms!',
        string $message = 'Thank you for connecting with us.',
        string $actionText = null,
        string $actionUrl = null
    ) {
        $this->subject = $subject;
        $this->message = $message;
        $this->actionText = $actionText;
        $this->actionUrl = $actionUrl;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject($this->subject)
            ->greeting('Hello!')
            ->line($this->message);

        if ($this->actionText && $this->actionUrl) {
            $mail->action($this->actionText, $this->actionUrl);
        }

        return $mail->line('Thank you for supporting Diva Farms!');
    }

    /**
     * Get the array representation of the notification (optional for database).
     */
    public function toArray(object $notifiable): array
    {
        return [
            'subject' => $this->subject,
            'message' => $this->message,
        ];
    }
}

