<?php
namespace StudentLink\Model;

use StudentLink\Db\ModelTable;
use StudentLink\Model\Entity;
use Zend\Db\TableGateway\TableGatewayInterface;

class UserCacheTable extends ModelTable
{
    public function __construct(TableGatewayInterface $tableGateway)
    {
        parent::__construct($tableGateway);
        $this->tableGateway = $tableGateway;
    }

    public function save(Entity $data)
    {
        $data = $data->toArray();
        return $this->internalSave($data);
    }
}
