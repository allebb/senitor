<?php namespace Ballen\Senitor\Entities;

use GuzzleHttp\Message\Response as HttpClientResponse;

class XmwsResponse
{

    /**
     * The Guzzle HTTP response object
     * @var \GuzzleHttp\Message\Response
     */
    protected $http_response_object;

    /**
     * The XMWS respsonse code
     * @var string
     */
    protected $xmws_response_code;

    /**
     * The array of XML tags under the <content> tag.
     * @var array
     */
    protected $xmws_content_array;

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
        $response_code = (int) $this->response()->xml()->response;
        if (!isset($response_code)) {
            die("No XMWS response code was found!");
        }

        switch ($response_code) {
            case 1102:
                throw new \Ballen\Senitor\Exceptions\XmwsErrorResponse("The XMWS API module was not found on the target server.");
            case 1103:
                throw new \Ballen\Senitor\Exceptions\XmwsErrorResponse("Server	API	key	validation	failed.");
            case 1104:
                throw new \Ballen\Senitor\Exceptions\XmwsErrorResponse("User authentication	required but not provided.");
            case 1105:
                throw new \Ballen\Senitor\Exceptions\XmwsErrorResponse("Username and password validation failed.");
            case 1106:
                throw new \Ballen\Senitor\Exceptions\XmwsErrorResponse("Request	not	valid, XMWS is expecting some missing request tags.");
            case 1107:
                throw new \Ballen\Senitor\Exceptions\XmwsErrorResponse("Modular	web	service	not	found for this module.");
        }
    }
}
