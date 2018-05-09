<?php
    session_start();

    session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
    </head>
    <style>
        @import url("styles.css");
    </style>
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <body>
        <h1> Guitars Galore - Admin Login </h1>
        
        <form method = "POST" action = "loginProcess.php">
            
            Username: <input type = "text" name = "username"/> <br/>
            Password: <input type = "password" name = "password"/> <br/>
            <br/>
            <input type = "submit" name = "submitForm" value = "Login!"/>
        </form>
        <br/>
        
                

         <input type="button" onclick="location.href='../index.php';" value="Home Page" />
        <br/>
        <?php
            if(isset($_SESSION['wrong']))
            {
                echo $_SESSION['wrong'];
            }
        ?>
        
        <br/>
        
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Bradley Peppmuller <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            
            
    </footer>
</html>