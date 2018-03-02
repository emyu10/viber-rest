<?php
namespace emyu\Viber\Message;

class Text implements MessageTypeInterface
{
    private $type = 'text';
    protected $text = null;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getPostData()
    {
        $data = array('text' => $this->text);
        return $data;
    }
}
