<?php
namespace emyu\Viber\Message;

interface MessageTypeInterface
{
    public function getType();
    public function getPostData();
}
