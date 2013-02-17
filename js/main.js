
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


console.log(deck);
console.log(shuffledDeck);
console.log(game);