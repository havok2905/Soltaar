
var cardsArray = new Array();
	cardsArray[0] = new Card("one", "a card with the number one on it");
	cardsArray[1] = new Card("one", "a card with the number one on it");
	cardsArray[2] = new Card("two", "a card with the number two on it");
	cardsArray[3] = new Card("two", "a card with the number two on it");
	cardsArray[4] = new Card("three", "a card with the number three on it");
	cardsArray[5] = new Card("three", "a card with the number three on it");

var deck = new Deck(cardsArray);
var shuffledDeck = deck.shuffleCards();
var game = new Game(100, shuffledDeck.length/2);


$(document).ready(function()
{
	for(x=0; x<shuffledDeck.length; x++)
	{
		$("body").append("<div class='card' data-role=" + x + "></div>");
	}

	addEvents();
});

function addEvents()
{
	// Click event that handles all actions associated with selecting a card
	$(".card").bind("click.handlecard", function()
	{
		var cardname = shuffledDeck[$(this).attr("data-role")].getCardName();
		var carddesc = shuffledDeck[$(this).attr("data-role")].getCardDesc();

		if(game.selections[0] == 0 && game.selections[1] == 0)
		{
			game.selections[0] = cardname;
			$(this).unbind("click.handlecard");
		}
		else if(game.selections[0] != 0 && game.selections[1] == 0)
		{
			game.selections[1] = cardname;
			
			if(game.isMatch())
			{
				game.incrementMatches({"name":cardname});
				console.log(game.getScore());
			}

			game.setSelections(0, 0);
			removeEvents();
			addEvents();
		}
		else
		{
			console.log("all selections filled");
		}

		console.log(game.checkWin());
	});
}

function removeEvents()
{
	$(".card").unbind("click.handlecard");
}

