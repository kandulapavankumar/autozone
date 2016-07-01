<?php

namespace Game\Model;

use Zend\InputFilter\InputFilter;
use Zend\Validator;

class Users extends BaseModel
{

    public $userId;
    public $email;
    public $password;
    public $username;
    public $firstName;
    public $lastName;
    public $displayName;
    public $role;
    public $sellerType;
    public $address1;
    public $address2;
    public $city;
    public $state;
    public $country;
    public $zip;
    public $phone;
    public $website;
    public $createdAt;
    public $updatedAt;

    public function exchangeArray($data)
    {
        $this->userId = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null;
        $this->firstName = (!empty($data['first_name'])) ? $data['first_name'] : null;
        $this->lastName = (!empty($data['last_name'])) ? $data['last_name'] : null;
        $this->displayName = (!empty($data['display_name'])) ? $data['display_name'] : null;
        $this->role = (!empty($data['role'])) ? $data['role'] : null;
        $this->sellerType = (!empty($data['seller_type'])) ? $data['seller_type'] : null;
        $this->address1 = (!empty($data['address1'])) ? $data['address1'] : null;
        $this->address2 = (!empty($data['address2'])) ? $data['address2'] : null;
        $this->city = (!empty($data['city'])) ? $data['city'] : null;
        $this->state = (!empty($data['state'])) ? $data['state'] : null;
        $this->country = (!empty($data['country'])) ? $data['country'] : null;
        $this->zip = (!empty($data['zip'])) ? $data['zip'] : null;
        $this->phone = (!empty($data['phone'])) ? $data['phone'] : null;
        $this->website = (!empty($data['website'])) ? $data['website'] : null;
        $this->createdAt = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updatedAt = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'user_id',
            'required' => false,
            'filters' => array(
                array('name' => 'Int'),
            )
        ));

        return $inputFilter;
    }
}

?>