<?php
namespace emyu\Viber\Message;

class Video implements MessageTypeInterface
{
    private $type = 'video';
    protected $media = null;
    protected $size = null;
    protected $duration = null;
    protected $thumbnail = null;

    public function __construct($media, $size, $duration = null, $thumbnail = null)
    {
        $this->media = $media;
        $this->size = $size;
        $this->duration = $duration;
        $this->thumbnail = $thumbnail;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }


    public function getPostData()
    {
        $data = array(
            'media' => $this->media,
            'size' => $this->size
        );
        if ($this->duration != null) {
            $data['duration'] = $this->duration;
        }
        if ($this->thumbnail != null) {
            $data['thumbnail'] = $this->thumbnail;
        }
        return $data;
    }
}
