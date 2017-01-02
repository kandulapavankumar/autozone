<?php

namespace Game\Model;

class BaseModel
{

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        return null;
    }

    public function isValid()
    {
        $filter = $this->getInputFilter();
        if ($filter) {
            $filter->setData($this->getArrayCopy());
            if ($filter->isValid()) {
                return true;
            } else {
                return $filter->getMessages();
            }
        }
        return true;
    }

    public function exchangeArray($data)
    {

    }

}

?>