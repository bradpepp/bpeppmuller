<?php
include '../../dbConnection.php';
$dbConn = getConnection("GuitarsGalor");

function numOfGuitars(){
     global $conn;
      $sql = "SELECT COUNT(productId)
      FROM product";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
       print_r($record);
      
     }

function AvgPrice(){
     global $conn;
      $sql = "SELECT AVG(productPrice)
      FROM product";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
       print_r($record);
      
     }
function avgPopularity(){
     global $conn;
      $sql = "SELECT AVG(productPopularity)
      FROM product";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
       print_r($record);
      
     }

?>