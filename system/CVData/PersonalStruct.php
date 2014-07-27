<?php

namespace CVData;
use Database as DB;

class PersonalStruct extends DB\ParentStruct {
    public $id;
    public $firstname;
    public $lastname;
    public $birthdate;
    public $email;
    public $phone;
} 