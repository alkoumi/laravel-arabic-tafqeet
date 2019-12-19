<?php


namespace AliAbdalla\Tafqeet\Helper;


trait Validation
{

    public function initValidation()
    {
    	
        if(is_numeric($this->parsed_number))
            return $this;
        else
            die('is not right number ');
    }
}