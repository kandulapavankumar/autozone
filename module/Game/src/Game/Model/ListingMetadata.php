<?php

namespace Game\Model;

use Zend\InputFilter\InputFilter;
use Zend\Validator;

class ListingMetadata extends BaseModel
{

    public $listingMetadataId;
    public $belongsToListing;
    public $color;
    public $transmission;
    public $bodyType;
    public $note;
    public $createdAt;
    public $updatedAt;

    public function exchangeArray($data)
    {
        $this->listingMetadataId = (!empty($data['listing_metadata_id'])) ? $data['listing_metadata_id'] : null;
        $this->belongsToListing = (!empty($data['belongs_to_listing'])) ? $data['belongs_to_listing'] : null;
        $this->color = (!empty($data['color'])) ? $data['color'] : null;
        $this->transmission = (!empty($data['transmission'])) ? $data['transmission'] : null;
        $this->bodyType = (!empty($data['body_type'])) ? $data['body_type'] : null;
        $this->note = (!empty($data['note'])) ? $data['note'] : null;
        $this->createdAt = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updatedAt = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'listing_metadata_id',
            'required' => false,
            'filters' => array(
                array('name' => 'Int'),
            )
        ));

        return $inputFilter;
    }
}

?>