<?php

namespace App\Auth;

use Exception;
use Firebase\JWT\JWT;
use InvalidArgumentException;
use LogicException;
use Panda\Config\SharedConfiguration;
use Throwable;

/**
 * Class Token
 * @package App\Auth
 */
class Token
{
    /**
     * @var array|object
     */
    private $payload;

    /**
     * @var SharedConfiguration
     */
    private $configuration;

    /**
     * Token constructor.
     *
     * @param SharedConfiguration $configuration
     */
    public function __construct(SharedConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @param string $alg
     * @param string $keyId
     * @param array  $head
     *
     * @return string
     * @throws LogicException
     */
    public function encode($alg = 'HS256', $keyId = null, $head = null)
    {
        // Check payload
        if (empty($this->getPayload())) {
            throw new LogicException('There is no payload to encode.');
        }

        return JWT::encode($this->getPayload(), $this->getSignatureKey(), $alg, $keyId, $head);
    }

    /**
     * @param string $jwt
     * @param array  $allowed_algorithms
     *
     * @return $this
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function decode($jwt, $allowed_algorithms = ['HS256'])
    {
        // Check arguments
        if (empty($jwt)) {
            throw new InvalidArgumentException('The given JWT is empty.');
        }

        try {
            $jwt = JWT::decode($jwt, $this->getSignatureKey(), $allowed_algorithms);
            $this->payload = json_decode(json_encode($jwt), true);
        } catch (Throwable $ex) {
            throw new Exception('An error occurred while trying to decode the given jwt', 0, $ex);
        }


        return $this;
    }

    /**
     * @return mixed
     */
    protected function getSignatureKey()
    {
        return $this->configuration->get('services.jwt.key');
    }

    /**
     * @return array|object
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param array|object $payload
     *
     * @return Token
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;

        return $this;
    }
}
