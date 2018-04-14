<?php
    
    session_start();
    
    
    
    include '../../dbConnection.php';
    
    $conn = getConnection("ottermart");
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    
    
   
    $sql = "SELECT *
            FROM om_admin
            WHERE username = :username
            AND password = :password";
    
    $np = array();
    $np[":username"] = $username;
    $np[":password"] = $password;
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
    $record = $stmt -> fetch(PDO::FETCH_ASSOC); //only one single record (fetch() not fetchAll())
    
   
    
    if(empty($record))
    {
        
        $_SESSION['wrong'] = "Wrong username and/or password.";
        header("Location:index.php");
    }
    else
    {
        
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        
        header("Location:admin.php");
    }
    
    
?>