<?php

namespace Game\Model;

use Zend\InputFilter\InputFilter;
use Zend\Validator;

class ListingPhotos extends BaseModel
{

    public $listingPhotoId;
    public $belongsToListing;
    public $url;
    public $createdAt;
    public $updatedAt;

    public function exchangeArray($data)
    {
        $this->listingPhotoId = (!empty($data['listing_photo_id'])) ? $data['listing_photo_id'] : null;
        $this->belongsToListing = (!empty($data['belongs_to_listing'])) ? $data['belongs_to_listing'] : null;
        $this->url = (!empty($data['url'])) ? $data['url'] : null;
        $this->createdAt = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updatedAt = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'listing_photo_id',
            'required' => false,
            'filters' => array(
                array('name' => 'Int'),
            )
        ));

        return $inputFilter;
    }
}

?>