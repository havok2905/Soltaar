var score = 0; 
var selections = new Array();
	selections[0] = 0;
	selections[1] = 0; 
var cards = ["one", "one", "two", "two", "three", "three"];
var newcards = shuffleCards(cards);

// test functions
console.log(newcards);
console.log(isMatch());
console.log(score);

function shuffleCards()
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

// checks if both selections are equal
function isMatch()
{
	if(selections[0] == selections[1])
	{
		score++; 
		return true;
	}
	else
	{
		return false; 
	}
}

// sets selection array back to starting position
function clearSelections()
{
	selections[0] = 0; 
	selections[1] = 1; 
}

// check to see if the maximum amount of matches have been made
function checkWin()
{
	if(score == cards.length/2)
	{
		return true; 
	}
	else
	{
		return false; 
	}
}

