<?php

namespace Ballen\Senitor\Exceptions;

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
class InvalidXmwsTargetAddress extends \Exception
{

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
