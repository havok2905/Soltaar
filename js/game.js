function Game(timeleft, matchlimit)
{
	this.score = 0;
	this.matchlimit = matchlimit; 
	this.timeleft = timeleft;  
}


Game.prototype.getScore = function()
{
	return this.score;
}


Game.prototype.setScore = function(score)
{
	this.score = score; 
}


Game.prototype.incrementScore = function(score)
{
	this.score += score; 
}


Game.prototype.getMatchLimit = function()
{
	return this.matchlimit;
}


Game.prototype.setMatchLimit = function(matchlimit)
{
	this.matchlimit = matchlimit; 
}


Game.prototype.getTimeLeft = function()
{
	return this.timeleft;
}


Game.prototype.setTimeLeft = function(timeleft)
{
	this.timeleft = timeleft; 
}


Game.prototype.startTimer = function()
{
	// Handle time functionality here. s
}
