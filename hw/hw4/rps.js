var imgPlayer;
var rockButton;
var paperButton;
var scissorsButton;
var goButton;
var computerChoice;
var playerChoice;

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	rockButton = document.getElementById("rockButton");
	paperButton = document.getElementById("paperButton");
	scissorsButton = document.getElementById("scissorsButton");
	goButton = document.getElementById("goButton");
	// deselectAll();
}

$("#rockButton").on("click", function()
{
	imgPlayer.src = 'images/rock.png';
	rockButton.style.backgroundColor = '#888888';
	paperButton.style.backgroundColor = 'silver';
	scissorsButton.style.backgroundColor = 'silver';
	goButton.style.display = 'block';
	playerChoice = "rock";
});


$("#paperButton").on("click", function()
{
	imgPlayer.src = 'images/paper.png';
	paperButton.style.backgroundColor = '#888888';
	rockButton.style.backgroundColor = 'silver';
	scissorsButton.style.backgroundColor = 'silver';
	goButton.style.display = 'block';
	playerChoice = "paper";
});

$("#scissorsButton").on("click", function()
{
	imgPlayer.src = 'images/scissors.png';
	scissorsButton.style.backgroundColor = '#888888';
	paperButton.style.backgroundColor = 'silver';
	rockButton.style.backgroundColor = 'silver';
	goButton.style.display = 'block';
	playerChoice = "scissors";
});

function deselectAll()
{
	paperButton.style.backgroundColor = 'silver';
	rockButton.style.backgroundColor = 'silver';
	scissorsButton.style.backgroundColor = 'silver';
}

function go()
{
	var txtEndTitle = document.getElementById('txtEndTitle');
	var txtEndMessage = document.getElementById('txtEndMessage');
	
	var numChoice = Math.floor(Math.random() * 3);
	var imgComputer = document.getElementById('imgComputer');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	if(numChoice == 0)
	{
		computerChoice = "rock";
		imgComputer.src = 'images/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(playerChoice == 'rock')
		{
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'Tie game.';
			// alert("It's a tie.");
		}
		else if(playerChoice == 'paper')
		{
			txtEndTitle.innerHTML = 'Paper defeats rock... I guess';
			txtEndMessage.innerHTML = 'You win!';
			// alert("You win!");
		}
		else if(playerChoice == 'scissors')
		{
			txtEndTitle.innerHTML = 'Rock defeats scissors.';
			txtEndMessage.innerHTML = 'You lose.';
			// alert("You lose.");
		}
	}
	else if(numChoice == 1)
	{
		computerChoice = "paper";
		imgComputer.src = 'images/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(playerChoice == 'rock')
		{
			txtEndTitle.innerHTML = 'Paper defeats rock... dont ask me why';
			txtEndMessage.innerHTML = 'You lose.';
			// alert("You lose.");
		}
		else if(playerChoice == 'paper')
		{
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'Tie game.';
			// alert("It's a tie.");
		}
		else if(playerChoice == 'scissors')
		{
			txtEndTitle.innerHTML = 'Scissors defeats paper.';
			txtEndMessage.innerHTML = 'You win!';
			// alert("You win!");
		}
	}
	else if(numChoice == 2)
	{
		computerChoice = "scissors";
		imgComputer.src = 'images/scissors.png';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(playerChoice == 'rock')
		{
			txtEndTitle.innerHTML = 'Rock defeats scissors.';
			txtEndMessage.innerHTML = 'You win!';
			// alert("You win!");
		}
		else if(playerChoice == 'paper')
		{
			txtEndTitle.innerHTML = 'Scissors defeats paper.';
			txtEndMessage.innerHTML = 'You lose.';
			// alert("You lose.");
		}
		else if(playerChoice == 'scissors')
		{
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'Tie game.';
			// alert("It's a tie.");
		}
	}
	document.getElementById('endScreen').style.display = 'block';
}

function startGame()
{
	document.getElementById('introScreen').style.display = 'none';
}

function replay()
{
	document.getElementById('endScreen').style.display = 'none';
	
	goButton.style.display = 'none';
	
	deselectAll();
	
	document.getElementById('lblRock').style.backgroundColor = '#FFFFFF';
	document.getElementById('lblPaper').style.backgroundColor = '#FFFFFF';
	document.getElementById('lblScissors').style.backgroundColor = '#FFFFFF';
	
	imgPlayer.src = 'images/question.png';
	document.getElementById('imgComputer').src = 'images/question.png';
}