<?php
namespace emyu\Viber\Message;

class File implements MessageTypeInterface
{
    private $type = 'file';
    protected $media = null;
    protected $size = null;
    protected $fileName = null;

    public function __construct($media, $size, $fileName)
    {
        $this->media = $media;
        $this->size = $size;
        $this->fileName = $fileName;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function getPostData()
    {
        $data = array(
            'media' => $this->media,
            'size' => $this->size,
            'file_name' => $this->fileName
        );
        return $data;
    }
}
