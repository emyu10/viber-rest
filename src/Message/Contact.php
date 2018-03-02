<?php
namespace emyu\Viber\Message;

class Contact implements MessageTypeInterface
{
    private $type = 'contact';
    protected $contactName = null;
    protected $contactPhoneNumber = null;
    protected $text = null;

    public function __construct($contactName, $contactPhoneNumber, $text = null)
    {
        $this->contactName = $contactName;
        $this->contactPhoneNumber = $contactPhoneNumber;
        $this->text = $text;
    }

    public function getContactName()
    {
        return $this->contactName;
    }

    public function getContactPhoneNumber()
    {
        return $this->contactPhoneNumber;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getPostData()
    {
        $data = array(
            'contact' => array(
                'name' => $this->contactName,
                'phone_number' => $this->contactPhoneNumber
            )
        );
        if ($this->text != null) {
            $data['text'] = $this->text;
        }
        return $data;
    }
}
