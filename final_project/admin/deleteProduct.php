<?php
    
    include '../../dbConnection.php';
    
    $conn = getConnection("GuitarsGalor");
    
    $sql = "DELETE FROM product WHERE productId = " . $_GET['productId'];
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    
    header("Location:admin.php");
    
?>