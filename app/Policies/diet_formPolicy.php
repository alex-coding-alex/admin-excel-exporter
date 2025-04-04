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
        return true; // Allow viewing all diet forms
    }

    public function view(User $user, diet_form $diet_form): bool
    {
        return $diet_form->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true; // Allow all users to create a diet form
    }

    public function update(User $user, diet_form $diet_form): bool
    {
        return $diet_form->user_id === $user->id;
    }

    public function delete(User $user, diet_form $diet_form): bool
    {
        return $diet_form->user_id === $user->id;
    }

    public function restore(User $user, diet_form $diet_form): bool
    {
        return $diet_form->user_id === $user->id;
    }

    public function forceDelete(User $user, diet_form $diet_form): bool
    {
        return $diet_form->user_id === $user->id;
    }
}
