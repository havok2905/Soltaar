
/*
*	Game State JavaScript prototype to be used in a memory game
* 	@author Christopher McLean
* 	@param timeleft
	@param matchlimit
*/
function Game(timeleft, matchlimit)
{
	this.score = 0;
	this.matchlimit = matchlimit; 
	this.timeleft = timeleft;  
	this.selections = [0, 0];
	this.matches = new Array();
}


// Returns the score as an int
Game.prototype.getScore = function()
{
	return this.score;
}


// Sets the score as an int 
Game.prototype.setScore = function(score)
{
	this.score = score; 
}


// Adds a value to the score
Game.prototype.incrementScore = function(score)
{
	this.score += score; 
}


// Returns the amount of matches needed to win a game
Game.prototype.getMatchLimit = function()
{
	return this.matchlimit;
}


// Sets the amount of matches needed to win a game
Game.prototype.setMatchLimit = function(matchlimit)
{
	this.matchlimit = matchlimit; 
}


// Returns the amount of time left as an int in seconds
Game.prototype.getTimeLeft = function()
{
	return this.timeleft;
}


// Sets the amount of time left 
Game.prototype.setTimeLeft = function(timeleft)
{
	this.timeleft = timeleft; 
}


// Handle time functionality here.
Game.prototype.startTimer = function()
{
	
}


// Checks if both selections are equal
Game.prototype.isMatch = function()
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
Game.prototype.setSelections = function(val_one, val_two)
{
	this.selections[0] = val_one; 
	this.selections[1] = val_two; 
}


// Returns selections array
Game.prototype.getSelections = function()
{
	return this.selections;
}


// Adds a new index to the matches array
Game.prototype.incrementMatches = function(val)
{
	for(x=0; x<this.matches.length; x++)
	{
		if(this.matches[x] == val.name)
		{
			return true;
		}
	}

	this.incrementScore(1);
	this.matches.push(val.name);
	console.log(this.matches);

	return false;
}


// Replaces matches array with new array
Game.prototype.setMatches = function(matches)
{
	this.matches = matches;
}


// Return the matches array
Game.prototype.getMatch = function()
{
	return this.matches;
}


// Returns is the game has been won or lost
Game.prototype.checkWin = function()
{
	if(this.matches.length == this.matchlimit)
	{
		this.setMatches(new Array);
		this.setScore(0);
		return true;
	}
	else
	{
		return false; 
	}
}

