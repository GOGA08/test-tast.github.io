<?php
include '../controller/model/dbh.php';
include '../controller/user.inc.php';
include '../controller/viewuser.inc.php';

//require_once 'vendor/autoload.php';
/*spl_autoload_register(function($class_name)){ //include all class
    include 'controller/' . $class_name . '.php';
    include 'controller/model/' . $class_name . '.php';
}*/

?>

<!DOCTYPE html>

<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products page</title>
        <link rel="stylesheet" href="./style/style.css">

    </head>
    <body>

        <div id="header" >

            <div id="p_list">
                <h1 id="textprod">Product List</h1> 
            </div>

            <div class="btn-group">
                <button onclick="location.href='add-product.php'" id="add-button" name="submit" type="button" value="ADD">ADD</button>
                <button  form="product_form2" id="delete-product-btn" Type="submit" name="delete-product-btn">MASS DELETE</button>

            </div>

        </div>

        <div class="line"></div>


        <div class="middle-div">

            <!-- Get product boxes based on count of data (rows) from database -->
            <?php
            $users = new ViewUser();
            $users->ShowAllUsers();
            ?>

        </div>
        <div class="space"></div>
        <div class="line"></div>

        <div id="footer">
            <p id="assignment">Scandiweb Test asignment</p>
        </div>

    </body>
</html>