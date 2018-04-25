const PACMAN_SPEED = 10;
const GHOST_SPEED = 10;
var output;
var pacman;
var loopTimer;
var numLoops = 0;
var upArrowDown = false;
var downArrowDown = false;
var leftArrowDown = false;
var rightArrowDown = false;
var direction = 'right';
var walls = new Array();
var redghost;
var rgDirection;




function loadComplete(){
	output = document.getElementById('output');
	pacman = document.getElementById('pacman');
	pacman.style.left = '280px';
	pacman.style.top = '240px';
	pacman.style.width = '40px';
	pacman.style.height = '40px';
	
	redghost = document.getElementById('redghost');
	redghost.style.left = '280px';
	redghost.style.top = '40px';
	redghost.style.width = '40px';
	redghost.style.height = '40px';
	loopTimer = setInterval(loop,50);

createWall(-20, 0, 640, 40);	
createWall(0, 0, 40, 180);	
createWall(0, 220, 40, 180);
createWall(560, 0, 40, 180);	
createWall(560, 220, 40, 180);	
createWall(-20, 360, 640, 40);	
createWall(80, 90, 180, 40);
createWall(80, 120, 80, 40);
createWall(80, 280, 180, 40);
createWall(80, 250, 80, 40);
createWall(200, 170, 80, 40);
createWall(200, 200, 80, 40);
createWall(320, 170, 80, 40);
createWall(320, 200, 80, 40);
createWall(360, 90, 160, 40);
createWall(440, 120, 80, 40);
createWall(360, 280, 160, 40);
createWall(440, 250, 80, 40)


}
function createWall(left,top,width,hieght){
	var wall = document.createElement('div');

	wall.className='wall';
	wall.style.left = left;
	wall.style.top = top;
	wall.style.height=hieght;
	wall.style.width=width;
	gameWindow.appendChild(wall);
	
	var numWalls = walls.length;
	walls[numWalls] = wall;
	walls.push(wall);
	output.innerHTML = walls.length;
	
}
function loop(){
    numLoops++ ;
    tryToChangeDirection();
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    if(direction == 'up'){
        var pacmanY = parseInt(pacman.style.top)-PACMAN_SPEED;
        if(pacmanY<-30)pacmanY = 390;
        pacman.style.top = pacmanY +'px';
    }
     if(direction == 'down'){
        var pacmanY = parseInt(pacman.style.top)+PACMAN_SPEED;
        if(pacmanY>390)pacmanY = -30;
        pacman.style.top = pacmanY +'px';
    }
     if(direction == 'left'){
        var pacmanY = parseInt(pacman.style.left)-PACMAN_SPEED;
        if(pacmanY<-30)pacmanY = 590;
        pacman.style.left = pacmanY +'px';
    }
     if(direction == 'right'){
        var pacmanY = parseInt(pacman.style.left)+PACMAN_SPEED;
        if(pacmanY>590)pacmanY = -30;
        pacman.style.left = pacmanY +'px';
    }
    if(hitwall(pacman)){
         //output.innerHTML= 'collision';
        pacman.style.left = originalLeft;
        pacman.style.top = originalTop;

    }
 moveGhost();
   // output.innerHTML= numLoops;
}
function moveGhost(){
    var rgX = parseInt(redghost.style.left);
    var rgY = parseInt(redghost.style.top);
    var rgNewDirection;
    var oppositeDirection;
    if(rgDirection == 'left') oppositeDirection = 'right';
    else if(rgDirection == 'right') oppositeDirection = 'left';
    else if(rgDirection == 'up') oppositeDirection = 'down';
    else if(rgDirection == 'down') oppositeDirection = 'up';
   do{
    redghost.style.left = rgX + 'px';
    redghost.style.top = rgY + 'px';
        do{
            var r = Math.floor(Math.random()*4);
            if(r== 0) rgNewDirection = 'right';
            else if(r== 1) rgNewDirection = 'left';
            else if(r== 2) rgNewDirection = 'down';
            else if(r== 3) rgNewDirection = 'up';
        }while(rgNewDirection == oppositeDirection);
    if(rgNewDirection == 'right'){
    if(rgX>590) rgX = -30;
    redghost.style.left = rgX + GHOST_SPEED + 'px';
    }
    else if(rgNewDirection == 'left'){
    if(rgX<-30) rgX = 590;
    redghost.style.left = rgX - GHOST_SPEED + 'px';
    }
    else if(rgNewDirection == 'down'){
    if(rgX>390) rgX = -30;
    redghost.style.top = rgY + GHOST_SPEED + 'px';
    }
    else if(rgNewDirection == 'left'){
    if(rgX<-30) rgX = 390;
    redghost.style.top = rgY - GHOST_SPEED + 'px';
    }
       
   } while(hitwall(redghost));
    rgDirection = rgNewDirection;
    if(hittest(pacman,redghost)){
        clearInterval(loopTimer);
    }
}

document.addEventListener('keydown', function(event){
    //output.innerHTML=event.keyCode;
    if(event.keyCode == 37){ 
        if(!hitwall(pacman)){
            direction = 'left';
        pacman.className = "flip-horizontal"
        }
            
        }
    if(event.keyCode == 38){ 
        if(!hitwall()){
        direction = 'up';
        pacman.className ="rotate270";
    }}
    if(event.keyCode == 39){ 
        if(!hitwall(pacman)){
        direction = 'right';
        pacman.className ="";
        }
    }
    if(event.keyCode == 40){ 
       if(!hitwall(pacman)){
       direction = 'down';
        pacman.className ="rotate90";
       }
    }
});
function hitwall(element){
    var hit = false;
    for(var i = 0; i< walls.length;i++){
    if(hittest(walls[i], element)) hit = true;
    }
    
    return hit;

}
function tryToChangeDirection() {
     var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
     if(upArrowDown){
    pacman.style.top = parseInt(pacman.style.top)-PACMAN_SPEED + 'px';
      if(!hitwall(pacman)){
        direction = 'up';
        pacman.className ="rotate270";
    }
    }
     if(downArrowDown){
    pacman.style.top = parseInt(pacman.style.top)+PACMAN_SPEED + 'px';

        if(!hitwall(pacman)){
       direction = 'down';
        pacman.className ="rotate90";
       }
    }
     if(leftArrowDown){
        pacman.style.left = parseInt(pacman.style.left)-PACMAN_SPEED + 'px';

        if(!hitwall(pacman)){
            direction = 'left';
        pacman.className = "flip-horizontal"
        }
    }
     if(rightArrowDown){
          pacman.style.left = parseInt(pacman.style.left)+PACMAN_SPEED + 'px';

        if(!hitwall(pacman)){
        direction = 'right';
        pacman.className ="";
        }
    }
}
document.addEventListener('keydown', function(event){
    if(event.keyCode == 37){ leftArrowDown = true;}
    if(event.keyCode == 38){ upArrowDown = true;}
    if(event.keyCode == 39){ rightArrowDown = true;}
    if(event.keyCode == 40){ downArrowDown = true;}
});
document.addEventListener('keyup', function(event){
    if(event.keyCode == 37){ leftArrowDown = false;}
    if(event.keyCode == 38){ upArrowDown = false;}
    if(event.keyCode == 39){ rightArrowDown = false;}
    if(event.keyCode == 40){ downArrowDown = false;}
});

