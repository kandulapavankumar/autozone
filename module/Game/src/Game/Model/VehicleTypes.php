<?php

namespace Game\Model;

use Zend\InputFilter\InputFilter;
use Zend\Validator;

class VehicleTypes extends BaseModel
{

    public $vehicleId;
    public $vehicleName;
    public $createdAt;
    public $updatedAt;

    public function exchangeArray($data)
    {
        $this->vehicleId = (!empty($data['vehicle_id'])) ? $data['vehicle_id'] : null;
        $this->vehicleName = (!empty($data['vehicle_name'])) ? $data['vehicle_name'] : null;
        $this->createdAt = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updatedAt = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'vehicle_id',
            'required' => false,
            'filters' => array(
                array('name' => 'Int'),
            )
        ));

        return $inputFilter;
    }
}

?>