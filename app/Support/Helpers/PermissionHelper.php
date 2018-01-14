<?php

namespace App\Support\Helpers;

/**
 * Class PermissionHelper
 * @package App\Support\Helpers
 */
class PermissionHelper
{
    /**
     * @param string $master
     * @param string $child
     *
     * @return bool
     */
    public static function match($master, $child)
    {
        // Break permissions to scope and operation
        list($masterScope, $masterOperation) = self::break($master);
        list($childScope, $childOperation) = self::break($child);

        // Check scope first
        return $masterScope == $childScope && self::matchBinary((int)$masterOperation, (int)$childOperation);
    }

    /**
     * @param string $master
     * @param string $child
     *
     * @return string|null
     */
    public static function mask($master, $child)
    {
        list($masterScope, $masterOperation) = self::break($master);
        list($childScope, $childOperation) = self::break($child);

        return $masterScope == $childScope ? implode('.', [$masterScope, self::maskBinary($masterOperation, $childOperation)]) : null;
    }

    /**
     * @param int $master
     * @param int $child
     *
     * @return bool
     */
    public static function matchBinary($master, $child)
    {
        return self::maskBinary($master, $child) == $child ||
            self::maskBinary($master, $child) == $master;
    }

    /**
     * @param int $master
     * @param int $child
     *
     * @return int
     */
    public static function maskBinary($master, $child)
    {
        return $master & $child;
    }

    /**
     * @param string $permission
     *
     * @return array
     */
    public static function break($permission)
    {
        // Break operation in parts
        $parts = explode('.', $permission);

        // Get the last ite mas the operation
        $operation = array_pop($parts);

        // Glue everything else as scope
        $scope = implode('.', $parts);

        return [$scope, $operation];
    }
}
