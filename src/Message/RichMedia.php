<?php
namespace emyu\Viber\Message;

class RichMedia implements MessageTypeInterface
{
    private $type = 'rich_media';
    protected $contactName = null;
    protected $contactPhoneNumber = null;

    public function __construct($contactName, $contactPhoneNumber)
    {
        $this->contactName = $contactName;
        $this->contactPhoneNumber = $contactPhoneNumber;
    }

    public function getContactName()
    {
        return $this->contactName;
    }

    public function getContactPhoneNumber()
    {
        return $this->contactPhoneNumber;
    }

    public function getPostData()
    {
        $data = array(
            'contact' => array(
                'name' => $this->contactName,
                'phone_number' => $this->contactPhoneNumber
            )
        );
        return $data;
    }
}
