<?php

namespace App\Notifications;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationThankYou extends Notification 
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
        string $donorName,
        float $amount,
        string $currency,
        string $donationDate,
        string $donationType,
        string $subject = 'Thank You for Your Donation!',
        ?string $notes = null,
        string $actionText = null,
        string $actionUrl = null
    ) {
        $this->subject = $subject;
        $this->message = "Dear {$donorName},\n\n" .
            "We sincerely appreciate your generous donation of {$currency} {$amount}.\n" .
            "Donation Type: {$donationType}\n" .
            "Date: {$donationDate}\n" .
            ($notes ? "Notes: {$notes}\n" : "") .
            "Your support means so much to us and will make a real difference.";
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
     * Optional array representation.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'subject' => $this->subject,
            'message' => $this->message,
        ];
    }
}

