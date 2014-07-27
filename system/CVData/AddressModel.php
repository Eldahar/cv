<?php

namespace CVData;

use Database as DB;

class AddressModel extends DB\ParentModel {
    protected $tablename = 'address';
    protected $structname = 'AddressStruct';
} 