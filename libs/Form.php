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
require 'Form/Val.php';
class Form
{

    /** @var array $_currentItem The immediately posted item*/
    private $_currentItem = null;

    /**
     * @var array $_postData Stores the posted data
     */
    private $_postData = array();

    /** @var object $_val The validator object */
    private $_val = array();

    /** @var array $_error Holds the current forms errors */
    private $_error = array();


    /**
     * __construct - Instantiates the validator class
     *
     */
    public function __construct()
    {
        $this->_val = new Val();
    }

    /**
     * post : This is to run $_POST
     * @param $field
     * @return $this this returns form object after chaining
     */
    public function post($field)
    {
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }

    /**
     * fetch : returns the post data
     * @param bool $fieldName
     * @return array|mixed
     * This acts more of like a getter and setter
     */
    public function fetch($fieldName = false){
        if($fieldName){
            if(isset($this->_postData[$fieldName]))
                return $this->_postData[$fieldName];
            else
                false;
        }else{
            return $this->_postData;
        }
    }

    /**
     * @param $typeOfValidator
     * @param $arg
     * @return $this
     * val : This is to run Validate
     */
    public function val($typeOfValidator,$arg=null)
    {
        if($arg == null)
        {
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
        }
        else
        {
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem],$arg);
        }

        if($error)
        {
            $this->_error[$this->_currentItem] = $error;
        }
        return $this;
    }

    /**
     * submit - Handles the form, and throws an exception upon error.
     *
     * @return boolean
     *
     * @throws Exception
     */
    public function submit()
    {
        if (empty($this->_error))
        {
            return true;
        }
        else
        {
            $str = '';
            foreach ($this->_error as $key => $value)
            {
                $str .= $key . ' => ' . $value . "\n";
            }
            throw new Exception($str);
        }
    }

}