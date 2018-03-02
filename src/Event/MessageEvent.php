<?php
namespace emyu\Viber\Event;

use emyu\Viber\Message\MessageInterface;
use emyu\Viber\Entity\User;
use emyu\Viber\Message\MessageFactory;

class MessageEvent implements EventInterface
{
    protected $responseArray;
    protected $handler;
    protected $event = 'message';
    protected $timestamp;
    protected $messageToken;
    protected $sender; //instance of emyu\Viber\Entity\User;
    protected $message; //instance of emyu\Viber\Message\MessageInterface;
    protected $silent;

    use EventTrait;

    public function __construct(array $responseArray)
    {
        $this->setResponseArray($responseArray);
        $this->setTimestamp($responseArray['timestamp']);
        $this->setMessageToken($responseArray['message_token']);
        $this->setSender(new User($responseArray['sender']));
        $message = MessageFactory::get($responseArray['message']);
        $this->setMessage($message);
        $this->setSilent($responseArray['silent']);
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function setMessageToken($messageToken)
    {
        $this->messageToken = $messageToken;
    }

    public function setSender(User $sender)
    {
        $this->sender = $sender;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setSilent($silent)
    {
        $this->silent = $silent;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getMessageToken()
    {
        return $this->messageToken;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getSilent()
    {
        return $this->silent;
    }
}
