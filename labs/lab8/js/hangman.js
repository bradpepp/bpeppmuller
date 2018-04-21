//variables
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = ["snake", "monkey", "beetle", "horse", "dolphin", "dog"];
var hint =["It has no legs", "They like banannas", "I got the juice", "Can be used as transportation","Mans bestfriend"];
//events
window.onload = startGame();

$(".letter").click( function()
{
    checkLetter( $(this).attr("id") );
    disableButton($(this));
});
$(".displayHint").click( function() {
   
   displayHint(); 
});

$("#letterBtn").click(function()
{
    // alert("You pressed the button and it had the value " + boxVal);
    // var boxVal = $("#letterBox").val();
    alert( $("#letterBox").val())
} );

$(".replayBtn").on("click", function()
{
    location.reload();
} );

function startGame()
{
    createLetters();
    pickWord();
    initBoard();
    updateBoard();
}

function initBoard()
{
    for(var letter in selectedWord)
    {
        board.push("_");
    }
}

function pickWord()
{
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].toUpperCase();
    selectedHint = hint[randomInt];
}

function updateBoard()
{
    $("#word").empty();
    
    for(var letter of board)
    {
        document.getElementById("word").innerHTML += letter + " ";
    }
}

function createLetters()
{
    for(var letter of alphabet)
    {
        $("#letters").append("<button class = 'letter' id = '" + letter + "'>" + letter + "</button>");
      
    }
}
function hintButton(){
    $("#hint").append("button class = 'hint' id = 'hint' > Hint </button>");
}
function disableButton(btn)
{
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}
function checkLetter(letter)
{
    var positions = new Array();
    for(var i = 0; i < selectedWord.length; i++)
    {
        console.log(selectedWord);
        if(letter == selectedWord[i])
        {
            positions.push(i);
        }
    }
    
    if(positions.length > 0)
    {
        updateWord(positions, letter);
        
        if(!board.includes('_'))
        {
            endGame(true);
        }
    }
    else
    {
        remainingGuesses -= 1;
        updateMan();
    }
    if(remainingGuesses <= 0)
    {
        endGame(false);
    }
}

function updateWord(positions, letter)
{
    for(var pos of positions)
    {
        board[pos] = letter;
    }
    updateBoard();
}

function updateMan()
{
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win)
{
    $("#letters").hide();
    if(win)
    {
        $('#won').show();
    }
    else
    {
        $('#lost').show();
    }
}
function displayHint(){
    $("#selectedHint").show();
}
