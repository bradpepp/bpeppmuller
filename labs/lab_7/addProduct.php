<?php
    session_start();

    if(!isset($_SESSION['adminName']))
    {
        header("Location:index.php");
    }
    
    include '../../dbConnection.php';
    
    $conn = getConnection("ottermart");
    
    function getCategory()
    {
        global $conn;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record)
        {
            echo "<option value = '" . $record['catId'] . "'>" . $record['catName'] . " </option>";
        }
    }
    
    if(isset($_GET['submit']))
    {
        $name = $_GET['productName'];
        $description = $_GET['productDescription'];
        $price = $_GET['price'];
        $url = $_GET['productImage'];
        $category = $_GET['catId'];
        
        $sql = "INSERT INTO om_product(`productName`, `productDescription`, `productImage`, `price`, `catId`)
        VALUES(:name, :description, :url, :price, :category)";
        
        $np = array();
        $np[":name"] = $name;
        $np[":description"] = $description;
        $np[":url"] = $url;
        $np[":price"] = $price;
        $np[":category"] = $category;
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute($np);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Add Product </title>
    </head>
    <style>
        @import url("styles.css");
    </style>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <body>
        <h1> Add Product </h1>
        
        <form>
            Product Name: <input type = "text" name = "productName">
            <br/>
            Product Description:
            <br/>
            <textarea name = "productDescription" rows = "5" cols = "50">Enter description here.</textarea>
            <br/>
            Price: <input type = "text" name = "price">
            <br/>
            Image URL: <input type = "text" name = "productImage">
            <br/>
            Category:
            <select name = "catId">
                <option value = "">Select One</option>
                <?= getCategory() ?>
            </select>
            <br/>
            <input type = "submit" name = "submit">
            <br/>
        </form>
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Bradley Peppmuller <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            
            
    </footer>
</html>