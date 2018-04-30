<?php
    include 'dbConnection.php';
    
    $conn = getConnection("c9");
    
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $zipcode = $_GET['zipCode'];
    $password = sha1($_GET['password']);
    $username = $_GET['username'];
    
    
    // code below includes single quotes (SQL injection)
    // $sql = "SELECT * FROM lab9_user WHERE username = '$username'";
    
    $sql = "INSERT INTO lab9_user (username, firstName, lastName, password, zipCode) VALUES 
    (:username, :firstName, :lastName, :password, :zipCode)";
    
    
    $stmt = $conn->prepare($sql);
    $params = array(
        ":username" => $username,
        ":lastName" => $lastName,
        ":firstName" => $firstName,
        ":password" => $password,
        ":zipCode" => $zipcode
    );
    
    echo "true";
    // if($stmt->execute($params))
    // {
    //     echo "true";
    // }
    // else {
    //     echo "false";
    // }
    
?>