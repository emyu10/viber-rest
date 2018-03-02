<?php
namespace emyu\Viber\Message;

class Picture implements MessageTypeInterface
{
    private $type = 'picture';
    protected $text = null;
    protected $media = null;
    protected $thumbnail = null;

    public function __construct($text, $media, $thumbnail = null)
    {
        $this->text = $text;
        $this->media = $media;
        $this->thumbnail = $thumbnail;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }


    public function getPostData()
    {
        $data = array(
            'text' => $this->text,
            'media' => $this->media
        );
        if ($this->thumbnail != null) {
            $data['thumbnail'] = $this->thumbnail;
        }
        return $data;
    }
}
