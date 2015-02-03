<?php namespace Ballen\Senitor;

use Ballen\Senitor\Entities\Target;
use Ballen\Senitor\Entities\MessageBag;

class Senitor
{

    const SENITOR_VERSION = "1.0.0";

    /**
     * The XMWS user/server credentials object
     * @var \Ballen\Senitor\Entities\Target 
     */
    protected $credentials;
    protected $module;
    protected $endpoint;
    protected $data;

    public function __construct($credentials = null)
    {
        if ($credentials instanceof Target) {
            $this->credentials = $credentials;
        }
    }

    /**
     * Set credentials and server details.
     * @param \Ballen\Senitor\Entities\Target $credentials
     * @return \Ballen\Senitor\Senitor
     */
    public function setCredentials(Target $credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * Sets the XMWS API endpoint (or more specifically, the webservice.ext.php method to call)
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Set request data to be sent with the XMWS request.
     * @param \Ballen\Senitor\Entities\MessageBag $data
     * @return \Ballen\Senitor\Senitor
     * @throws \InvalidArgumentException
     */
    public function setRequestData($data = null)
    {
        if (is_null($data)) {
            throw new \InvalidArgumentException("Request data cannot be null, an array or instance of Ballen\Senitor\Entities\MessageBag must be provided");
        }
        if ($data instanceof MessageBag) {
            $this->data = $data;
        }
        if (is_array($data)) {
            $this->data = MessageBag::getInstance();
            $data->setItems($data);
        }
        return $this;
    }

    /**
     * Dispatch the XMWS request and return the response object.
     */
    public final function send()
    {
        $this->request = new \Ballen\Senitor\Entities\Transmission($target, $endpoint, $request);
    }

    /**
     * Return the version of the Senitor Client version (useful for feature checking)
     * @return string
     */
    public final function getClientVersion()
    {
        return (double) self::SENITOR_VERSION;
    }
}
