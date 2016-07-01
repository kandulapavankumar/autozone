<?php

namespace Game\Model;

use ZfcUser\Entity\UserInterface;
use Zend\Db\Sql\Expression;

class User implements UserInterface
{

    protected $userId;
    protected $email;
    protected $password;
    protected $username;
    protected $firstName;
    protected $lastName;
    protected $displayName;
    protected $role;
    protected $sellerType;
    protected $address1;
    protected $address2;
    protected $city;
    protected $state;
    protected $country;
    protected $zip;
    protected $phone;
    protected $website;
    protected $createdAt;
    protected $updatedAt;

    public function getId()
    {
        return $this->userId;
    }

    public function setId($id)
    {
        $this->userId = (int)$id;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function setMultipleFields($fields, $fieldValues)
    {
        foreach ($fields as $key => $value) {
            $this->$fields[$key] = $fieldValues[$key];
        }
        $this->setUpdatedAt(new Expression('NOW()'));
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = (int)$state;
        return $this;
    }
}

?>
