<?php

class Dbh {

private $servername;
private $username;
private $password;
private $database;
public $conn;

  public function connect()
  {

    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->database = "products-list";

      // Create connection
      $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        
      if($this->conn->connect_error)
      {
          die ("<h1>Database Connection Failed</h1>");
      }
      //echo "Database Connected Successfully";
      return $this->conn;   
  }

  
  public function InsertData($specification){
    $sku = $_POST["sku"];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $productType = $_POST['productType'];

    $stmt = $this->conn->prepare("insert into products(sku, price, name, productType, specification) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $sku, $price, $name, $productType, $specification);
    
    $data = new user();
    $ss = $data->getAllUsers();
    
    $counter = 0;

    foreach($ss as $value) {
        if($value["sku"] === $sku){

            $counter++;

        } 
            
    }

    if($counter < 1){
        
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
        header('Location: index.php');

    } else {

        $message = "Product with this SKU already exists";
        echo "<script type='text/javascript'>alert('$message');</script>";        

    }
        
            


  }
}