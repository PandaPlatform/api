<?php

namespace App\Support\Helpers;

use Panda\Support\Helpers\StringHelper;

/**
 * Class UriHelper
 * @package App\Support\Helpers
 */
class UriHelper
{
    /**
     * @param string $uri
     * @param array  $arguments
     *
     * @return string
     */
    public static function get($uri, $arguments = [])
    {
        return rtrim(StringHelper::interpolate($uri, $arguments, '{', '}'), '/');
    }
}
