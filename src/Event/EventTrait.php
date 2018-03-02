<?php
namespace emyu\Viber\Event;

trait EventTrait
{
    public function setHandler(HandlerInterface $handler)
    {
        $this->handler = $handler;
        $this->handler->setEvent($this);
    }

    public function getHandler()
    {
        if ($this->handler instanceof HandlerInterface) {
            return $this->handler;
        } else {
            throw new \InvalidArgumentException('$handler not set');
        }
    }

    public function setResponseArray(array $responseArray)
    {
        $this->responseArray = $responseArray;
    }
}
