<?php

namespace App\Support\Exceptions;

/**
 * Class UnauthorizedException
 *
 * The purpose of this exception is to explain that a an action cannot be performed
 * because of an user or organisation authentication failure.
 * A 401 Unauthorized or 403 Forbidden code should be returned, according to authorization process.
 *
 * @package App\Support\Exceptions
 */
class UnauthorizedException extends \Exception implements \Throwable
{
}
