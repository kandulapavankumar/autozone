<?php

namespace Game\Model;

class UsersTable extends BaseModelTable
{
    public function getUserRole($userId)
    {
        $sql = $this->sql;
        $select = $sql->select();
        $select->from(array('u' => 'users'));
        $select->columns(
            array(
                'role'
            )
        );

        $select->where(array(
            'u.user_id' => $userId
        ));

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();
        $result = array();
        foreach ($resultSet as $projectRow) {
            $result = $projectRow['role'];
        }

        return $result;
    }
}
