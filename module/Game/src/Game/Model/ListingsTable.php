<?php

namespace Game\Model;

use Zend\Db\Sql\Expression;

class ListingsTable extends BaseModelTable
{
    public function getAll()
    {
        $sql = $this->sql;
        $select = $sql->select();
        $select->from(array('ls' => 'listings'));
        $select->columns(
            array(
                'listing_id',
                'make',
                'model',
                'year',
                'price'
            )
        );
        $select->join(
            array('li' => 'listing_photos'), 'ls.listing_id = li.belongs_to_listing', array('url', 'id' => new Expression('MIN(listing_photo_id)'))
        );
        $select->group('li.belongs_to_listing');

        $statement = $sql->prepareStatementForSqlObject($select);

        $resultSet = $statement->execute();
        $result = array();
        foreach ($resultSet as $row) {
            $result[] = $row;
        }

        return $result;
    }

    public function getListing($id)
    {
        $sql = $this->sql;
        $select = $sql->select();
        $select->from(array('ls' => 'listings'));
        $select->columns(
            array(
                'listing_id',
                'make',
                'model',
                'year',
                'price'
            )
        );
        $select->join(
            array('li' => 'listing_photos'), 'ls.listing_id = li.belongs_to_listing', array('url' => new Expression("GROUP_CONCAT(li.url)"))
        );
        $select->join(
            array('lm' => 'listing_metadata'), 'ls.listing_id = lm.belongs_to_listing', array('color', 'transmission', 'body_type', 'note')
        );

        $select->where(array('ls.listing_id' => $id));

        $statement = $sql->prepareStatementForSqlObject($select);

        $resultSet = $statement->execute();
        $result = array();
        foreach ($resultSet as $row) {
            $result[] = $row;
        }

        return $result;
    }

    public function search($vehicleType, $keyword, $maximumPrice, $minimumPrice)
    {
        $sql = $this->sql;
        $select = $sql->select();
        $select->from(array('ls' => 'listings'));
        $select->columns(
            array(
                'listing_id',
                'make',
                'model',
                'year',
                'price'
            )
        );
        $select->join(
            array('li' => 'listing_photos'), 'ls.listing_id = li.belongs_to_listing', array('url', 'id' => new Expression('MIN(listing_photo_id)'))
        );
        $select->group('li.belongs_to_listing');

        if (isset($vehicleType) && $vehicleType != null) {
            $select->where(array('ls.belongs_to_vehicle_type' => $vehicleType));
        }

        if (isset($minimumPrice) && $minimumPrice != null) {
            $select->where->greaterThanOrEqualTo('ls.price', ($minimumPrice));
        }

        if (isset($maximumPrice) && $maximumPrice != null) {
            $select->where->lessThanOrEqualTo('ls.price', ($maximumPrice));
        }

        if (isset($keyword) && $keyword != null) {
            $select->where->like('make', '%' . $keyword . '%')
                ->OR
                ->like('model', '%' . $keyword . '%')
                ->OR
                ->like('description', '%' . $keyword . '%');
        }

        $statement = $sql->prepareStatementForSqlObject($select);

        $resultSet = $statement->execute();
        $result = array();
        foreach ($resultSet as $row) {
            $result[] = $row;
        }

        return $result;
    }

    public function getUserEmailByListingId($id)
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
            array('us' => 'users'), 'ls.listing_to_user = us.user_id', array('email')
        );

        $select->group('us.user_id');

        $statement = $sql->prepareStatementForSqlObject($select);

        $resultSet = $statement->execute();
        $result = array();
        foreach ($resultSet as $row) {
            $result = $row['email'];
        }

        return $result;
    }
}
