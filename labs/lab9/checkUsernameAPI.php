<?php
    
    include 'dbConnection.php';
    
    $conn = getConnection("c9");
    
    $username = $_GET['username'];
    
    // code below includes single quotes (SQL injection)
    // $sql = "SELECT * FROM lab9_user WHERE username = '$username'";
    
    $sql = "SELECT * FROM lab9_user WHERE username = :username";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // print_r($record);
    
    echo json_encode($record);
    
    
?>