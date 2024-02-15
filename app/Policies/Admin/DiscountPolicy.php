<?php

namespace App\Policies\Admin;

use App\Models\Discount;
use App\Models\User;
use Illuminate\Auth\Access\Response;
class DiscountPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->can('discounts.admin.index') ? Response::allow() :
            Response::deny('you dont have permission to visit discounts!');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Discount $discount): Response
    {
        return $user->can('discounts.admin.show') ? Response::allow() :
            Response::deny('you dont have permission to visit a discount!');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->can('discounts.admin.create') ? Response::allow() :
            Response::deny('you dont have permission to create a discount!');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Discount $discount): Response
    {
        return $user->can('discounts.admin.update') ? Response::allow() :
            Response::deny('you dont have permission to update a discount!');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Discount $discount): Response
    {
        return $user->can('discounts.admin.delete') ? Response::allow() :
            Response::deny('you dont have permission to delete a discount!');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Discount $discount): Response
    {
        return $user->can('discounts.admin.restore') ? Response::allow() :
            Response::deny('you dont have permission to restore a discount!');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Discount $discount): Response
    {
        return $user->can('discounts.admin.forceDelete') ? Response::allow() :
            Response::deny('you dont have permission to forceDelete a discount!');
    }
}
