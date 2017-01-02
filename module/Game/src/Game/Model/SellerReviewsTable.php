<?php

namespace Game\Model;

class SellerReviewsTable extends BaseModelTable
{
    public function getReviewsByListingId($id)
    {
        $sql = $this->sql;
        $select = $sql->select();
        $select->from(array('ls' => 'listings'));
        $select->columns(
            array(
                'listing_to_user'
            )
        );
        $select->join(
            array('sr' => 'seller_reviews'), 'ls.listing_to_user = sr.belongs_to_user', array('rating', 'comment')
        );

        $select->join(
            array('us' => 'users'), 'ls.listing_to_user = us.user_id', array('first_name', 'last_name', 'email')
        );

        $select->group('sr.seller_review_id');

        $statement = $sql->prepareStatementForSqlObject($select);

        $resultSet = $statement->execute();
        $result = array();
        foreach ($resultSet as $row) {
            $result[] = $row;
        }

        return $result;
    }
}
