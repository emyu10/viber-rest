<?php
namespace emyu\Viber\Entity;

class User
{
    protected $response;
    protected $id;
    protected $name;
    protected $avatar;
    protected $language;
    protected $country;
    protected $apiVersion;

    public function __construct(array $response)
    {
        $this->response = $response;
        $this->setId($this->response['id']);
        $this->setName($this->response['name']);
        $this->setAvatar($this->response['avatar']);
        $this->setLanguage($this->response['language']);
        $this->setCountry($this->response['country']);
        $this->setApiVersion($this->response['api_version']);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getApiVersion()
    {
        return $this->apiVersion;
    }
}
