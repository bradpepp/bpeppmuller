<!DOCTYPE html>
<html>
    <head>
        <title> Lab 2: 777 Slot Machine </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
        function displaySymbol($randomValue){
        // $randomValue = rand(0,2);
            
            if($randomValue == 0){
               $symbol = "seven"; 
            }else if ($randomValue == 1){
                $symbol = "orange";
            } else{
                $symbol = "cherry";
            }
            echo "<img src='img/$symbol.png' alt ='$symbol' title='$symbol' />";
        }
        $randomValue1 = rand(0,2);
        displaySymbol($randomValue1);
           $randomValue2 = rand(0,2);
        displaySymbol($randomValue2);
           $randomValue3 = rand(0,2);
        displaySymbol($randomValue3);
     if($randomValue3==$randomValue2 && $randomValue3==$randomValue1){
         echo "1500 points";
     }else if($randomValue1 == $randomValue2 || $randomValue2== $randomValue3 || $randomValue1 == $randomValue3){
         echo "500 points";
     }
      //  for($i=0; $i<3;$i++){
        //displaySymbol();
        //}
     
        ?>
<!-- <img src="img/grapes.png" alt ="Grapes" title="Grapes" />
<img src="img/cherry.png" alt ="Cherry" title="Cherry" />
<img src="img/lemon.png" alt ="Lemon" title="Lemon" />
    </body>
</html>
-->