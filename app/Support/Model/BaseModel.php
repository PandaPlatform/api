<?php

namespace App\Support\Model;

use App\Support\Helpers\ObjectHelper;
use Exception;
use ReflectionClass;
use ReflectionProperty;
use stdClass;
use Throwable;

/**
 * Class BaseModel
 * @package App\Support\Model
 */
abstract class BaseModel
{
    /**
     * BaseModel constructor.
     *
     * @param array $model
     */
    public function __construct($model = [])
    {
        $this->loadFromArray($model);
    }

    /**
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getPropertyByName($name, $default = null)
    {
        try {
            return $this->$name;
        } catch (Throwable $ex) {
            return $default;
        }
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function setPropertyByName($name, $value)
    {
        try {
            $this->$name = $value;
        } catch (Throwable $ex) {
        }
    }

    /**
     * @param array $array
     *
     * @return $this
     */
    public function loadFromArray($array = [])
    {
        foreach ($array as $name => $value) {
            $this->setPropertyByName($name, $value);
        }

        return $this;
    }

    /**
     * @param string $json
     *
     * @return $this
     */
    public function loadFromJson($json = '')
    {
        $array = json_decode($json, true);

        return $this->loadFromArray($array);
    }

    /**
     * @param stdClass|mixed $object
     *
     * @return $this
     */
    public function loadFromObject($object = null)
    {
        // Convert object to array
        $array = ObjectHelper::toArray($object);

        return $this->loadFromArray($array);
    }

    /**
     * Convert the current object to array
     *
     * @param int $filter It can be configured using the ReflectionProperty constants
     *
     * @return array
     */
    public function toArray($filter = ReflectionProperty::IS_PROTECTED)
    {
        $objectArray = [];

        // Get all properties
        $ref = new ReflectionClass($this);
        $properties = $ref->getProperties($filter);
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            if (isset($this->$propertyName)) {
                $objectArray[$propertyName] = $this->$propertyName;
            }
        }

        return $objectArray;
    }

    /**
     * Convert the current object to json string
     *
     * @param int $filter
     * @param int $options
     * @param int $depth
     *
     * @return string
     */
    public function toJson($filter = ReflectionProperty::IS_PROTECTED, $options = 0, $depth = 512)
    {
        return json_encode($this->toArray($filter), $options, $depth);
    }

    /**
     * @param $name
     * @param $value
     *
     * @throws Exception
     */
    public function __set($name, $value)
    {
        throw new Exception(static::class . ' does not have a property with the name [' . $name . ']');
    }
}
