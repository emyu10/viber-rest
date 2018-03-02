<?php
namespace emyu\Viber;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\BadResponseException;
use emyu\Viber\Message\MessageTypeInterface;
use emyu\Viber\Response\Status;

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

    protected function makeRequest($endPoint, $data)
    {
        $json = json_encode($data);
        $request = new Request('POST', self::API_URL . $endPoint, array('X-Viber-Auth-Token' => $this->authToken, 'Content-Type' => 'application/json'), $json);
        $response = $this->httpClient->send($request);
        // $body = $response->getBody(), true);
        // if ($body['status_message'] == 'ok') {
        //     return true;
        // } else {
        //     throw new BadResponseException($body['status_message'], $request);
        // }
        return new Status($response->getBody(), $request);
    }
    public function setWebhook($webhookUrl, array $eventTypes = null)
    {
        $data = array(
            'url' => $webhookUrl,
            'event_types' => $eventTypes
        );
        return $this->makeRequest('set_webhook', $data);
    }
    public function unsetWebhook(){
        $data = array(
            'url' => ''
        );
        return $this->makeRequest('set_webhook', $data);
    }
    public function sendMessage
    (
        $receiver,
        MessageTypeInterface $type,
        $senderName,
        $senderAvatar = null,
        $trackingData = null,
        $minApiVersion = null
    )
    {
        $sender['name'] = $senderName;
        if ($senderAvatar != null) {
            $sender['avatar'] = $senderAvatar;
        }
        $data = array(
            'receiver' => $receiver,
            'type' => $type->getType()
        );
        $data['sender'] = $sender;
        if ($trackingData != null) {
            $data['tracking_data'] = $trackingData;
        }
        if ($minApiVersion != null) {
            $data['min_api_version'] = $minApiVersion;
        }
        $data = array_merge($data, $type->getPostData());
        return $this->makeRequest('send_message', $data);
    }
    // public function getAccountInfo(){
    //     echo 'this is the body';
    // }
    // public function getUserDetails($userId){
    //     echo 'this is the body';
    // }
    // public function getOnlineUsers(array $userIds){
    //     echo 'this is the body';
    // }
    // public function post(
    //     $from,
    //     MessageTypeInterface $type,
    //     $senderName = null,
    //     $senderAvatar = null
    // ){
    //     echo 'this is the body';
    // }
}
