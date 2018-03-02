<?php
namespace emyu\Viber\Message;

class Sticker implements MessageTypeInterface
{
    private $type = 'sticker';
    protected $stickerId = null;
    protected $media = null;

    public function __construct($stickerId, $media = null)
    {
        $this->stickerId = $stickerId;
        $this->media = $media;
    }

    public function getStickerId()
    {
        return $this->stickerId;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getPostData()
    {
        $data = array('sticker_id' => $this->stickerId);
        if ($this->media != null) {
            $data['media'] = $this->media;
        }
        return $data;
    }
}
