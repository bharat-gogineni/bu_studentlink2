<?php
namespace StudentLink\Model;

use StudentLink\Db\ModelTable;
use StudentLink\Model\Entity;
use Zend\Db\TableGateway\TableGatewayInterface;

class UserTable extends ModelTable
{
    public function __construct(TableGatewayInterface $tableGateway)
    {
        parent::__construct($tableGateway);
        $this->tableGateway = $tableGateway;
    }
}
