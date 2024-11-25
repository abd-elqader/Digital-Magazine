<?php

namespace App\Policies;

use App\Models\Magazine;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MagazinePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Magazine $magazine): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'publisher';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Magazine $magazine): bool
    {
        return $user->role === 'manager';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Magazine $magazine): bool
    {
        return $user->role === 'manager';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Magazine $magazine): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Magazine $magazine): bool
    {
        //
    }

    public function subscribe (User $user, Magazine $magazine): bool
    {
        return $user->role === 'subscriber' ||$user->role === 'manager';
    }
}
