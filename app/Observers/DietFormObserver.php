<?php

namespace App\Observers;

use App\Models\DietForm;

class DietFormObserver
{
    public function created(DietForm $dietForm): void {}
}
