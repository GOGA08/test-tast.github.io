<?php
//namespace controller;

class ViewUser extends User {

    public $deleteID; 

    public function DeleteData($deleteID){
        $delete = "DELETE FROM products WHERE SKU = '$deleteID'";
        mysqli_query($this->conn, $delete);
    }

  public function ShowAllUsers()
  {
    $products = $this->getAllUsers();

    if(isset($_POST["delete-product-btn"])){
        
        if(isset($_POST["deleteid"])){
            foreach ($_POST["deleteid"] as $deleteID){
                $this->DeleteData($deleteID);
                header("Refresh:0");
            
            }
        } else {
            if(!isset($_POST["deleteid"])){
                $message = "Please check an item to delete";
                echo "<script type='text/javascript'>alert('$message');</script>";

            }
    }
}
    ?>
    
    <form id="product_form2" action="index.php" method="POST">
    <?php foreach($products as $product) { ?>

        <div class="prods_outter">
            
            <input class="delete-checkbox" type="checkbox" name="deleteid[]" value="<?= $product['sku']?>">

            <div class="prods">                    
                <p><?= htmlspecialchars($product['sku'])?> </p>
                <p><?= htmlspecialchars($product['name'])?></p>
                <p><?= htmlspecialchars($product['price']) . ' $'?> </p>

                <p>
                    <?php
                        if($product['productType'] === 'DVD'){
                            echo 'Size: ';
                        } elseif ($product['productType'] === 'Book'){
                            echo 'Weight: ';
                        } elseif ($product['productType'] === 'Furniture'){
                            echo 'Dimension: ';
                        }

                        echo htmlspecialchars($product['specification']);

                        if($product['productType'] === 'DVD'){
                            echo ' MB';
                        } elseif ($product['productType'] === 'Book'){
                            echo 'KG';
                        }
                    ?>
                </p>
            
            </div>
            
        </div>
    <?php } ?>
    </form>

 <?php }

}

?>