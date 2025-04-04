<?php

namespace App\Policies;

use App\Models\DietForm;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DietFormPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true; // Allow viewing all diet forms
    }

    public function view(User $user, DietForm $diet_form): bool
    {
        return $diet_form->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true; // Allow all users to create a diet form
    }

    public function update(User $user, DietForm $diet_form): bool
    {
        return $diet_form->user_id === $user->id;
    }

    public function delete(User $user, DietForm $diet_form): bool
    {
        return $diet_form->user_id === $user->id;
    }

    public function restore(User $user, DietForm $diet_form): bool
    {
        return false;
    }

    public function forceDelete(User $user, DietForm $diet_form): bool
    {
        return false;
    }
}
