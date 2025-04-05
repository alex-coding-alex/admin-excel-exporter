<?php

namespace App\Observers;

use App\Models\DietForm;
use App\Notifications\DietFormSubmittedNotification;
use Illuminate\Support\Facades\Notification;

class DietFormObserver
{
    public function created(DietForm $dietForm): void
    {
        // Notify user and admin of new form submission
        $dietForm->notify(new DietFormSubmittedNotification($dietForm));
        Notification::send($dietForm->user, new DietFormSubmittedNotification($dietForm));
    }
}
