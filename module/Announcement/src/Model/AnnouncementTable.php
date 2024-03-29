<?php

namespace Announcement\Model;

use StudentLink\Db\ModelTable;
use StudentLink\Model\Entity;
use Zend\Db\TableGateway\TableGatewayInterface;

class AnnouncementTable extends ModelTable
{
    protected $tableGateway;
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
