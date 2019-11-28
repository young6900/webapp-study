/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */
/*"use strict";
*/
var loser = null;  // whether the user has hit a wall

window.onload = function() {


	var start = $("start");
	start.onmousedown = startClick;
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
	var over = $$(".boundary");
	for (var i = 0; i < over.length; i++) {
		over[i].style.backgroundColor = "#ff8888";
	}
	$("status").innerHTML = "You Lose! :(";
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	var over = $$(".boundary");
	for (var i = 0; i < over.length; i++) {
		over[i].style.backgroundColor = "#eeeeee";
	}
	$("status").innerHTML = "Start!";
	var over = $$(".boundary");
	for (var i = 0; i < over.length; i++) {
		var overed = over[i];
		overed.onmouseover = overBoundary;
	}
	var maze = $("maze");
	for (var i = 0; i < maze.length; i++) {
		maze[i]
	}
	var end = $("end");
	end.onmouseover = overEnd;
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	$("status").innerHTML = "You Win! :)";
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	var over = $$(".boundary");
	for (var i = 0; i < over.length; i++) {
		over[i].style.backgroundColor = "#ff8888";
	}
	$("status").innerHTML = "You Lose! :(";
}
