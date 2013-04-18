
/*
*	Main JavaScript file for Sol Taar
*/

// Construct a new shuffled deck of cards
var card_array = new Array();

//ajax it up yo
$.getJSON("http://localhost/soltaar/public/matchinfo/match.json?id=1", function(data) {
	$.each(data, function(index, value) {
		card_array[index] = new Card(value["name"], value["description"]);
		//todo: append cards properly
		var id = data.match[0].id;
		$("#" + id).append("<li class='card' data-role=" + x + "></li>");
		$("#" + id + " > li").html("<figure class='front'><embed src='../img/front.svg' type='image/svg+xml' /></figure><figure class='back'><embed src='"+name+".svg' type='image/svg+xml' /></figure>");
	});
});
// var cardsArray = new Array();
// 	cardsArray[0] = new Card("bear", "a card with a red circle on it");
// 	cardsArray[1] = new Card("pig", "a card with a red circle on it");
// 	cardsArray[2] = new Card("cat", "a card with a yellow triangle on it");
// 	cardsArray[3] = new Card("ladybug", "a card with a yellow triangle on it");
// 	cardsArray[4] = new Card("fox", "a card with a green diamond on it");
// 	cardsArray[5] = new Card("lion", "a card with a green diamond on it");
// 	cardsArray[6] = new Card("rat", "a card with a purple box on it");
// 	cardsArray[7] = new Card("bear", "a card with a purple box on it");


// var deck = new Deck(cardsArray);
var deck = new Deck(card_array);
var shuffledDeck = deck.shuffleCards();

// Start a new game
var game = new Game(100, shuffledDeck.length/2, {"width":4, "height":2});

// Set focus to a card with data-role value data
function setFocus(data)	
{
	$('*[data-role='+data+']').focus();
}

// Card selector input box controller
$("#submit").click(function()
{
	var data = $("#skip").val();
	
	if (data < cardsArray.length)	{
		setFocus(data);
		$("#skip").val("");
	}
	
	return false;
});

$(document).ready(function()
{
	game.dealCards(shuffledDeck);
	addEvents();
});

function addEvents()
{
	// Click event that handles all actions associated with selecting a card
	$(".card").bind("click.handlecard", function()
	{
		// initialize variables that contain the card's properties
		var cardname = shuffledDeck[$(this).attr("data-role")].getCardName();
		var carddesc = shuffledDeck[$(this).attr("data-role")].getCardDesc();

		// Check to see if it is the user's first or second selection and fill that slot with a card
		if(game.selections[0] == 0 && game.selections[1] == 0) // First Selection
		{
			game.selections[0] = cardname;
			$(this).unbind("click.handlecard");
			$(this).addClass("flipped");
		}
		else if(game.selections[0] != 0 && game.selections[1] == 0) // Second Selections
		{
			$(this).addClass("flipped");

			game.selections[1] = cardname;
			
			// If a match is found, push to the match array which also increments score
			if(game.isMatch())
			{
				game.incrementMatches({"name":cardname});
			}
			else
			{
				console.log("nope");
			}

			// Reset selection and events after one second of delay
			setTimeout(function()
			{
				if(game.isMatch())
				{
					$(".flipped").addClass("match");
				}
				
				$(".flipped").removeClass("flipped");
				game.setSelections(0, 0);
			},1000);
			
			removeEvents();
			addEvents();
		}
		else
		{
			console.log("all selections filled");
		}

		if(game.checkWin())
		{
			alert("you win");
			$(".match").removeClass("match");
			$(".flipped").removeClass("flipped");
			game.resetGame();
		}

	});
	
	// Spacebar, same as above click handler, Sherry is just being a lazy ass.  LAZY ASS: CLEAN THIS UP LATER, YOU FOOL.
	$(".card").bind('keydown', 'space', function ()
	{
		// initialize variables that contain the card's properties
			var cardname = shuffledDeck[$(this).attr("data-role")].getCardName();
			var carddesc = shuffledDeck[$(this).attr("data-role")].getCardDesc();

			// Check to see if it is the user's first or second selection and fill that slot with a card
			if(game.selections[0] == 0 && game.selections[1] == 0) // First Selection
			{
				game.selections[0] = cardname;
				$(this).unbind("click.handlecard");
				$(this).addClass("flipped");
			}
			else if(game.selections[0] != 0 && game.selections[1] == 0) // Second Selections
			{
				$(this).addClass("flipped");

				game.selections[1] = cardname;
				
				// If a match is found, push to the match array which also increments score
				if(game.isMatch())
				{
					game.incrementMatches({"name":cardname});
				}
				else
				{
					console.log("nope");
				}

				// Reset selection and events after one second of delay
				setTimeout(function()
				{
					if(game.isMatch())
					{
						$(".flipped").addClass("match");
					}
					
					$(".flipped").removeClass("flipped");
					game.setSelections(0, 0);
				},1000);
				
				// FIX THIS TO WORK WITH INDIVIDUAL CARDS
				removeEvents();
				addEvents();
			}
			else
			{
				console.log("all selections filled");
			}

			if(game.checkWin())
			{
				alert("you win");
				$(".match").removeClass("match");
				$(".flipped").removeClass("flipped");
				game.resetGame();
			}
	});
	
	// Set up key press events.~
	$(document).keydown(function(event)
	{
		// Left and Right arrow keys:

		if(event.keyCode == 39) {
			console.log("right");
			var focused = $("*:focus").attr("data-role");
			if (focused >= 0 || focused < cardsArray.length -1)	{
				setFocus(focused + 1);
			}
			else	{
				setFocus(0);
			}
			event.preventDefault();
		}
		if(event.keyCode == 37) {
			console.log("left");
			var focused = $("*:focus").attr("data-role");
			if (focused > 0 || focused < cardsArray.length)	{
				setFocus(focused -1);
			}
			else	{
				setFocus(cardsArray.length - 1);
			}
			event.preventDefault();
		}
	});
}

function removeEvents()
{
	$(".card").unbind("click.handlecard");
	$(".card").unbind('keydown', 'space');
}

