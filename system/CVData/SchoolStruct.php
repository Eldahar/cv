<?php

namespace CVData;

use Database as DB;

class SchoolStruct extends DB\ParentStruct {
    public $id;
    public $name;
    public $city;
    public $start_date;
    public $end_date;
    public $education;
} 