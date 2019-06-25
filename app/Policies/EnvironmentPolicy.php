<?php

namespace App\Policies;

use App\User;
use App\Environment;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnvironmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the environment.
     *
     * @param  \App\User  $user
     * @param  \App\Environment  $environment
     * @return mixed
     */
    public function view(User $user, Environment $environment)
    {
        $coUsers = User::whereHas('coEnvironments', function ($query) use ($environment) {
            $query->where('environment_id', '=', $environment->id);
        })->where('id', '=', $user->id)->count();

        return (($environment->user_id == $user->id) || ($coUsers > 0) );
    }

    /**
     * Determine whether the user can create environments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the environment.
     *
     * @param  \App\User  $user
     * @param  \App\Environment  $environment
     * @return mixed
     */
    public function update(User $user, Environment $environment)
    {
        //
    }

    /**
     * Determine whether the user can delete the environment.
     *
     * @param  \App\User  $user
     * @param  \App\Environment  $environment
     * @return mixed
     */
    public function delete(User $user, Environment $environment)
    {
        //
    }

    /**
     * Determine whether the user can restore the environment.
     *
     * @param  \App\User  $user
     * @param  \App\Environment  $environment
     * @return mixed
     */
    public function restore(User $user, Environment $environment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the environment.
     *
     * @param  \App\User  $user
     * @param  \App\Environment  $environment
     * @return mixed
     */
    public function forceDelete(User $user, Environment $environment)
    {
        //
    }
}
