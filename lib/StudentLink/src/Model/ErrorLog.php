<?php
namespace StudentLink\Model;

use StudentLink\ValidationException;
use StudentLink\Model\Entity;

class ErrorLog extends Entity
{
    protected $data = array(
        'id'=>0,
        'error_type'=>null,
        'error_trace'=>null,
        'payload'=>null,
        'params'=>null,
        'date_created'=>null,
        'app_id'=>null
    );
    public function validate()
    {
    }
}
