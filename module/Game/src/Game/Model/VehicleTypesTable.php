<?php

namespace Game\Model;

class VehicleTypesTable extends BaseModelTable
{
    public function getAllNames()
    {
        
        return $this->getAllRecords('vehicle_types', array('vehicle_id', 'vehicle_name'));
    }

}
