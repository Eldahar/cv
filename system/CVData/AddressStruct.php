<?php

namespace CVData;

use Database as DB;

class AddressStruct extends DB\ParentStruct {
    public $id;
    public $country;
    public $postcode;
    public $city;
    public $address1;
    public $address2;
} 