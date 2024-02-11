<?php

namespace App\Policies\Admin;

use App\Models\FoodCategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FoodCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->can('food categories.index') ? Response::allow() :
            Response::deny('you dont have permission to visit food categories!');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FoodCategory $foodCategory): Response
    {
        return $user->can('food categories.show') ? Response::allow() :
            Response::deny('you dont have permission to visit a food category!');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->can('food categories.create') ? Response::allow() :
            Response::deny('you dont have permission to create a food category!');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FoodCategory $foodCategory): Response
    {
        return $user->can('food categories.update') ? Response::allow() :
            Response::deny('you dont have permission to update a food category!');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FoodCategory $foodCategory): Response
    {
        return $user->can('food categories.delete') ? Response::allow() :
            Response::deny('you dont have permission to delete a food category!');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FoodCategory $foodCategory): Response
    {
        return $user->can('food categories.restore') ? Response::allow() :
            Response::deny('you dont have permission to restore a food category!');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FoodCategory $foodCategory): Response
    {
        return $user->can('food categories.forceDelete') ? Response::allow() :
            Response::deny('you dont have permission to forceDelete a food category!');
    }
}
