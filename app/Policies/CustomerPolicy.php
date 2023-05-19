<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }
    public function view_customer(User $user)
    {
        return in_array($user->email, [
            'kelvin@admin.com',
            'stephen@admin.com'
        ]);
    }
    public function create_customer(User $user)
    {
        return in_array($user->email, [
            'kelvin@admin.com',
            'stephen@admin.com'
        ]);
    }
    public function update_customer(User $user)
    {
        return in_array($user->email, [
            'kelvin@admin.com',
            'stephen@admin.com'
        ]);
    }
    public function delete_customer(User $user){
        return in_array($user->email, [
            'kelvin@admin.com',
            'stephen@admin.com'
        ]);
    }
   
}