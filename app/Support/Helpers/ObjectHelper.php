<?php

namespace App\Support\Helpers;

use stdClass;

/**
 * Class ObjectHelper
 * @package App\Support\Helpers
 */
class ObjectHelper
{
    /**
     * @param stdClass|mixed $object
     *
     * @return mixed
     */
    public static function toArray($object)
    {
        return json_decode(json_encode($object), true);
    }
}
