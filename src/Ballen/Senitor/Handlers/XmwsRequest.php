<?php namespace Ballen\Senitor\Handlers;

use Ballen\Senitor\Entities\Transmission;
use GuzzleHttp\Client;

class XmwsRequest
{

    /**
     * Guzzle HTTP client instance.
     * @var type 
     */
    protected $http_client;

    /**
     * Custom options for the cURL/Guzzle request.
     * @var array
     */
    protected $options = [];

    /**
     * The API request body (XML string)
     * @var string 
     */
    protected $request_message;

    public function __construct(Transmission $request)
    {
        $this->request_message = $request;
    }

    /**
     * Set additonal options for the Guzzle client request.
     * @param array $options
     */
    private function setOptions(array $options)
    {
        $this->options = $options;
    }

    private function initClient()
    {
        $this->http_client = new Client();
    }

    private function send()
    {
        
    }
}
