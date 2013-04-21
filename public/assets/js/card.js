
/*
*	Card JavaScript prototype to be used in a memory game
* 	@author Christopher McLean
* 	@param cardname
*   @param carddesc
*/

function Card(cardname, carddesc, cardimage)
{
	this.cardname = cardname; 
	this.carddesc = carddesc;
	this.cardimage = cardimage;
}


// Returns the card name a s a string
Card.prototype.getCardName = function()
{
	return this.cardname;
}


// Sets the card name as a string 
Card.prototype.setCardname = function(cardname)
{
	this.cardname = cardname;
}

// Returns the card name a s a string
Card.prototype.getCardImage = function()
{
	return this.cardimage;
}

// Sets the card name as a string 
Card.prototype.setCardImage = function(cardname)
{
	this.cardname = cardimage;
}


// Returns the card description as a string
Card.prototype.getCardDesc = function()
{
	return this.carddesc;
}


// Sets the card description as a string
Card.prototype.setCardDesc = function(carddesc)
{
	this.carddesc = carddesc;
}

