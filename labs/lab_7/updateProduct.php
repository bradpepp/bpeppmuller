<?php
    include '../../dbConnection.php';
    
    $conn = getConnection("ottermart");
    
    function getProductInfo()
    {
        global $conn;
        
        $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
    
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $record = $stmt -> fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if(isset($_GET['updateProduct']))
    {
       
        
        $sql = "UPDATE om_product
                SET productName = :productName,
                    productDescription = :productDescription,
                    productImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE productId = :productId";
        
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productDescription"] = $_GET['productDescription'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute($np);
    }
    
    if(isset($_GET['productId']))
    {
        $product = getProductInfo();
            
        //print_r($product);
    }

    function getCategory()
    {
        global $conn, $product;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record)
        {
            if($record['catId'] == $product['catId'])
            {
                echo "<option selected value = '" . $record['catId'] . "'>" . $record['catName'] . " </option>";
            }
            else
            {
                echo "<option value = '" . $record['catId'] . "'>" . $record['catName'] . " </option>";
            }
        }
    }
    
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Product </title>
    </head>
    <style>
        @import url("styles.css");
    </style>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <body>
        <h1> Update Product </h1>
        
        <form>
            <input type = "hidden" name = "productId" value = "<?= $product['productId'] ?>"/>
            
            Product Name: <input type = "text" name = "productName" value = "<?= $product['productName'] ?>">
            <br/>
            Product Description:
            <br/>
            <textarea name = "productDescription" rows = "5" cols = "50"><?= $product['productDescription'] ?></textarea>
            <br/>
            Price: <input type = "text" name = "price" value = "<?= $product['price'] ?>">
            <br/>
            Image URL: <input type = "text" name = "productImage" value = "<?= $product['productImage'] ?>">
            <br/>
            Category:
            <select name = "catId">
                <?= getCategory() ?>
            </select>
            <br/>
            <input type = "submit" name = "updateProduct" value = "Update Product">
            <br/>
        </form>
        
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Bradley Peppmuller <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            
    </footer>
</html>