<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class PermissionHelpers
{
    public static function canAny(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if (Auth::user()?->can($permission)) return true;
        }
        return false;
    }
}
