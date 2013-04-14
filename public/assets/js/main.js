
/*
*	Main JavaScript file for Sol Taar
*/

// Construct a new shuffled deck of cards
var cardsArray = new Array();
	cardsArray[0] = new Card("one", "a card with the number one on it");
	cardsArray[1] = new Card("one", "a card with the number one on it");
	cardsArray[2] = new Card("two", "a card with the number two on it");
	cardsArray[3] = new Card("two", "a card with the number two on it");
	cardsArray[4] = new Card("three", "a card with the number three on it");
	cardsArray[5] = new Card("three", "a card with the number three on it");
var deck = new Deck(cardsArray);
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

	//Accordian stuff

	 var allPanels = $('.accordion > dd').hide();
    
	  $('.accordion > dt > a').click(function() {
	    allPanels.slideUp();
	    $(this).parent().next().slideDown();
	    return false;
	  });

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

