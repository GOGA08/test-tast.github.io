<?php

//namespace controller;

class Validator {

    private $data;
    private $errors = [];
    private static $fields = ['sku', 'price', 'name','productType'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function validateForm(){
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error('$field is not present in data');
                return;
            }
        }

        $this->validateSku();
        $this->validatePrice();
        $this->validateName();
        $this->validateProductType();
        return $this->errors;
    }

    private function validateSku(){

        $value = trim($this->data['sku']);

        if(empty($value)){
            $this->addErrorRequiered('sku');
        } else {
             if(!preg_match('/^[a-zA-Z0-9]{1,20}$/', $value)){
                 $this->addErrorRightData('sku'); //SKU must be 1-20 symbols long (chars & integers)
                }
        }
                
        
    }

    private function validatePrice(){

        $value = trim($this->data['price']);

        if(empty($value)){
            $this->addErrorRequiered('price');
        } else {
            // We need is_numeric to check for number (should no to be mainly integers)
             if(!is_numeric($value)){
                 $this->addErrorRightData('price');
             }
        }
    }    

    private function validateName(){

        $value = trim($this->data['name']);

        if(empty($value)){
            $this->addErrorRequiered('name');
        } else {
             if(!preg_match('/^[a-zA-Z0-9\s]{1,20}+$/', $value)){
                 $this->addErrorRightData('name'); // 'Name must be 1-20 symbols long (chars & integers)
             }
        }
    }

    private function validateProductType(){

        $value = trim($this->data['productType']);

        if($value === 'Select'){
            $this->addErrorRequiered('productType');
        }

        if($value === 'DVD'){
            $value = trim($this->data['size']);
            
            if(empty($value)){
                $this->addErrorRequiered('size');
            } else {
                 if(!preg_match('/^[1-9][0-9]{1,20}$/', $value)){
                     $this->addErrorRightData('size');
                 }

            }
        }

        if($value === 'Book'){
            $value = trim($this->data['weight']);
            
            if(empty($value)){
                $this->addErrorRequiered('weight');
            } else {
                 if(!preg_match('/^[1-9][0-9]{1,20}$/', $value)){
                     $this->addErrorRightData('weight');
                 }

            }
        }

        if($value === 'Furniture'){
            $value = trim($this->data['height']);
            
            if(empty($value)){
                $this->addErrorRequiered('height');
            } else {
                 if(!preg_match('/^[1-9][0-9]{1,20}$/', $value)){
                     $this->addErrorRightData('height');
                 }

            }

            $value = trim($this->data['width']);
            
            if(empty($value)){
                $this->addErrorRequiered('width');
            } else {
                 if(!preg_match('/^[1-9][0-9]{1,20}$/', $value)){
                     $this->addErrorRightData('width');
                 }

            }

            $value = trim($this->data['length']);
            
            if(empty($value)){
                $this->addErrorRequiered('length');
            } else {
                 if(!preg_match('/^[1-9][0-9]{1,20}$/', $value)){
                     $this->addErrorRightData('length');
                 }

            }
        }
    }

    private function addErrorRequiered($key){
        $message = 'Please, submit required data';
        $this->errors[$key] = $message;
    }

    private function addErrorRightData($key){
        $message = 'Please, provide the data of indicated type';
        $this->errors[$key] = $message;
    }
}

?>