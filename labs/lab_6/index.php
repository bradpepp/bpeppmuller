
<?php

    include '../../dbConnection.php';

    $cpmm = getDatabaseConnection("ottermart");
    function displayCategories(){
        global $conn;
        $sql = "SELECT catName FROM `om_category` ORDER BY catName";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // print_r($records);
       foreach($records as $record){
           echo"<option>". $record["catName"]. "</option>";
       }
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>OtterMart Product Search </title>
    </head>
    <body>
<h1> OtterMart Product Search </h1>
<form>
    Product: <input type = "text" name = "product" /> <br />
    
    Category:
        <select name = "category">
            <option value =""> Select One </option>
             <?=displayCategories()?>
            </select>
            <br />
            Price: From <input type = "text" name="priceFrom" size="7"/>
                   To    <input type="text" name = "priceTo" size="7"/>
                   <br />
                  Order result by: <br />
                     <input type="radio" name="orderBy" value="price"/> Price <br />
             <input type="radio" name="orderBy" value="name"/> Name
             
             <br />
             <input type="submit" value="Search" name="searchForm" />
             
</form>
    </body>
</html>