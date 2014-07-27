<?php

namespace CVData;

use Database as DB;

class SchoolModel extends DB\ParentModel {
    protected $tablename = 'schools';
    protected $structname = 'SchoolStruct';
} 