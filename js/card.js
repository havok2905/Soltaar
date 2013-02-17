function Card(cardname, carddesc)
{
	this.cardname = cardname; 
	this.carddesc = carddesc;
}


Card.prototype.getCardName = function()
{
	return this.cardname;
}


Card.prototype.setCardname = function(cardname)
{
	this.cardname = cardname;
}


Card.prototype.getCardDesc = function()
{
	return this.carddesc;
}


Card.prototype.setCardDesc = function(carddesc)
{
	this.carddesc = carddesc;
}

