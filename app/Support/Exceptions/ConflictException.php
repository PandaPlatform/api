<?php

namespace App\Support\Exceptions;

/**
 * Class ConflictException
 *
 * The purpose of this exception is to explain that a an action cannot be performed
 * due to a conflict with the current state of the resource.
 * For example:
 * - feature has already been dispatched.
 * A 409 Forbidden code should be returned.
 *
 * @package App\Support\Exceptions
 */
class ConflictException extends \Exception implements \Throwable
{
}
