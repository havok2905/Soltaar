

var cards = new Array();
for(var x=0; x<10; x++)
{
	cards.push(x);
}

var newcards = shuffleCards(cards);
console.log(newcards);

function shuffleCards(cards)
{
	// initialize variables 
	var newcards = new Array(); // deck of newly shuffled cards 
	var emptyslot = false; // keeps track of the state of the new cards array index

	// initialize values of new cards array
	for(var x=0; x<cards.length; x++)
	{
		newcards.push(0);
	}

	// fill new cards array with values of the cards array at random indexes
	for(var x=0; x<cards.length; x++)
	{	
		do
		{
			newindex = Math.floor(Math.random() * cards.length); 

			if(newcards[newindex] == 0)
			{
				emptyslot = true; 
				newcards[newindex] = cards[x];
			}
			else
			{
				emptyslot = false; 
			}
		}
		while(emptyslot == false)
	}

	return newcards; 
}