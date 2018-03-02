<?php
namespace emyu\Viber\Message;

class Location implements MessageTypeInterface
{
    private $type = 'location';
    protected $latitude = null;
    protected $longitude = null;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getPostData()
    {
        $data = array(
            'location' => array(
                'lat' => $this->latitude,
                'lon' => $this->longitude
            )
        );
        return $data;
    }
}
