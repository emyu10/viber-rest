<?php
namespace emyu\Viber\Event;

use emyu\Viber\Event\EventInterface;

interface HandlerInterface
{
    public function handle();
    public function setEvent(EventInterface $event);
}
