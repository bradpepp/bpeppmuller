<?php

    $backgroundImage = "img/sea.jpg";
    
    //print_r($_GET); //displaying all content submitted in the form using the GET method
        
    if(empty($_GET['keyword']) && empty($_GET['category']))
    {
         echo "<h2> You must type a keyword or select a category </h2>";
    }
    
    if((($_GET['keyword'] == "" || empty($_GET['keyword'])) && !empty($_GET['category'])) || (!empty($_GET['keyword']) && !empty($_GET['category'])) || (!empty($_GET['keyword']) && empty($_GET['category'])))
    {
        include 'api/pixabayAPI.php';
        
        

        $orientation = "horizontal";
        $keyword = $_GET['keyword'];
        
        if(isset($_GET['layout']))
        {
            $orientation = $_GET['layout'];
        }
        
        if(!empty($_GET['category']))
        {
            $keyword = $_GET['category'];
        }
        
        echo "<h3>You searched for: " . $keyword . "</h3>";
        
        $imageURLs = getImageURLs($keyword, $orientation);
        
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
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
        <title>Image Carousel</title>
    </head>
    
    <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/styles.css");
        body 
        {
            background-image: url("<?=$backgroundImage?>");
            background-size:100%;
            background-repeat: no-repeat;
            text-align: center;
        }
        
        #carouselExampleIndicators
        {
            margin: 0 auto;
            width: 500px;
            margin: 0 auto;
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
    <body>
        <br/><br/>

        <form method = "GET">
            <input type = "text"  size = "20" name = "keyword" placeholder = "Keyword" value = "<?= $_GET['keyword']?>"/>
            
            <div id = "layoutDiv">
            <input type = "radio" name = "layout" value = "horizontal" id = "hlayout"
            <?php
                if($_GET['layout'] == "horizontal")
                {
                    echo "checked";
                }
            ?>
            class = "radioInput">
            <label for = "hlayout" > Horizontal </label>
            </br>
            <input type = "radio" name = "layout" value = "vertical" id = "vlayout" <?= ($_GET['layout'] == "vertical")?"checked":"" ?> class = "radioInput">
            <label for = "vlayout" > Vertical </label>
            </div>
            
            <div id = "catDiv">
            <select name = "category" >
                <option value = ""> Select One </option>
                <option <?=checkCategory('Dogs')?>> Dog </option>
                <option <?=checkCategory('Cats')?>> Cats </option>
                <option <?=checkCategory('Otters')?>> Otters </option>
                <option <?=checkCategory('Sea')?>> Sea </option>
                <option <?=checkCategory('Racecar')?>> Racecar </option>
            </select>
            </div>
            
            <div id = "subDiv">
            <input type = "submit" id = "submitButton" value = "Submit" />
            </div>
            
        </form>
        
        <!--($_GET['keyword'] == "" || !empty($_GET['keyword'])) || !empty($_GET['category'])-->
        <?php
            // echo empty($_GET['category']);
            if((($_GET['keyword'] == "" || empty($_GET['keyword'])) && !empty($_GET['category'])) || (!empty($_GET['keyword']) && !empty($_GET['category'])) || (!empty($_GET['keyword']) && empty($_GET['category']))) {
        
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[1]?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[2]?>" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[3]?>" alt="Fourth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[4]?>" alt="Fifth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[5]?>" alt="Sixth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[6]?>" alt="Seventh slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <?php
            } //end of if statement above in php block
        ?>
        
        
        <br/><br/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
    </body>
    
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Bradley Peppmuller <br />
            <strong> Disclaimer: </strong> This webpage is used for academic purposes only. <br />
            
    </footer>
</html>