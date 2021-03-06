<?php

namespace App\Policies;

use App\Models\Story;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class StoriesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Story $story)
    {
        return true; 
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Story $story)
    {
        return $user->role == 'admin'
            ? Response::allow()
            : Response::deny(__("You cannot Edit this Story because you are not the owner"));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Story $story)
    {
        return $user->role == 'admin'
            ? Response::allow()
            : Response::deny(__("You cannot Delete this Story because you are not the owner"));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Story $story)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Story $story)
    {
        //
    }
}
