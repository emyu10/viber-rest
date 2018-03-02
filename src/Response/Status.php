<?php
namespace emyu\Viber\Response;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request;

class Status
{
    protected $status = null;
    protected $statusMessage = null;
    protected $description = null;

    public static $statuses = array(
        'Success',
        'The webhook URL is not valid',
        'The authentication token is not valid',
        'There is an error in the request itself (missing comma, brackets, etc.)',
        'Some mandatory data is missing',
        'The receiver is not registered to Viber',
        'The receiver is not subscribed to the PA',
        'The public account is blocked',
        'The account associated with the token is not a public account.',
        'The public account is suspended',
        'No webhook was set for the public account',
        'The receiver is using a device or a Viber version that don\'t support public accounts',
        'Rate control breach',
        'Maximum supported PA version by all user\'s devices is less than the minApiVersion in the message',
        'minApiVersion is not compatible to the message fields',
        'other' => 'General error'
    );

    public function __construct($response, Request $request)
    {
        $responseArray = json_decode($response, true);
        $this->status = $responseArray['status'];
        $this->statusMessage = $responseArray['status_message'];
        $this->description = self::$statuses[$this->status];
        if ($this->status === 0) {
            return true;
        } else {
            throw new BadResponseException($this->statusMessage . ': ' . $this->description, $request);
        }
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
