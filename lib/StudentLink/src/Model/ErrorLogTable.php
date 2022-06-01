<?php

namespace StudentLink\Model;

use StudentLink\Db\ModelTable;
use StudentLink\Model\Entity;
use Zend\Db\TableGateway\TableGatewayInterface;

class ErrorLogTable extends ModelTable
{
    public function __construct(TableGatewayInterface $tableGateway)
    {
        parent::__construct($tableGateway);
    }

    public function save(Entity $data)
    {
        return $this->internalSave($data->toArray());
    }
}
