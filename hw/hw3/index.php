<?php

    function checkError(){
        if(empty($_GET['name'])){ 
         echo "<h4>Error: You must enter your name </h4>";
    }
        if(empty($_GET['favColor'])){ 
         echo "<h4>Error: select a favorite color </h4>";
    }
        if(empty($_GET['expression'])){ 
         echo "<h4>Error: Please select what you relate to most </h4>";
    }
        if(empty($_GET['favFlavor'])){ 
         echo "<h4>Error: select a favorite flavor </h4>";
    }
        if(empty($_GET['category'])){ 
         echo "<h4>Error: Please select an answer in the list </h4>";
    }
    }
    
    
    
    function TheCereal(){
        
       $name = $_Get['name'];
       
        $frostedFlakes = 0;
        $luckyCharms = 0;
        $cheerios = 0;
        $cocoPuffs = 0;
        if($_GET['favColor'] == gold){
            $cheerios++;
        }
        else if($_GET['favColor'] == brown){
            $cocoPuffs++;
        }
        else if($_GET['favColor'] == green){
            $luckyCharms++;
        }
        else if($_GET['favColor'] == orange){
            $frostedFlakes++;
        }
        
        
        if($_GET['favFlavor']==chocolate){
            $cocoPuffs++;
        }
        else if($_GET['favFlavor']==honey){
            $cheerios++;
        }
        else if($_GET['favFlavor']==marshmallows){
            $luckyCharms++;
        }
        else if($_GET['favFlavor']==corn){
            $frostedFlakes++;
        }
        
        
        
        if($_Get['expression'] == healthy){
            $cheerios++;
        }
         else if($_Get['expression'] == crazy){
            $cocoPuffs++;
        }
         if($_Get['expression'] == uplifting){
            $frostedFlakes++;
        }
        else if($_Get['expression'] == lucky){
            $luckyCharms++;
        }
        
        
        if($_GET['favFlavor']==chocolate){
            $cocoPuffs++;
        }
        else if($_GET['favFlavor']==honey){
            $cheerios++;
        }
        else if($_GET['favFlavor']==marshmallows){
            $luckyCharms++;
        }
        else if($_GET['favFlavor']==corn){
            $frostedFlakes++;
        }
        
       
        if($_Get['category'] == respected){
            $cheerios++;
        }
         else if($_Get['category'] == wacky){
            $cocoPuffs++;
        }
         if($_Get['category'] == motivator){
            $frostedFlakes++;
        }
        else if($_Get['category'] == liked){
            $luckyCharms++;
        }
        
    
        if($luckyCharms>$frostedFlakes && $luckyCharms>$cheerios && $luckyCharms>$cocoPuffs){
           echo "<h2> You are Lucky Charms</h2>";
           echo "<img src = img/luckyCharms.jpg />";
        }
         else if($frostedFlakes>$luckyCharms && $frostedFlakes>$cheerios && $frostedFlakes>$cocoPuffs){
            echo "<h2>You are Frosted Flakes</h2>";
            echo "<img src = img/frostedFlakes.png />";
        }
          else if($cocoPuffs>$frostedFlakes && $cocoPuffs>$cheerios && $luckyCharms<$cocoPuffs){
            echo "<h2>You are Cocoa Puffs</h2>";
            echo "<img src = img/cocoPuffs.jpg />";
        }
         else if($cheerios> $frostedFlakes && $luckyCharms<$cheerios && $cheerios>$cocoPuffs){
            echo "<h2>You are Cheerios</h2>";
           echo "<img src = img/cheerios.png />";
        }
        else{
            echo "<h2>You are Cocoa Puffs</h2>";
            echo "<img src = img/cocoPuffs.jpg />";
        }
        
       
    }
    
    

    
    function checkCategory($category)
    {
        if($category == $_GET['category'])
        {
            echo " selected";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>What cereal are you? </title>
    </head>
    <body>
        <h1>
            What type of cereal are you?
        </h1>
        <style>
            @import url("css/styles.css");
            body 
        {
            background:yellow;
            background-size:100%;
            background-repeat: no-repeat;
            text-align: center;
        }
       
        #searchEngine
        {
            border-radius: 20px;
        }
        
        #layoutDiv
        {
            display: inline-block; 
            color: black; 
            text-align: left; 
            background-color: white; 
            padding: 5px; 
            border-radius: 10px;
        }
        
        #catDiv
        {
            display: block;
            padding: 10px;
        }
        
        #subDiv
        {
            display: block;
            padding: 10px;
        }
        
        #submitButton
        {
            border-radius: 50px;
        }
        
        footer
        {
            background-color: #FFFFFF;
            color: black;
        }
        
        h3
        {
            background-color: #FFFFFF;
            color: black;
        }
        </style>
    <form method = "Get">
            <label for="name">Name:</label>
            <input id="name" type="text" name = 'name' value = "<?= $_GET['name']?>"><br/>
        
<div id = "catDiv">
            <label for="views">How do others view you?</label>
            <select name = "category" >
                <option value = ""> Select One </option>
                <option <?=checkCategory('liked')?>> liked </option>
                <option <?=checkCategory('respected')?>>respected </option>
                <option <?=checkCategory('motivator')?>> motivator </option>
                <option <?=checkCategory('wacky')?>>wacky </option>
                
            </select>
            </div>
                                           <fieldset>
<legend>Which color do you like the most?:</legend>
<input id="gold" type="radio" name="favColor" value="gold" <?= ($_GET['favColor'] == "gold")?"checked":"" ?>>
<label for="gold">Gold</label><br>
<input id="green" type="radio" name="favColor" value="green" <?= ($_GET['favColor'] == "green")?"checked":"" ?>>
<label for="green">Green</label><br>
<input id="orange" type="radio" name="favColor" value="orange" <?= ($_GET['favColor'] == "orange")?"checked":"" ?>>
<label for="orange">Orange</label><br>
<input id="brown" type="radio" name="favColor" value="brown" <?= ($_GET['favColor'] == "brown")?"checked":"" ?>>
<label for="brown">Brown</label>
</fieldset><br/><br/><br/>
                    
                    <fieldset>
<legend> Which answer relates to you the most?:</legend>
<input id="healthy" type="radio" name="expression" value="healthy"  <?= ($_GET['expression'] == "healthy")?"checked":"" ?>>
<label for="healthy">Healthy</label><br>
<input id="uplifting" type="radio" name="expression" value="uplifting" <?= ($_GET['expression'] == "uplifting")?"checked":"" ?>>
<label for="uplifting">Uplifting</label><br>
<input id="lucky" type="radio" name="expression" value= "lucky" <?= ($_GET['expression'] == "lucky")?"checked":"" ?>>
<label for="lucky">Lucky</label><br>
<input id="crazy" type="radio" name="expression" value="crazy" <?= ($_GET['expression'] == "crazy")?"checked":"" ?>>
<label for="crazy">Crazy</label>
</fieldset><br/><br/><br/><br/>

    <fieldset>
        <legend> What do you like the most?</legend>
        <input id="chocolate" type="radio" name="favFlavor" value="chocolate"  <?= ($_GET['favFlavor'] == "chocolate")?"checked":"" ?>>
        <label for="chocolate">Chocolate</label><br>
        <input id="honey" type="radio" name="favFlavor" value="honey"<?= ($_GET['favFlavor'] == "honey")?"checked":"" ?>> 
        <label for="honey">Honey</label><br>
        <input id="marshmallows" type="radio" name="favFlavor" value="marshmallows"<?= ($_GET['favFlavor'] == "marshmallows")?"checked":"" ?>>
        <label for="marshmallows">Marshmallows</label><br>
        <input id="corn" type="radio" name="favFlavor" value="corn"<?= ($_GET['favFlavor'] == "corn")?"checked":"" ?>>
        <label for="corn">Corn</label>
    </fieldset><br/><br/><br/><br/><br/>
</select>
            
            <div id = "subDiv">
            <input type = "submit" id = "submitButton" value = "Submit" />
            </div>
            
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
         if(empty($_GET['name']) || empty($_GET['favFlavor']) || empty($_GET['category']) ||empty($_GET['favColor']) ||empty($_GET['expression']) ){
           checkError();
         }
         else{
             TheCereal();
         }
        }
        ?>
        <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Bradley Peppmuller <br />
            <strong> Disclaimer: </strong> This webpage is used for academic purposes only. <br />
            
    </footer>
    </body>
</html>