<?php

namespace CVData;

use Database as DB;

class JobModel extends DB\ParentModel {
    protected $tablename = 'jobs';
    protected $structname = 'JobStruct';
} 