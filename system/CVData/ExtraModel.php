<?php

namespace CVData;

use Database as DB;

class ExtraModel extends DB\ParentModel {
    protected $tablename = 'extras';
    protected $structname = 'ExtraStruct';
} 