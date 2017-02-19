<?php
namespace emyu\Viber;

class Service implements ServiceInterface
{
    private $authToken;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
    }
}
