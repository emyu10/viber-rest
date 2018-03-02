<?php
namespace emyu\Viber\Event;

use emyu\Viber\Message\MessageInterface;
use emyu\Viber\Entity\User;

class SubscribedEvent implements EventInterface
{
    protected $responseArray;
    protected $handler;
    protected $event = 'subscribed';
    protected $timestamp;
    protected $user;
    protected $messageToken;

    use EventTrait;

    public function __construct(array $responseArray)
    {
        $this->responseArray = $responseArray;
        $this->setTimestamp($this->responseArray['timestamp']);
        $this->setUser(new User($this->responseArray['user']));
        $this->setMessageToken($this->responseArray['message_token']);
    }
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function setMessageToken($messageToken)
    {
        $this->messageToken = $messageToken;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getUser()
    {
        return $this->user = $user;
    }

    public function getMessageToken()
    {
        return $this->messageToken;
    }
}
