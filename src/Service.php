<?php
namespace emyu\Viber;

use GuzzleHttp\Client;

class Service implements ServiceInterface
{
    protected $authToken;
    protected $httpClient;
    const API_URL = 'https://chatapi.viber.com/pa/';

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
        $this->setClient();
    }

    protected function setClient()
    {
        $this->httpClient = new Client();
    }
    public function setWebhook($webhookUrl, array $eventTypes)
    {
        $data = [
            'form_params' => [
                'url' => $webhookUrl,
                'event_types' => $eventTypes
            ],
            'headers' => [
                'X-Viber-Auth-Token' => $this->authToken
            ]
        ];
        $res = $this->httpClient->request('POST', self::API_URL . 'set_webhook', $data);
        $body = json_decode($res->getBody());
        if ($res->getStatusCode() == 200 && $body->ok) {
            return $body->result;
        } else {
            return false;
        }
    }
    public function unsetWebhook(){
        echo 'this is the body';
    }
    public function sendMessage(
        $receiver,
        MessageTypeInterface $type,
        $senderName,
        $senderAvatar = null,
        $trackingData = null,
        KeyboardInterface $keyboard = null,
        $minApiVersion = null
    )
    {
        echo 'this is the body';
    }
    public function getAccountInfo(){
        echo 'this is another body';
        echo 'this is the body';
    }
    public function getUserDetails($userId){
        echo 'this is the body';
    }
    public function getOnlineUsers(array $userIds){
        echo 'this is the body';
    }
    public function post(
        $from,
        MessageTypeInterface $type,
        $senderName = null,
        $senderAvatar = null
    ){
        echo 'this is the body';
    }
}
