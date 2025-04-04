<?php

namespace App\Policies;

use App\Models\diet_form;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class diet_formPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, diet_form $diet_form): bool {}

    public function create(User $user): bool {}

    public function update(User $user, diet_form $diet_form): bool {}

    public function delete(User $user, diet_form $diet_form): bool {}

    public function restore(User $user, diet_form $diet_form): bool {}

    public function forceDelete(User $user, diet_form $diet_form): bool {}
}
