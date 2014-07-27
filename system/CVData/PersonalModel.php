<?php

namespace CVData;

use Database as DB;

class PersonalModel extends DB\ParentModel {
    protected $tablename = 'personal';
    protected $structname = 'PersonalStruct';
} 