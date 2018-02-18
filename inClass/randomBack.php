<!DOCTYPE html>
<html>
    <title> Random Color</title>
    
    <style>
        body{
            <?php
            $red = rand(0,255);
            $green = rand(0,255);
            $blue = rand(0,255);
            $alpha = rand(0,10)/10;
            echo "background-color: rgba($red,$green,$blue,$alpha);"
            ?>
            
        }
    </style
</html>