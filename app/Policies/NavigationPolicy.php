<?php

namespace App\Policies;

use App\Navigation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NavigationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Navigation  $navigation
     * @return mixed
     */
    public function view(User $user, Navigation $navigation)
    {
        return ! empty(array_intersect($user->currentRoles(), $navigation->currentRoles()));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Navigation  $navigation
     * @return mixed
     */
    public function update(User $user, Navigation $navigation)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Navigation  $navigation
     * @return mixed
     */
    public function delete(User $user, Navigation $navigation)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Navigation  $navigation
     * @return mixed
     */
    public function restore(User $user, Navigation $navigation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Navigation  $navigation
     * @return mixed
     */
    public function forceDelete(User $user, Navigation $navigation)
    {
        //
    }
}
