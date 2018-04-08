<?php
    include '../../dbConnection.php';
    
    $conn = getConnection("heroku_d151356f269fc75");
    
    $productId = $_GET['productId'];
    
    $sql = "SELECT * FROM product
            NATURAL JOIN purchase
            WHERE productId = :pId";
    
    $np = array();
    $np[":pId"] = $productId;
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    echo $records[0]['productName'] . "<br/>";
    echo "<img src ='" . $records[0]['productImage'] . "' width = '200' /><br/>";
    
    foreach($records as $record)
    {
        echo "Purchase Date: " . $record['purchaseDate'] . "<br/>";
        echo "Unit Price: " . $record['unitPrice'] . "<br/>";
        echo "Quantity: " . $record['quantity'] . "<br/>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Purchase History </title>
        <style>
             @import url("styles.css");
        </style>
    </head>
    <body>
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Bradley Peppmuller <br />
            <strong> Disclaimer: </strong> This website is used only for academic purposes only. <br />
            
    </footer>
</html>