<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProdukPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }
 
    public function view_produk(User $user)
    {
        return in_array($user->email, [
            'kelvin@admin.com',
            'stephen@admin.com'
        ]);
    }

    public function create_produk(User $user)
    {
        return in_array($user->email, [
            'kelvin@admin.com',
            'stephen@admin.com'
        ]);
    }

    public function update_produk(User $user)
    {
        return in_array($user->email, [
            'kelvin@admin.com',
            'stephen@admin.com'
        ]);
    }
    public function delete_produk(User $user)
    {
        return in_array($user->email, [
            'kelvin@admin.com',
            'stephen@admin.com'
        ]);
    }

}