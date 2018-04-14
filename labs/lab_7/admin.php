<?php
    session_start();
    
    if(!isset($_SESSION['adminName']))
    {
        header("Location:index.php");
    }

    include '../../dbConnection.php';
    
    $conn = getConnection("ottermart");
    
    function displayAllProducts()
    {
        global $conn;
        $sql="SELECT * FROM om_product";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
    
        return $records;
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
    </head>
    <style>
        @import url("styles.css");
    </style>
    <style>
        form
        {
            display: inline;
        }
        table
        {
            text-align: center;
            width: 100%;
             border: 1px solid black;
        }
        tr, td
        {
            border: 1px solid black;
        }
        th
        {
            height: 50px;
            border: 1px solid black;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script>
        function confirmDelete()
        {
                
            return confirm("Are you sure you want to delete this product?");
            
        }
    </script>
    <body>
        <h1> Admin Main Page </h1>
        <h2> Welcome <?= $_SESSION['adminName'] ?>! </h2>
        <hr>
        <br/>
        
        <form action = "addProduct.php">
            <input type = "submit" name = "addProduct" value = "Add Product"/>
        </form>
        <form action="logout.php">
            <input type="submit"  value="Logout"/>
        </form>
        
        <br/>
        <hr>
        
        <?php $records=displayAllProducts();
            echo "<table class = 'table'>";
            foreach($records as $record)
            {
                echo "<td>";
                echo "[<a href = 'updateProduct.php?productId=" . $record['productId'] . "'> Update </a>]";
                //echo "[<a href = 'deleteProduct.php?productId=" . $record['productId'] . "'> Delete </a>]";
                echo "</td>";
                echo"<td>";
                echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='productId' value= " . $record['productId'] . " />";
                echo "<input type='submit' value='Remove'>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo $record['productName'];
                echo '<br/>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        
        ?>
   
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Bradley Peppmuller <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            
            
    </footer>
</html>