<?php

namespace CVData;

use Database as DB;

class JobStruct extends DB\ParentStruct {
    public $id;
    public $company_name;
    public $company_headquarter;
    public $jobname;
    public $start_date;
    public $end_date = null;
    public $description;
} 