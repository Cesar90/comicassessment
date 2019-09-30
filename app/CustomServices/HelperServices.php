<?php

namespace App\CustomServices;

class HelperServices
{

    public function __construct()
    {
    }

    public static function sanitize_int($integer)
    {
        return filter_var($integer, FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 1)));
    }
}
