<?php

namespace App\Support\Enum;

use App\Support\Helpers\DataTypeInspector;

/**
 * Trait EnumTrait
 * @package App\Support\Enum
 */
trait EnumTrait
{
    /**
     * Check if the given enumerator value is valid
     *
     * @param $enumValue
     *
     * @return bool
     */
    public static function isEnumValid($enumValue)
    {
        if (empty($enumValue)) {
            return false;
        }

        $values = static::getEnumValues();
        if (is_numeric($enumValue) || is_string($enumValue)) {
            return in_array($enumValue, $values);
        } else {
            if (is_array($enumValue)) {
                foreach ($enumValue as $ev) {
                    if (!in_array($ev, $values)) {
                        return false;
                    }
                }

                return true;
            }
        }

        return false;
    }

    /**
     * Get all enumerator values
     *
     * @return array
     */
    public static function getEnumValues()
    {
        return DataTypeInspector::getObjectConstants(get_called_class());
    }
}
