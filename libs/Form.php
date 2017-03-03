<?php

/**
 *
 * - Fill out a form
 *	- POST to PHP
 *  - Sanitize
 *  - Validate
 *  - Return Data
 *  - Write to Database

 */

class Form
{

    private $_postData = array();

    public function __construct() {}

    /**
     *
     */
    public function post($field)
    {
        $this->_postData[$field] = $_POST[$field];
    }

    /**
     *
     */
    public function val()
    {

    }
}