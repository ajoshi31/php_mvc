<?php

class Val 
{
	public function __construct()
	{
		
	}

    /**
     * @param $data
     * @param $arg
     * @return string
     */
	public function minlength($data,$arg){

	    if(strlen($data) < $arg){
	        return "Your string should be atleast $arg strng long";
        }
    }


    /**
     * @param $data
     * @param $arg
     * @return string
     */
    public function maxlength($data,$arg){

        if(strlen($data) > $arg){
            return "Your string can only be $arg short";
        }
    }

    /**
     * @param $data
     * @return string
     */
    public function digit($data){

        if(ctype_digit($data) == false){
            return "Your string must be a digit";
        }
    }

    /**
     * @param $name
     * @param $arguments
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }


}