

function Deck(cards)
{
	this.selections = [0, 0]; 
	this.cards = cards; 
	this.newcards = new Array();
};


// Returns a new array of cards in a different order than the original
Deck.prototype.shuffleCards = function()
{
	var emptyslot = false; 

	for(var x=0; x<this.cards.length; x++)
	{
		this.newcards.push(0);
	}

	// Fills new cards array with values of the cards array at random indexes
	for(var x=0; x<this.cards.length; x++)
	{	
		do
		{
			var newindex = Math.floor(Math.random() * this.cards.length); 

			if(this.newcards[newindex] == 0)
			{
				emptyslot = true; 
				this.newcards[newindex] = this.cards[x];
			}
			else
			{
				emptyslot = false; 
			}
		}
		while(emptyslot == false)
	}

	return this.newcards; 
}


// Checks if both selections are equal
Deck.prototype.isMatch = function()
{
	if(this.selections[0] == this.selections[1])
	{
		return true;
	}
	else
	{
		return false; 
	}
}


// Sets selection indexes with two values
Deck.prototype.setSelections = function(val_one, val_two)
{
	this.selections[0] = val_one; 
	this.selections[1] = val_two; 
}


// Returns selections array
Deck.prototype.getSelections = function()
{
	return this.selections;
}


// Sets an array of original cards in order
Deck.prototype.setCards = function(crads)
{
	this.cards = cards;
}


// Gets an array of the original cards in order
Deck.prototype.getCards = function()
{
	return this.cards;
}


// Sets a new shuffled array of cards
Deck.prototype.setNewCards = function(newcards)
{
	this.newcards = newcards;
}


// Gets a new shuffled array of cards
Deck.prototype.getNewCards = function()
{
	return this.newcards;
}

