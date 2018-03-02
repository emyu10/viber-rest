<?php
namespace emyu\Viber\Event;

class Event
{
    private $responseArray;
    final public function __construct()
    {

    }

    public static function get($response)
    {
        $instance = new self();
        $instance->responseArray = json_decode($response, true);
        switch ($instance->responseArray['event']) {
            case 'message': $event = new MessageEvent($instance->responseArray); return $event; break;
            // default: break;
        }
    }
}
