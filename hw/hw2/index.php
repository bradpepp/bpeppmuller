<?php
include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <link href="https://fonts.googleapis.com/css?family=Walter+Turncoat" rel="stylesheet">
    <head>
       <style>
@import url("css/styles.css");
</style>
        <title> </title>
    </head>
    <body>
     <h1>The Random Concert generator</h1>
        <?php
        run();
        ?>
        <form>
   <input type="submit" value="New Artist"/>
        </form>
    <footer>
        <hr>
        CST 336. 2018&copy; Peppmuller<br />
        <strong>Disclaimer:</strong> The information included in this page might not be accurate. <br />
        It was developed as a part of the CST336 class<br />
          <figure>
                <img src="Images/csumbphoto.png" alt="CSUMB logo"/>
            </figure>  
        </footer>
    </body>
</html>