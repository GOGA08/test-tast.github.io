<?php
 
 //require_once 'vendor/autoload.php';

    if(isset($_POST['submit'])){

        include '../controller/model/dbh.php';
        include '../controller/user.inc.php';
        include '../controller/viewuser.inc.php';

        /*spl_autoload_register(function($class_name)){ //include all class
            include 'controller/' . $class_name . '.php';
            include 'controller/model/' . $class_name . '.php';
            }*/

        $connect = new Dbh();
        $conn = $connect->connect();

        include '../controller/productTypes.class.php';

        require '../controller/validatorclass.php';

        if(isset($_POST['submit'])){
            // validate
            $validation = new Validator($_POST);
            $errors = $validation->validateForm();

            if(count($errors) === 0){
                $connect->insertdata($specification);
            }

        }

    } else {}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" href="./style/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script type="application/javascript">
    </script>
    </head>
    <body>

        <div id="header">
            <div id="p_list">
                <h1 id="textprod">Product Add</h1> 
            </div>
            <div class="btn-group">
                <button form="product_form" id="save-btn" name="submit" type="submit" value="Save">Save</button>
                <button onclick="location.href='index.php'" id="cancel-btn" name="Cancel" type="submit" value="Cancel">Cancel</button>
            </div>
        </div>

        <div class="line"></div>

        <div class="middle-div">
            <div id="border">

                <form id="product_form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    
                <label for="sku">SKU</label>
                    <input class="form-element" id="sku" name="sku" value="<?= $_POST['sku'] ?? ''?>">

                    <div class="error">
                        <?= $errors['sku'] ?? '' ?>
                    </div>

                    <br><br>
                    <label for="name">Name</label>
                    <input class="form-element" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>">

                    <div class="error">
                        <?= $errors['name'] ?? '' ?>
                    </div>

                    <br><br>
                    <label for="price">Price ($)</label>
                    <input class="form-element" id="price" name="price" value="<?= $_POST['price'] ?? '' ?>">
                                                            
                    <div class="error">
                        <?= $errors['price'] ?? '' ?>
                    </div>
                    
                    <br><br><br>
                    <label for="productType">Type Switcher</label>
                    
                    <select class="form-element" name="productType" id="productType" value="<?= $_POST['productType'] ?? '' ?>">

                        <option value = 'Select'></option>
                        <option value = 'DVD'>DVD</option>
                        <option value = 'Book'>Book</option>
                        <option value = 'Furniture'>Furniture</option>
                        
                    </select>
     
                    <div class="error">
                        <?= $errors['productType'] ?? '' ?>
                    </div>

                    <div class="error">
                        <?= $errors['size'] ?? '' ?>
                    </div>
                    
                    <br><br>

                    <div id="insideform">

                        <script>

                        $(".form-element").change(function()
                        {
                            $type = $(this).val();
                                $(".details").css("display","none");
                                $('#' + $type).css("display","inline-block");
                        });

                        </script>

                        <div class='details' id='DVD'>
                            <label for="size">SIZE (MB)</label>
                            <input class="form-element" type="number" id="size" name="size"  value="<?= $_POST['size'] ?? '' ?>">
                            <br><br>
                            <p class="additional">Please, provide size</p>
                        </div>

                        <div class='details' id='Book'>
                            <label>WEIGHT (KG)</label>
                            <input class="form-element" type="number" id="weight" name="weight" value="<?= $_POST['weight'] ?? '' ?>">
                            <br><br>
                            <p class="additional">Please, provide weight</p>
                        </div>

                        <div class='details' id='Furniture'>
                            <label>Height (CM)</label>
                            <input class="form-element" type="number" id="height" name="height" value="<?= $_POST['height'] ?? '' ?>">
                            <br><br>
                            <label>Width (CM)</label>
                            <input class="form-element" type="number" id="width" name="width" value="<?= $_POST['width'] ?? '' ?>">
                            <br><br>
                            <label>Length (CM)</label>
                            <input class="form-element" type="number" id="length" name="length" value="<?= $_POST['length'] ?? '' ?>">
                            <br><br>
                            <p class="additional">Please, provide dimensions</p>
                        </div>
                    </div>
                    
                </form>
            </div>
            
        </div>


        <div class="line"></div>

        <div id="footer">
            <p id="assignment">Scandiweb Test asignment</p>
        </div>

    </body>
</html>