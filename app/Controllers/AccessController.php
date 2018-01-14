<?php

namespace App\Controllers;

use App\Support\Exceptions\ForbiddenException;
use App\Support\Exceptions\UnauthorizedException;

/**
 * Class AccessController
 * @package App\Controllers
 */
class AccessController extends BaseController
{
    /**
     * @param array $scope
     *
     * @throws ForbiddenException
     * @throws UnauthorizedException
     */
    public function checkAccessWithRequest($scope = [])
    {
        // Get current request
        $currentRequest = $this->getCurrentRequest();

        // Check JWT Scheme access based on the request
        // todo: remove the default token to apply access control
        $this->checkTokenAccess($currentRequest->header('auth-token') ?: 'dummy', $scope);
    }

    /**
     * @param string $token
     * @param array  $scope
     *
     * @throws ForbiddenException
     * @throws UnauthorizedException
     */
    public function checkTokenAccess($token, $scope = [])
    {
        // Check if token exists
        if (empty($token)) {
            throw new ForbiddenException('Missing authorization: No authorization detected in this request. Please try again.');
        }

        // Get token
        // todo: implement a token verification method here to check if the token is valid
        if (false) {
            throw new UnauthorizedException('JWT Scheme: The provided authorization scheme is invalid.');
        }

        // Check token scope
        if (!empty($scope)) {
            $this->checkScopeAccess($scope);
        }
    }

    /**
     * @param array $scope
     */
    public function checkScopeAccess($scope)
    {
        // todo: implement a check scope access logic here and throw an UnauthorizedException if invalid
    }
}
