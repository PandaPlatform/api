<?php

namespace App\Support\Helpers;

use Panda\Support\Helpers\ArrayHelper;
use Panda\Http\Response;

/**
 * Class HttpHelper
 * @package App\Support\Helpers
 */
class HttpHelper
{
    const METHOD_POST = 'post';
    const METHOD_GET = 'get';
    const METHOD_PUT = 'put';
    const METHOD_PATCH = 'patch';
    const METHOD_DELETE = 'delete';
    const METHOD_DELETE_WITH_CONTENT = 'delete_with_content';
    const METHOD_ALIAS_CREATE = 'create';
    const METHOD_ALIAS_UPDATE_WITH_CONTENT = 'update_with_content';
    const METHOD_ALIAS_UPDATE_WITHOUT_CONTENT = 'update_without_content';
    const METHOD_ALIAS_SUCCESS = "success";
    const METHOD_ALIAS_SUCCESS_WITHOUT_CONTENT = 'success_without_content';

    /**
     * @var array
     */
    protected static $successStatusCodes = [
        self::METHOD_POST => Response::HTTP_CREATED,
        self::METHOD_GET => Response::HTTP_OK,
        self::METHOD_PUT => Response::HTTP_OK,
        self::METHOD_PATCH => Response::HTTP_OK,
        self::METHOD_DELETE => Response::HTTP_NO_CONTENT,
        self::METHOD_DELETE_WITH_CONTENT => Response::HTTP_OK,
        self::METHOD_ALIAS_CREATE => Response::HTTP_CREATED,
        self::METHOD_ALIAS_UPDATE_WITH_CONTENT => Response::HTTP_OK,
        self::METHOD_ALIAS_UPDATE_WITHOUT_CONTENT => Response::HTTP_NO_CONTENT,
        self::METHOD_ALIAS_SUCCESS => Response::HTTP_OK,
        self::METHOD_ALIAS_SUCCESS_WITHOUT_CONTENT => Response::HTTP_NO_CONTENT,
    ];

    /**
     * @param string $method
     *
     * @return int
     */
    public static function getStatusCodeOnSuccess($method)
    {
        return ArrayHelper::get(self::$successStatusCodes, strtolower($method), 200);
    }
}
