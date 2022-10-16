<?php
//namespace controller;

class DVD extends Product{
    

    public function __construct(){
        
        $this->specification = $_POST['size'];
    }

    public function getsize(){
        return $this->specification;
    }
    
}


class Book extends Product{
    
    public function __construct(){
        $weight = $_POST['weight'];
        $this->specification = $weight;
    }
}

class Furniture extends Product{
    
    public function __construct(){
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $this->specification = $height . 'x' . $width . 'x' . $length;
    }
}

class Select extends Product{
    
    public function __construct(){
        $this->specification = 'Select';
    }
}


$productType = $_POST['productType']; /*aq ewera $productType */
$new = new $productType();

$specification = $new->specification;

class Product {
    public $specification;

    

}

class ProductFactory {

    public static function create($productType, $specification) {
       if ($productType === 'DVD') { 
             return new DVD($specification);
       }if($productType=== 'Book'){
            return new Book($specification);
       }if($productType==='Furniture'){
            return new Furniture($specification);
       }

    }
 }

 

 