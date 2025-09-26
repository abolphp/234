<?php

namespace Modules\User\Services;

class UserServices
{
    public static function changePassword($user, $newPassword)
    {
        $user->password = bcrypt($newPassword);
        $user->save();
    }
}
