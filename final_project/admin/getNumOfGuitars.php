<?php
include '../../dbConnection.php';
$conn = getConnection("GuitarsGalor");


     global $conn;
      $sql = "SELECT COUNT(productId)
      FROM product";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
       echo json_encode($record);
      
     


?>