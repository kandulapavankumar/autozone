<?php

namespace Game\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\ServiceManager\ServiceManager;

class BaseModelTable
{

    protected $tableGateway;
    protected $sm;

    public function __construct(TableGateway $tableGateway, ServiceManager $sm = null)
    {
        $this->tableGateway = $tableGateway;
        $this->sql = $this->getSql();
        $this->sm = $sm;
    }

    public function getSql()
    {
        $dbAdapter = $this->tableGateway->adapter;
        $sql = new Sql($dbAdapter);

        return $sql;
    }

    protected function addRecord($model)
    {
        $isValid = $model->isValid();
        $id = 0;

        if ($isValid === true) {
            $data = $model->getArrayCopy();
            $data['created_at'] = new Expression('now()');
            $data['updated_at'] = new Expression('now()');

            $status = $this->tableGateway->insert($data);
            $id = $this->tableGateway->lastInsertValue;
        }

        return $id;
    }

    public function getRecordsCustomField($columnName, $columnValue)
    {
        $defaultErrorMessage = "Error occurred while retrieving from DataBase";
        $returnArray = array(
            'success' => false,
            'message' => $defaultErrorMessage
        );

        $whereArray = array();
        if (is_array($columnName)) {
            foreach ($columnName as $key => $value) {
                $whereArray[$columnName[$key]] = $columnValue[$key];
            }
        } else {
            $whereArray[$columnName] = $columnValue;
        }
        $result = $this->tableGateway->select($whereArray);

        $returnArray = array();
        foreach ($result as $projectRow) {
            $returnArray[] = $projectRow;
        }

        return $returnArray;
    }

    public function getFieldsWithCustomField($table, $columnName, $columnValue, $fields)
    {
        $totalSql = $this->getSql();
        $totalSelect = $totalSql->select();
        $totalSelect->from(array('t' => $table));
        $totalSelect->columns($fields);

        $whereArray = array();
        if (is_array($columnName)) {
            foreach ($columnName as $key => $value) {
                $whereArray[$columnName[$key]] = $columnValue[$key];
            }
        } else {
            $whereArray[$columnName] = $columnValue;
        }
        $totalSelect->where($whereArray);

        $totalStatement = $totalSql->prepareStatementForSqlObject($totalSelect);
        $totalResultSet = $totalStatement->execute();

        $result = array();
        foreach ($totalResultSet as $projectRow) {
            $result[] = $projectRow;
        }

        if (count($result) == 1 && count($result[0]) == 1) {

            $result = reset($result[0]);
        } elseif (count($result) > 1 && count($result[0]) == 1) {

            foreach ($result as $key => $value) {
                if (count($value) == 1) {
                    $result[$key] = reset($value);
                }
            }
        }

        return $result;
    }

    public function getAllRecords($table, $columnNames)
    {
        $sql = $this->sql;
        $select = $sql->select();
        $select->from(array('c' => $table));
        $select->columns($columnNames);

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();
        $result = array();
        foreach ($resultSet as $projectRow) {
            $result[] = $projectRow;
        }

        return $result;
    }


    public function getById($sessionId)
    {
        $result = array();
        try {
            $whereArray = array();
            $whereArray['id'] = $sessionId;
            $tableData = $this->tableGateway->select($whereArray);

            foreach ($tableData as $projectRow) {
                $result[] = $projectRow;
            }
        } catch (\Exception $e) {
            return false;
        }

        return $result;
    }

    public function updateRecord($data, $where)
    {
        $data['updated_at'] = new Expression('now()');
        $status = $this->tableGateway->update($data, $where);

        return $status;
    }

    public function executeSql($sql)
    {
        $statement = $this->tableGateway->adapter->query($sql);
        return $statement->execute();
    }
}
