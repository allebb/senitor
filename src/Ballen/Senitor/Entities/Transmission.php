<?php namespace Ballen\Senitor\Entities;

use Ballen\Senitor\Entities\Target;
use Ballen\Senitor\Entities\MessageBag;

class Transmission
{

    private $transmission;
    private $endpoint;
    private $target;
    private $content;

    /**
     * Create a new transmission message (XMWS XML request)
     * @param \Ballen\Senitor\Entities\Target $target
     * @param string $endpoint The endpoint action/request.
     * @param \Ballen\Senitor\Entities\MessageBag $request
     */
    public function __construct(Target $target, $endpoint, MessageBag $request)
    {
        if (is_empty($request)) {
            throw new \Ballen\Senitor\Exceptions\InvalidXmwsEndpoint("The XMWS endpoint cannot be empty/null.");
        }
        $this->target = $target;
        $this->endpoint = $endpoint;
        $this->content = $request->getXml();
        $this->transmission = $this->buildXml($target, $request);
    }

    /**
     * Build the transmission message XML
     * @param \Ballen\Senitor\Entities\Target $target
     * @param \Ballen\Senitor\Entities\MessageBag $request
     * @return type
     */
    private function buildXml(Target $target)
    {
        $xml = [
            '<?xml version="1.0" encoding="UTF-8"?>',
            '<xmws>',
            $this->getAuthBlockXml($target),
            '<request>' . $this->getEndpoint() . '</request>',
            '<content>' . $this->getContentXml() . '</content>',
            '</xmws>'
        ];
        return implode(PHP_EOL, $xml);
    }

    private function getAuthBlockXml(Target $target)
    {
        return $target->getAuthBlock()->getXmlBlock();
    }

    private function getContentXml()
    {
        return $this->content;
    }

    private function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Output the generated XMWS message in XML format.
     * @return string
     */
    private function __toString()
    {
        return $this->transmission;
    }
}
