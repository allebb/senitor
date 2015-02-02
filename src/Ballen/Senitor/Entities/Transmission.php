<?php namespace Ballen\Senitor\Entities;

use Ballen\Senitor\Entities\Target;
use Ballen\Senitor\Entities\MessageBag;

class Transmission
{

    private $transmission;

    /**
     * Create a new transmission message (XMWS XML request)
     * @param \Ballen\Senitor\Entities\Target $target
     * @param \Ballen\Senitor\Entities\MessageBag $request
     */
    public function __construct(Target $target, MessageBag $request)
    {
        $this->transmission = $this->buildXml($target, $request);
    }

    /**
     * Build the transmission message XML
     * @param \Ballen\Senitor\Entities\Target $target
     * @param \Ballen\Senitor\Entities\MessageBag $request
     * @return type
     */
    private function buildXml(Target $target, MessageBag $request)
    {
        $auth_block = $target->getAuthBlock()->getXmlBlock();
        $xml = [
            '<?xml version="1.0" encoding="UTF-8"?>',
            '<xmws>',
            $auth_block,
            '<request>{ REQUEST METHOD TO BE ADDED HERE }</request>',
            '<content>" . $this->data . "</content>',
            '</xmws>'
        ];
        return implode(PHP_EOL, $xml);
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
