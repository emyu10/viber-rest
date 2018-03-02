<?php
namespace emyu\Viber\Event;

use emyu\Viber\Event\HandlerInterface;

interface EventInterface
{
    public function setHandler(HandlerInterface $handler);
    public function getHandler();
    public function setResponseArray(array $responseArray);
}
