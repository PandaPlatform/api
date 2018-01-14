<?php

namespace App\Controllers;

use App\Support\Helpers\HttpHelper;
use InvalidArgumentException;
use Panda\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController extends AccessController
{
    /**
     * @param string $message
     *
     * @return Response|\Symfony\Component\HttpFoundation\Response
     * @throws InvalidArgumentException
     */
    public function hello($message = null)
    {
        try {
            // Initialize call
            $this->setCurrentResponse(new JsonResponse());
            $statusCode = HttpHelper::getStatusCodeOnSuccess(HttpHelper::METHOD_GET);

            // Check api access
            $this->checkAccessWithRequest();

            // Set message
            $message = $message ?: 'World!';
            $content = sprintf('Hello, %s', $message);

            // Set response
            $responseContent = [
                'message' => $content,
            ];
            $this->getCurrentResponse()->setStatusCode($statusCode)->setJson(json_encode($responseContent));
        } catch (Throwable $ex) {
            // Handle Exception
            $this->handleException($ex);
        } finally {
            // Finalize and return response
            return $this->finalizeResponse();
        }
    }
}
