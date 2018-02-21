<?php
function displayArtist($randomValue,$randomValue2, $pos){
$artists = array("Kendirck_on_stage.png","danceken.gif","Orch_on_stage.png","director.gif","Ed_Sheeran.png","edplaying.gif");
$loc=0;
switch($randomValue){
                case 0: $i = rand(0,1);
                    $symbol = $artists[$i];
                    $loc=0;
                break;
                case 1:$i = rand(2,3);
                    $symbol = $artists[$i];
                    $loc=1;
                break;
                case 2: $i = rand(4,5);
                    $symbol = $artists[$i];
                    $loc=2;
                 break;
                
            }
            echo "<body id ='stage$loc'><img id='location$pos' src='Images/artist/$symbol' alt ='$symbol' title='".ucfirst($symbol)."'width= '400' ></body>";
}
function displayTitle($randomValue){
  switch($randomValue){
                case 0: echo "<h2> Presenting Kendrick Lamar! </h2>";
                break;
                case 1: echo "<h2> Presenting the The Swedish Radio Symphony Orchestra! </h2>";
                break;
                case 2: echo "<h2> Presenting Ed Sheeran! </h2>"; 
                break;
                
            }  
}
function displayMusic($randomValue){
    $music = array("music/kenmusic.mp3","music/orchmusic.mp3","music/edmusic.mp3");
    for($i=0;$i<3;$i++){
         if($randomValue==$i){  echo "<audio autoplay>
<source src='$music[$randomValue]' type='audio/mpeg'>;
</audio>";
        }
    }
    
}
function number_of_times(){
    
}
function run(){
    
    $randomValue = rand(0,2);
    $randomValue2 = rand(0,1);
    
        
        displayTitle($randomValue);
        
        for($i=0;$i<2;$i++){
        $randomValue3 = rand(1,2);
        displayArtist($randomValue, $randomValue2,$randomValue3);
        }
        displayMusic($randomValue);
        }
        

?>