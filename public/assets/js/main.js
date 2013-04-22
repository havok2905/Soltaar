
/*
*	Main JavaScript file for Sol Taar
*/

// Construct a new shuffled deck of cards
var cardarray = new Array();
function setResults(results)
{
	cardarray = results;
}

// Request match information from the server
$.ajax({
	url: "http://localhost/soltaar/public/matchinfo/match.json?id=1", 
	dataType: "json",
	async:false,
	success: function (data)
	{
		var tempcardsarray = new Array();

		$.each(data.cards, function(index, value) 
		{
			for(x=0; x<2; x++)
			{
				var newcard = new Card(value.name, value.description, value.image);
				tempcardsarray.push(newcard);
			}
		});

		setResults(tempcardsarray);
	}
});

// Create a new deck object with the array of cards
var deck = new Deck(cardarray);
var shuffledDeck = deck.shuffleCards();

// Start a new game
var game = new Game(100, shuffledDeck.length/2, {"width":4, "height":2});

// Set focus to a card with data-role value data
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
		handleFlip(this);
	});

	// Card selector input box controller
	$("#submit").click(function(e)
	{
		e.preventDefault();

		var data = $("#skip").val();
		console.log(data);

		if (data < cardarray.length)	
		{
			handleFlip($('*[data-role='+data+']'));
			$('*[data-role='+data+']').focus();
			$("#skip").val("");
		}
		
		return false;
	});
}

function handleFlip(card)
{
	// initialize variables that contain the card's properties
	var cardname = shuffledDeck[$(card).attr("data-role")].getCardName();
	var carddesc = shuffledDeck[$(card).attr("data-role")].getCardDesc();

	// Check to see if it is the user's first or second selection and fill that slot with a card
	if(game.selections[0] == 0 && game.selections[1] == 0) // First Selection
	{
		game.selections[0] = cardname;
		$(card).unbind("click.handlecard");
		$(card).addClass("flipped");
	}
	else if(game.selections[0] != 0 && game.selections[1] == 0) // Second Selections
	{
		$(card).addClass("flipped");

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
}

function removeEvents()
{
	$(".card").unbind("click.handlecard");
}


