<?php namespace Ballen\Senitor\Entities;

use GuzzleHttp\Message\Response as HttpClientResponse;

class XmwsResponse
{

    /**
     * The Guzzle HTTP response object
     * @var \GuzzleHttp\Message\Response
     */
    protected $http_response_object;

    public function __construct(HttpClientResponse $response)
    {
        $this->http_response_object = $response;
        echo $this->checkErrors();
    }

    /**
     * Accessor for the HTTP response object
     * @return \GuzzleHttp\Message\Response
     */
    public function response()
    {
        return $this->http_response_object;
    }


    private function checkErrors()
    {
        // Lets check the XMWS response for standard error codes and throw
        // exceptions for any that me may find.
    }
}
