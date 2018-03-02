<?php
namespace emyu\Viber\Message;

class MessageFactory
{
    private $message;

    final public function __construct()
    {
        //prevent constructor overriding
    }

    public static function get(array $message)
    {
        $instance = new self();
        $instance->message = $message;
        switch ($instance->message['type']) {
            case 'text': $message = new Text($instance->message['text']); break;
            case 'contact': $message = new Contact($instance->message['contact']['name'], $instance->message['contact']['phone_number'], $instance->message['text']); break;
            case 'file': $message = new File($instance->message['media'], $instance->message['size'], $instance->message['file_name']); break;
            case 'location': $message = new Location($instance->message['location']['lat'], $instance->message['location']['lon']); break;
            case 'picture': $message = new Picture($instance->message['text'], $instance->message['media'], $instance->message['thumbnail']); break;
            case 'sticker': $message = new Sticker($instance->message['sticker_id'], $instance->message['media']); break;
            default: $message = new Text("Could not determine the type of message.");
        }
        return $message;
    }
}
