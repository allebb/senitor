<?php

namespace Ballen\Senitor;

use Ballen\Senitor\Senitor;
use Ballen\Senitor\Entities\Target;

/**
 * Senitor
 * 
 * Senitor is a PHP API client for the Sentora Web Hosting Panel Web Service Layer (XMWS)
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license https://github.com/bobsta63/senitor/blob/master/LICENSE
 * @link https://github.com/bobsta63/senitor
 * @link http://www.bobbyallen.me
 *
 */
class SenitorFactory
{

    /**
     * Create a new Senitor instance
     * @param string $server The Sentora Server base URL (eg. https://cp.yourdomain.com/)
     * @param string $api_key The Sentora Server API key.
     * @param string $user A username on the server.
     * @param string $pass A password on the server.
     * @param array $http_client_options Optional settings for the Guzzle/cURL client.
     * @return \Ballen\Senitor\Senitor
     */
    public static function create($server, $api_key, $user, $pass, $http_client_options = [])
    {
        $sentora_client = new Senitor(
            new Target($server, $user, $pass, $api_key)
        );

        if (!empty($http_client_options)) {
            $sentora_client->setHttpOptions($http_client_options);
        }

        return $sentora_client;
    }
}
