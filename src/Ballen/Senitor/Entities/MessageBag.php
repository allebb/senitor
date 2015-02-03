<?php namespace Ballen\Senitor\Entities;

class MessageBag
{

    protected static $instance = null;
    private $items;
    private $xml;

    protected function __construct()
    {
        
    }

    protected function __clone()
    {
        
    }

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    /**
     * Add an item to the message bag.
     * @param string $key The 'tag' key
     * @param string $value The 'tag' value.
     */
    public function addItem($key, $value)
    {
        
    }

    public function setRaw($data)
    {
        if (!is_string($data)) {
            throw new \InvalidArgumentException("The expected format should be XML (string)");
        }
        $this->items = $data;
        return $this;
    }

    public function buildXml()
    {
        if (!is_null($this->xml)) {
            throw new \Ballen\Senitor\Exceptions\XmlSetException("XML data already exists, reset the bag or utilise getXml() method.");
        }
        if(count($this->items) == 0){
            throw new \InvalidArgumentException("There are zero configuration items set, use addItem() or setRaw() methods.");
        }
        $this->generateXml();
        return $this;
    }

    private function generateXml()
    {
        $xml_block = (string) null;
        foreach ($this->items as $key => $item) {
            $xml_block .= "<{$key}>$item</{$key}>";
        }
        return $xml_block;
    }
}
