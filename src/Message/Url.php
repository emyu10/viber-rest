<?php
namespace emyu\Viber\Message;

class Url implements MessageTypeInterface
{
    private $type = 'url';
    protected $media = null;

    public function __construct($media)
    {
        $this->media = $media;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getPostData()
    {
        $data = array(
            'media' => $this->media
        );
        return $data;
    }
}
