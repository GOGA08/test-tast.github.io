<?php
//namespace controller;

class User extends Dbh {

  public function getAllUsers()
  {

    //query for products
    $sql = 'SELECT * FROM products ORDER BY SKU';
        
    //get result
    $result = $this->connect()->query($sql);

    //fetch as an array
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    //free var from memory 
    mysqli_free_result($result);

    return $products;
  }

}