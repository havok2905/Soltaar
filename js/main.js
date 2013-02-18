
var cardsArray = new Array();
	cardsArray[0] = new Card("one", "a card with the number one on it");
	cardsArray[1] = new Card("one", "a card with the number one on it");
	cardsArray[2] = new Card("two", "a card with the number two on it");
	cardsArray[3] = new Card("two", "a card with the number two on it");
	cardsArray[4] = new Card("three", "a card with the number three on it");
	cardsArray[5] = new Card("three", "a card with the number three on it");

var deck = new Deck(cardsArray);
var shuffledDeck = deck.shuffleCards();
var game = new Game(100, shuffledDeck.length);


$(document).ready(function()
{
	for(x=0; x<shuffledDeck.length; x++)
	{
		$("body").append("<div class='card' data-role=" + x + "></div>");
	}

	// Click event that handles all actions associated with selecting a card
	$(".card").click(function()
	{
		var cardname = shuffledDeck[$(this).attr("data-role")].getCardName();
		var carddesc = shuffledDeck[$(this).attr("data-role")].getCardDesc();

		if(deck.selections[0] == 0 && deck.selections[1] == 0)
		{
			deck.selections[0] = cardname;
		}
		else if(deck.selections[0] != 0 && deck.selections[1] == 0)
		{
			deck.selections[1] = cardname;
			if(deck.isMatch())
			{
				game.incrementScore(1);
				console.log(game.getScore());
			}
			else
			{
				console.log("no match");
			}

			deck.setSelections(0, 0);
		}
		else
		{
			console.log("all selections filled");
		}
	});
});

