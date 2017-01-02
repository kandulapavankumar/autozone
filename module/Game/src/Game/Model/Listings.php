<?php

namespace Game\Model;

use Zend\InputFilter\InputFilter;
use Zend\Validator;

class Listings extends BaseModel
{

    public $listingId;
    public $listingToUser;
    public $belongsToVehicleType;
    public $year;
    public $make;
    public $model;
    public $description;
    public $price;
    public $createdAt;
    public $updatedAt;

    public function exchangeArray($data)
    {
        $this->listingId = (!empty($data['listing_id'])) ? $data['listing_id'] : null;
        $this->listingToUser = (!empty($data['listing_to_user'])) ? $data['listing_to_user'] : null;
        $this->belongsToVehicleType = (!empty($data['belongs_to_vehicle_type'])) ? $data['belongs_to_vehicle_type'] : null;
        $this->year = (!empty($data['year'])) ? $data['year'] : null;
        $this->make = (!empty($data['make'])) ? $data['make'] : null;
        $this->model = (!empty($data['model'])) ? $data['model'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
        $this->price = (!empty($data['price'])) ? $data['price'] : null;
        $this->createdAt = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updatedAt = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'listing_id',
            'required' => false,
            'filters' => array(
                array('name' => 'Int'),
            )
        ));

        return $inputFilter;
    }
}

?>