<?php

namespace App\Policies\Admin;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BannerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->can('banners.index') ? Response::allow() :
            Response::deny('you dont have permission to visit banners!');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Banner $banner): Response
    {
        return $user->can('banners.show') ? Response::allow() :
            Response::deny('you dont have permission to visit a banner!');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->can('banners.create') ? Response::allow() :
            Response::deny('you dont have permission to create a banner!');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Banner $banner): Response
    {
        return $user->can('banners.update') ? Response::allow() :
            Response::deny('you dont have permission to update a banner!');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Banner $banner): Response
    {
        return $user->can('banners.delete') ? Response::allow() :
            Response::deny('you dont have permission to delete a banner!');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Banner $banner): Response
    {
        return $user->can('banners.restore') ? Response::allow() :
            Response::deny('you dont have permission to restore a banner!');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Banner $banner): Response
    {
        return $user->can('banners.forceDelete') ? Response::allow() :
            Response::deny('you dont have permission to forceDelete a banner!');
    }
}
