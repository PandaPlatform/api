<?php

namespace App\Support\Helpers;

/**
 * Class PasswordHelper
 * @package App\Support\Helpers
 */
class PasswordHelper
{
    /**
     * @param string $password
     * @param int    $algorithm
     *
     * @return string
     */
    public static function hash($password, $algorithm = PASSWORD_BCRYPT)
    {
        return password_hash($password, $algorithm);
    }

    /**
     * @param string $hash
     * @param string $password
     *
     * @return bool
     */
    public static function verify($hash, $password)
    {
        return password_verify($password, $hash);
    }
}
