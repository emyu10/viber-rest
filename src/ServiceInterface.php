<?php
namespace emyu\Viber;

use emyu\Viber\Message\MessageTypeInterface;
use emyu\Viber\Keyboards\KeyboardInterface;

interface ServiceInterface
{
    const RESOURCE_URL = 'https://chatapi.viber.com/pa/';

    public function __construct($authToken);
    public function setWebhook($webhookUrl, array $eventTypes = null);
    public function unsetWebhook();
    public function sendMessage(
        $receiver,
        MessageTypeInterface $type,
        $senderName,
        $senderAvatar = null,
        $trackingData = null,
        $minApiVersion = null
    );
    // public function getAccountInfo();
    // public function getUserDetails($userId);
    // public function getOnlineUsers(array $userIds);
    // public function post(
    //     $from,
    //     MessageTypeInterface $type,
    //     $senderName = null,
    //     $senderAvatar = null
    // );
}
