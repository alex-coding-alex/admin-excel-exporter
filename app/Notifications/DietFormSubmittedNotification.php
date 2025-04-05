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
        $allergies = $this->dietForm->allergies ? 'Yes' : 'No';

        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Form has been submitted')
            ->line('Name: '.$this->dietForm->name)
            ->line('Email: '.$this->dietForm->email)
            ->line('Food Preferences: '.$this->dietForm->food_preference)
            ->line('Allergies: '.$allergies)
            ->line('Diet: '.$this->dietForm->diet->value);
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
