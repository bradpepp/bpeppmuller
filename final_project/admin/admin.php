<?php
    session_start();
    
    if(!isset($_SESSION['adminName']))
    {
        header("Location:index.php");
    }

    include '../../dbConnection.php';
   // include 'functions.php';
    $conn = getConnection("GuitarsGalor");
    
    function displayAllProducts()
    {
        global $conn;
        $sql="SELECT * FROM product";
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
        <br/>
            <button id='avgPrice' type='button' class='btn btn-info padding'>Avg Price</button>
            <button id='avgPopularity' type='button' class='btn btn-info padding'>Avg Popularity</button>
            <button id='totalGuitars' type='button' class='btn btn-info padding'>Total Guitars</button>
            <php?

            ?>
        </div>
        <div id='main'>
        </div>
   
        </script>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
   $(document).ready(function(){
              function getAvgPrice(){
                $.ajax({
                    type: "POST",
                    url: "getAvgPrice.php",
                    data: {},
                    success: function(data){
                        alert("Average Guitar Price: $" + data[22]+ data[23]+ data[24]+ data[25]+ data[26]+ data[27]+ data[28]+ data[29]);
                    }
                });
            }
            function avgPopularity(){
                $.ajax({
                    type: "POST",
                    url: "getAvgPop.php",
                    data: {},
                    success: function(data){
                        alert("Average Product Popularity is: " +  data[27]+ data[28]+ data[29]+ data[30] +" out of 5");
                    }
                });
            }
            function totalGuitars(){
                $.ajax({
                    type: "POST",
                    url: "getNumOfGuitars.php",
                   
                    data: {},
                    success: function(data){
                        alert("Total Number of guitars: " + data[21] + data[22]);
                    }
                });
            }
                $("#avgPrice").click(function(){
                    getAvgPrice();
                });
                $("#avgPopularity").click(function(){
                    avgPopularity();
                });
                $("#totalGuitars").click(function(){
                    totalGuitars();
                });
            })
        </script>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Bradley Peppmuller <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            
            
    </footer>
</html>