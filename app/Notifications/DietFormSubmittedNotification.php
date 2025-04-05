<?php

namespace App\Notifications;

use App\Models\DietForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DietFormSubmittedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public DietForm $dietForm
    ) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Form has been submitted');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
