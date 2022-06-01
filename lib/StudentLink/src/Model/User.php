<?php
namespace StudentLink\Model;

use StudentLink\Type;
use StudentLink\Model\Entity;

class User extends Entity
{
    protected static $MODEL = array(
        'id' =>                 ['type' => Type::INTEGER,   'readonly' => true , 'required' => false],
        'fname' =>              ['type' => Type::STRING,    'readonly' => false, 'required' => true],
        'lname' =>              ['type' => Type::STRING,    'readonly' => false, 'required' => true],
        'username' =>           ['type' => Type::STRING,    'readonly' => false, 'required' => true],
        'password' =>           ['type' => Type::STRING,    'readonly' => false, 'required' => true],
        'sex' =>                ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'account_id' =>         ['type' => Type::INTEGER,   'readonly' => false, 'required' => true],
        'icon' =>               ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'date_of_birth' =>      ['type' => Type::DATE, 'readonly' => true,  'required' => false],
        'date_modified' =>      ['type' => Type::TIMESTAMP, 'readonly' => true,  'required' => false],
        'contact_number' =>     ['type' => Type::INTEGER,   'readonly' => false, 'required' => false],
        'modified_by' =>        ['type' => Type::INTEGER,   'readonly' => true,  'required' => false],
        'preferences' =>        ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'father_name' =>        ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'mother_name' =>        ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'address_1' =>          ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'address_2' =>          ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'city' =>               ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'state' =>              ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'zip' =>                ['type' => Type::INTEGER,    'readonly' => false, 'required' => true],
        'programme' =>          ['type' => Type::STRING,    'readonly' => false, 'required' => true],
        'batch' =>              ['type' => Type::STRING,    'readonly' => false, 'required' => true],
        'semester' =>           ['type' => Type::INTEGER,    'readonly' => false, 'required' => true],
        'regdate' =>            ['type' => Type::STRING,    'readonly' => false, 'required' => false],
        'department_id' =>      ['type' => Type::INTEGER,    'readonly' => false, 'required' => true],
    );

    public function &getModel()
    {
        return self::$MODEL;
    }
}