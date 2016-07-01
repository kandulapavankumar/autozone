<?php

namespace Game\Model;

use Zend\InputFilter\InputFilter;
use Zend\Validator;

class SellerReviews extends BaseModel
{

    public $sellerReviewId;
    public $belongsToUser;
    public $rating;
    public $comment;
    public $createdAt;
    public $updatedAt;
    
    public function exchangeArray($data)
    {
        $this->sellerReviewId = (!empty($data['seller_review_id'])) ? $data['seller_review_id'] : null;
        $this->belongsToUser = (!empty($data['belongs_to_user'])) ? $data['belongs_to_user'] : null;
        $this->rating = (!empty($data['rating'])) ? $data['rating'] : null;
        $this->comment = (!empty($data['comment'])) ? $data['comment'] : null;
        $this->createdAt = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updatedAt = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'seller_review_id',
            'required' => false,
            'filters' => array(
                array('name' => 'Int'),
            )
        ));

        return $inputFilter;
    }
}

?>