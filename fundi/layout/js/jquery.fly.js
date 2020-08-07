/**
* jQuery.fly.js
*
* A jQuery Extensions that allows for some cool prebuilt animation effects to page elements.
* Designed specifically to add effects to text (increasing text size, fading, ect)
*
* Copyright (c) 2009 Mike Miles (miles-per-hour.com)(mike@mike-miles.com)
* Dual licensed under the MIT (MIT-LICENSE.txt)
* and GPL (GPL-LICENSE.txt) licenses.
*
* $Date: 2009-03-25 $
* $Rev: 1 $
*
* Future Developments
* - add support to images
* - optimize preformance
* - add additional effects
*/

//Need a global variable to hold browser inforamtion
var fly_dimensions;

/**
* Constructor function
*/
$.fn.fly = function(opts){
	// Setup default values for user options
	var defaults = {
		/* These are the options the user can change */
		// The maximum number of time an element preforms its animation
		maxRotations:10,
		// The minimum number of times an element preforms its animation
		minRotations:2,
		// The maximum number of seconds an element can take to preofrm animation
		rotationSpeed:10,
		// If the rotationSpeed is a random value (max being rotationSpeed)
		// if false, the rotation speed of the element will be the rotationSpeed value
		rotationRandom:true,
		// If any text in the given element should increase in size (expand/grow effect)
		expandText:true,
		// If text size will change, the max size the text can grow to
		// excepts any valid font-size px,pt,em
		maxTextSize:'8em',
		// The type of movement to preform
		/* There are 5 movement types avaialble
		 * random 	- The element will be placed in a random location and move to another random location
		 * explode 	- The element will move from center of page to one of the four corners
		 * implode	- The element will move from one of the four corners of the page to the center
		 * fall 	- The element will move from top of page to bottom
		 * float	- The element will move from bottom of page to top
		 */
		movement:'random',
		// If the text in the element will have a random color each rotation
		// If false, text keeps original color
		randomColor:false,
		// If after animation is complete, to destroy the element or not
		destroy:false,
		// IF after animation is complete, reset element back to original settings
		reset:true
	};
	//If user has not passed custom options, set them to the defualt values
	if(!opts) opts = defaults;
	//extend the defualt options to the options variable
	// Truth be told, not exactly sure why I do this, was just in the tutorial I followed on building plugins
	var options = $.extend(defaults,opts);
	//Retrieve the browser dimensions
	fly_dimensions = $.fn.fly.getBrowserDimensions();
	// Time for the fun to begin
	// For each object passed
	return this.each(function(){
		// Store object into obj  variable
		var obj = $(this);
		// If user wants to reset object, need to record its inital CSS values that the animation changes
		if(options.reset){
			//save inital CSS values into oldCSS
			options.oldCss = {
				//store elements position
				position:obj.css('position'),
				//store elements visibility
				visibility:obj.css('visibility'),
				//store elements display
				display:obj.css('display'),
				//store elements top offset
				top:obj.css('top'),
				//store elements left offset
				left:obj.css('left'),
				//store elements text color
				color:obj.css('color'),
				//store elements font size
				fontsize:obj.css('font-size'),
				//store elements z-index
				zindex:obj.css('z-index')
			};
		}
		//give the element an absolute position, so it can be moved.
		obj.css('position','absolute');
		//store the original font size for reseting after each rotation
		options.originalFont = obj.css('font-size');
		//time to preform some action!
		switch(options.movement){
			//explosion animation
			case 'explode': $.fn.fly.moveExplode(obj,options); break;
			//or implosion animation
			case 'implode': $.fn.fly.moveImplode(obj,options); break;
			//or falling animation
			case 'fall': $.fn.fly.moveFall(obj,options); break;
			//or floating animation
			case 'float': $.fn.fly.moveFloat(obj,options); break;
			//else, we'll do something random!
			default: $.fn.fly.moveRandom(obj,options);
		} // end switch
	}); //end action for each element
}; //end construct function

/********** [ HELPER FUNCTIONS ] **********/
/**
*Get Browser Dimensions
* Returns an array for both the Width & height of Brower
* */
$.fn.fly.getBrowserDimensions = function(){
	//inital variables for height and width
	var h,w;
	if (typeof window.innerHeight != 'undefined'){
		h =  window.innerHeight;
		w =  window.innerWidth;
	// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
	}else if (typeof document.documentElement != 'undefined' &&  typeof document.documentElement.clientHeight != 'undefined' &&  document.documentElement.clientHeight != 0){
		h = document.documentElement.clientHeight;
		w = document.documentElement.clientWidth;
	// older versions of IE
	}else{
		h = document.getElementsByTagName('body')[0].clientHeight;	
		w = document.getElementsByTagName('body')[0].clientWidth;
	}
	//Create an array for the height and width
	var dimensions = {
		//get the full height, 1/2 height and 1/5 height for
		Height: new Array(h,Math.floor(h/2),Math.floor(h/5)),
		//get the full width, 1/2 width and 1/5 width
		Width: new Array(w,Math.floor(w/2),Math.floor(w/5))
	};
	//return dimensions array
	return dimensions;
};

/**
* Get Random Value
* Returns a random interer value
*@vars
*	limit	int	required	the highest value we can return
*	min	int	optional	the lowest value we can return (default is 0)
*	negative	int	optional	if we want to return a negative value, we'll subract this from the random value
**/
$.fn.fly.getRandomValue = function(limit,min,negative) {
	//if we have a limit and a min, and for some reason limit is smaller then min, we'll reverse their values
	if(limit && min && (min>limit)){
		//place limit in temp var
		var temp=limit;
		//set limit to min value
		limit = min;
		//set min to temp value
		min = temp;
	}
	//if limit and min are same, return the limit, why trying to get a random value??
	if(limit == min) return limit;
	//retrieve a random value between 0 and the limit
	var rand = Math.floor(Math.random()*limit);
	//if  passed a minimum, and random value is smaller then min
	if(min && rand<min){
		//while we keep getting a value smaller then min, retrieve a new random value
		while(rand<min) rand = Math.floor(Math.random()*limit);
	}
	//return a value, if we want a negative value, subtract negative from random value, else just return random value
	return negative ? rand-negative:rand;
};

/**
* Get random code
* returns a random HTML HEX code
*/
$.fn.fly.randomColor = function(){
	//setup string of HTML complient HEX vars
	var hex_vals = '0369CEF';
	//inital hex string
	var hex = '';
	//while the string is less then 6 char long, add a random Char from the hex_vals string
	while(hex.length<6) hex+=hex_vals.charAt($.fn.fly.getRandomValue(6));
	//return the random color code
	return hex;
};

/**
 * Get random Quadrent
 * splits the page into 4 quadrents and retruns a point within one of those quadrents.
 **/
$.fn.fly.getRandomQuadrent = function(){
	var top,left;
	//For this movement, page is split into 4 quadrents, we need to pick a random one to send object to
	var quad = $.fn.fly.getRandomValue(4)+1;
	//just incase we return a value larger then 4, pick another random quadrant
	while(quad>4) quad = $.fn.fly.getRandomValue(4)+1;
	//depending on which quadrent were sending object to
	switch(quad){
		case 1: //Quadrent 1 (bottom left)
			//retrieve a top offset between 1/2 of height and height
			//We need to subtract 1/5 from min value to offest changing forn size
			top = $.fn.fly.getRandomValue(fly_dimensions.Height[0]-fly_dimensions.Height[1],fly_dimensions.Height[1]-fly_dimensions.Height[2]);
			//retrieve left offset between 0 and 1/2 width
			left = $.fn.fly.getRandomValue(fly_dimensions.Width[1]);
			break;
		case 2: //Quadrant 2 (bottom right)
			//retrieve a top offset between 1/2 height and height
			top = $.fn.fly.getRandomValue(fly_dimensions.Height[0],fly_dimensions.Height[1]+fly_dimensions.Height[2]);
			//retrieve a top offset between 1/2 width and width
			left = $.fn.fly.getRandomValue(fly_dimensions.Width[0]+fly_dimensions.Width[1],fly_dimensions.Width[1]+fly_dimensions.Width[2]);
			break;
		case 3: //Quadrent 3(top right)
			// retriev top offset between 0 and 1/2 height
			// put in a negative value here to go higher then a 0 value to offset increasing font size
			top = $.fn.fly.getRandomValue(fly_dimensions.Height[2],0,fly_dimensions.Height[1]);
			// retrieve a left offset between 1/2 width and width
			//Add 1/5 to the width to offset increasing fort size
			left = $.fn.fly.getRandomValue(fly_dimensions.Width[0]+fly_dimensions.Width[1],fly_dimensions.Width[1]+fly_dimensions.Width[2]);
			break;
		case 4: //Quadrent 4 (top left)
			// retriev top offset between 0 and 1/2 height
			// put in a negative value here to go higher then a 0 value to offset increasing font size
			top = $.fn.fly.getRandomValue(fly_dimensions.Height[2],0,fly_dimensions.Height[1]);
			// retrieve a left offset between 0 and 1/2 width
			// retrieve a negative value to offset for offset of increaing font size
			left = $.fn.fly.getRandomValue(fly_dimensions.Width[1]-fly_dimensions.Width[2],0,fly_dimensions.Width[2]);
			break;
	}
	//return top and left position
	return new Array(top,left);
};

/********** [ OBJECT FUNCTIONS ] **********/

/**
* Animate an object
* animates the passed element based on the passed parameters
*@vars
* obj	jQuery object	required	the element we're going to animate
* top_pos	int		required	top offset to move object to
* left_pos	int		required	left offset to move object to
* options	array		required	the options array for this object
* count	int		required	the count of rotations left
**/
$.fn.fly.animateObj = function(obj,top_pos,left_pos,options,count){
	//intial variables needed
	var rotate,font;
	//if object has a random rotation speed, get a random speed to preform animation between 0 and rotation speed
	if(options.rotationRandom) rotate = $.fn.fly.getRandomValue(options.rotationSpeed);
	//else set rotation time to the rotation speed
	else rotate = options.rotationSpeed;
	//if option passed to expand the element text, set font size to max text size
	if(options.expandText) font = options.maxTextSize;
	//else set font size to current font size (no change)
	else font = obj.css('font-size');
	//set the animation
	obj.animate({ 
		width: '100%',
		opacity: 0,
		left:left_pos,
		top:top_pos,
		fontSize: font
		//set the animation to take rotate seconds, at animation copletion go to the reset function and subtract 1 from the rotation count
	}, (rotate*1000),function(){$.fn.fly.resetObj(obj,options,count-1);});
};

/**
* Reset Object
* resets the object to prepare for another animation
*@vars
*	obj	jQuery object	the element we're animating
*	options	array		the options array for this object
*	count		int		the rotation count
**/
$.fn.fly.resetObj = function(obj,options,count){
	//no matter what, reset the font size back to the original
	obj.css('font-size',options.originalFont);
	//if the rotation count is greate then zero (we still have rotations to preform
	if(count>0){
		//make element visible
		obj.css('visibility','visible');
		//make sure opacity is at 100% by running a very quick animation
		obj.animate({opacity:100},1);
		//make sure object is being displayed
		obj.css('display','');
		//if option is passed to use random colors, set object text color to a random HEX color
		if(options.randomColor) obj.css('color',$.fn.fly.randomColor());
	//else if the count is less then or equal to zero (no more rotations)
	}else if(count<=0){
		//if reset option is passed, we need to reset the css of the object
		if(options.reset){
			//get the old css values
			var Ocss = options.oldCss;
			//make sure opacity is back at 100% by running a quick animation
			obj.animate({opacity:100},1);
			// Reset CSS values from stored values
			obj.css('opacity','100');
			obj.css('position',Ocss.position);
			obj.css('visibility',Ocss.visibility);
			obj.css('display',Ocss.display);
			obj.css('top',Ocss.top);
			obj.css('left',Ocss.left);
			obj.css('color',Ocss.color);
			obj.css('font-size',Ocss.fontsize);
			obj.css('z-index',Ocss.zindex);
		}
		//if passed the destroy option, destroy the the object (remove it from the page)
		if(options.destroy){obj.remove();}
		//return false to exit the animation
		return false;
	}
	//We only get here if the count is greater then zero
	//reset top & left position depending on movement type
	switch(options.movement){
		case 'explode': //if exploding movement
			//place object in center of the page
			obj.css('top',fly_dimensions.Height[1]);
			obj.css('left',fly_dimensions.Width[1]);
			//start the animation over again
			$.fn.fly.moveExplode(obj,options,count);
			break;
		case 'implode': //if imploding movement
			//retireve a random quadrent position
			var quad = $.fn.fly.getRandomQuadrent();
			// move element to one of the four corners
			obj.css('top',quad[0]);
			obj.css('left',quad[1]);
			$.fn.fly.moveImplode(obj,options,count);
			break;
		case 'fall': //falling movement
			//move object to top of page
			obj.css('top',0);
			//move object to random position along width of page
			obj.css('left',$.fn.fly.getRandomValue(fly_dimensions.Width[0]));
			//start the animation over again
			$.fn.fly.moveFall(obj,options,count);
			break;
		case 'float': //foating movement
			//move object to the bottom of the page (offest is browsers height)
			obj.css('top',fly_dimensions.Height[0]);
			//move object to random position along width of page
			obj.css('left',$.fn.fly.getRandomValue(fly_dimensions.Width[0]));
			//start the animation over again
			$.fn.fly.moveFloat(obj,options,count);
			break;
		case 'random': //random movement
			//place the object at the top left corner of page
			obj.css('top',0);
			obj.css('left',0);
			//start the animation over again
			$.fn.fly.moveRandom(obj,options,count);
			break;
	}
};

/********** [ MOVEMENT FUNCTIONS ] **********/
/**
* Random movement function
* Move the object in a random way
*@vars
*	obj		jQuery object 	required	the element we're doing stuff to
*	options	options array	required	the animation settings for this element
*	count		int			optional	the count of rotations
**/
$.fn.fly.moveRandom = function(obj,options,count){
	//Declare needed variables
	var left,top,move_left,move_top;
	//if have no count (inital call), call reset function to initialize count and setup element
	if(!count){
		//see resetObj function for parameters
		$.fn.fly.resetObj(obj,options,$.fn.fly.getRandomValue(options.maxRotations,options.minRotations));
		//return false, we're not going to run rest of function
		return false;
	}
	//get a random value for the left offset, between 0 and browser width
	left = $.fn.fly.getRandomValue(fly_dimensions.Width[0]);
	//get a random value for the right offset, between 0 an browser height
	top = $.fn.fly.getRandomValue(fly_dimensions.Height[0]);
	// Since we have a random top & left offset, we'll place this element in this random position
	// By setting the css values
	obj.css('top',top);
	obj.css('left',left);
	
	// Now we need to create a random place to send this element
	// Get random left value between 1/2 browser width and browser width
	move_left = $.fn.fly.getRandomValue(fly_dimensions.Width[0],fly_dimensions.Width[2]);
	//Ger random top value between 1/2 browser height and browser height
	move_top = $.fn.fly.getRandomValue(fly_dimensions.Height[0],fly_dimensions.Height[2]);
	//Randomly determine if the object is going to move to the left or right, by adding or subtracting movement distance from current left offset
	left = ($.fn.fly.getRandomValue(2)%2==0) ? (left-move_left) : (left+move_left);
	//Randomly determin if the object is going to move up or down, by addin or subtrating the movement distance from current top offset
	top = ($.fn.fly.getRandomValue(2)%2==0) ?  (top-move_top) : (top +move_top);
	//Animate the element
	$.fn.fly.animateObj(obj,top,left,options,count);
};

/**
* explode movement function
* move the object from the page center to one of the four corners
*@vars
* obj	jQuery object	required	the element we're animating
* options	array		required	the array of options
* count	int		optional	the animation rotations count
**/
$.fn.fly.moveExplode = function(obj,options,count){
	//if not count, send object to reset function to initialize
	if(!count){
		$.fn.fly.resetObj(obj,options,$.fn.fly.getRandomValue(options.maxRotations,options.minRotations));
		//return false as to not preform rest of function
		return false;
	}
	var quad = $.fn.fly.getRandomQuadrent();
	// run the animation for this object to one of the corners
	$.fn.fly.animateObj(obj,quad[0],quad[1],options,count);
};

/**
* implode movement function
* move the object from one of the four corners of page to the center
*@vars
* obj	jQuery object	required	the element we're animating
* options	array		required	the array of options
* count	int		optional	the animation rotations count
**/
$.fn.fly.moveImplode = function(obj,options,count){
	//if not count, send object to reset function to initialize
	if(!count){
		$.fn.fly.resetObj(obj,options,$.fn.fly.getRandomValue(options.maxRotations,options.minRotations));
		//return false as to not preform rest of function
		return false;
	}
	//animate the element to the center of the screen
	$.fn.fly.animateObj(obj,fly_dimensions.Height[1],fly_dimensions.Width[1],options,count);
};

/**
* fall movement function
* moves the object from the top of the page to the bottom
*@vars
* obj	jQuery Object	required	the element we're animating
* options	array		required	the options array for this element
* count	int		optional	the animation rotation count
**/
$.fn.fly.moveFall = function(obj,options,count){
	//if not count, send object to reset function to initialize
	if(!count){
		$.fn.fly.resetObj(obj,options,$.fn.fly.getRandomValue(options.maxRotations,options.minRotations));
		//return false as to not preform rest of function
		return false;
	}
	//this animation has 'wind'.  element can move to left, right, or go straight down
	//to determine this we need to retrieve a random number between 1,3
	var left = $.fn.fly.getRandomValue(3);
	//if we're preforming a special animation 'rain', make sure the 'wind' is zero (falls straight down)
	if(obj.attr('class').indexOf('_rain')>=0) left = obj.css('left');
	//else if left==1, the object will move 1/5 of the browser width to the right
	else if(left==1) left = obj.css('left')+$.fn.fly.getRandomValue(fly_dimensions.Width[2]);
	//else if left==2 the opject will move 1/5 of the browser width to the left
	else if(left==2) left = obj.css('left')-$.fn.fly.getRandomValue(fly_dimensions.Width[2]);
	//else move the object straight down by not chainging its left offset
	else left = obj.css('left');
	//drop the object between browser height and browser height + 1/5 browser height (to offset increasing font size)
	var top = $.fn.fly.getRandomValue((fly_dimensions.Height[0]+fly_dimensions.Height[2]),fly_dimensions.Height[0]);
	//preform the animation
	$.fn.fly.animateObj(obj,top,left,options,count);
};

/**
* float movement function
* move the object from bottom of page to the top
*@vars
* obj	jQuery object	required	the element we're animating
* options	array		required	the array of options
* count	int		optional	the animation rotations count
**/
$.fn.fly.moveFloat = function(obj,options,count){
	//if not count, send object to reset function to initialize
	if(!count){
		$.fn.fly.resetObj(obj,options,$.fn.fly.getRandomValue(options.maxRotations,options.minRotations));
		//return false as to not preform rest of function
		return false;
	}
	//this animation has 'wind'.  element can move to left, right, or go straight down
	//to determine this we need to retrieve a random number between 1,3
	var left = $.fn.fly.getRandomValue(3);
	//if we're preforming a special animation 'fire', make sure the 'wind' is zero (raises straight up)
	if(obj.attr('class').indexOf('_fire')>=0) left = obj.css('left');
	//else if left==1, the object will move 1/5 of the browser width to the right
	else if(left==1) left = obj.css('left')+$.fn.fly.getRandomValue(fly_dimensions.Width[2]);
	//else if left==2 the opject will move 1/5 of the browser width to the left
	else if(left==2) left = obj.css('left')-$.fn.fly.getRandomValue(fly_dimensions.Width[2]);
	//else move the object straight down by not chainging its left offset
	else left = obj.css('left');
	//raise the object somewhere between -1/2 browser height and 1/5 broswer height
	var top = $.fn.fly.getRandomValue(fly_dimensions.Height[2],0,fly_dimensions.Height[1]);
	//preform animation
	$.fn.fly.animateObj(obj,top,left,options,count);
};

/********* [ CUSTOM BUILT-IN ANIMATIONS ] *********/
/**
 * These are some custom built in animations
 * each one creates 75 elements, and animates them with specific settings once completed
 * the elements are destroyed
 **/
/**
  * STARFIELD
  * The actual insperation for this extension, makes you feel like your flying through space
  * Think of a rough version of the windows starfield screensaver
  **/
$.fn.fly.starfield = function(){
	var options = {
		movement: 'explode',
		rotationSpeed:10,
		minRotations:2,
		maxRotations:6,
		reset:false,
		destroy:true
	};
	for(var x=0;x<75;x++){
		$('body').append('<p class="fly_starfield" style="font-size:12pt;color:#FFF">.</p>');
	}
	$('.fly_starfield').fly(options);
};

/**
 * EXPLOSION
 * Produces a firey explosion in the center of the screen
 **/
$.fn.fly.explosion = function(){
	var options = {
		movement:'explode',
		rotationSpeed:3,
		minRotation:1,
		maxRotation:1,
		reset:false,
		destroy:true
	};
	for(var x=0;x<50;x++){
		$('body').append('<p class="fly_explode" style="font-size:12pt;color:#FF'+(x%2==0 ? 'FF':'00')+'00">'+(x%2==0 ? 'X':'#')+'</p>');
	}
	$('.fly_explode').fly(options);
};

/**
 * BLACKHOLE
 * Produces a black hole, that sucks up elements into the page center
 **/
 $.fn.fly.blackhole = function(){
	var options = {
		movement:'implode',
		rotationSpeed:10,
		minRotation:2,
		maxRotation:6,
		reset:false,
		maxTextSize:'1px',
		destroy:true
	};
	for(var x=0;x<75;x++){
		$('body').append('<p class="fly_hole" style="font-size:5em;color:#000">.</p>');
	}
	$('.fly_hole').fly(options);
 };
 
/**
* BLIZZARD
* Produces a white pillowy blizzard on the screen
**/
$.fn.fly.blizzard = function(){
	var options = {
		movement:'fall',
		rotationSpeed:10,
		reset:false,
		destroy:true
	};
	for(var x=0;x<75;x++){
		$('body').append('<p class="fly_blizzard" style="font-size:14pt;color:#FFF">*</p>');
	}
	$('.fly_blizzard').fly(options);
};

/**
* RAIN
* Makes the screen rain blue dropplets
**/
$.fn.fly.rain = function(){
	var options = {
		movement:'fall',
		rotationSpeed:3,
		randomColor:false,
		reset:false,
		destroy:true
	};
	for(var x=0;x<75;x++){
		$('body').append('<p class="fly_rain" style="font-size:12pt;color:#0000FF">\'</p>');
	}
	$('.fly_rain').fly(options);
};

/**
 * MATRIX
 * a rough version of the 'matrix' style scrolling text'
 **/
$.fn.fly.matrix = function(){
	var options = {
		movement:'fall',
		rotationSpeed:6,
		randomColor:false,
		reset:false,
		destroy:true
	};
	for(var x=0;x<75;x++){
		$('body').append('<p class="fly_matrix" style="font-size:12pt;color:#'+(x%2==0 ? '00':'FF')+'FF00">&#165;<br />&#167;<br />&#182<br />&#163</p>');
	}
	$('.fly_matrix').fly(options);
};

/**
 * FIRE
 * produces an ASCII fire on the page
 **/
$.fn.fly.fire = function(){
	var options = {
		movement:'float',
		rotationSpeed:6,
		randomColor:false,
		reset:false,
		destroy:true
	};
	for(var x=0;x<75;x++){
		$('body').append('<p class="fly_fire" style="font-size:12pt;color:#FF'+(x%2==0 ? 'FF':'00')+'00">^</p>');
	}
	$('.fly_fire').fly(options);
};

/**
 * BALLOONS
 * celebrate, with the relaease of some colorful balloons!
 **/
$.fn.fly.balloons = function(){
	var options = {
		movement:'float',
		minRotations:1,
		maxRotations:1,
		rotationSpeed:15,
		randomColor:true,
		reset:false,
		destroy:true
	};
	for(var x=0;x<75;x++){
		$('body').append('<p class="fly_balloons" style="font-size:12pt">O</p>');
	}
	$('.fly_balloons').fly(options);
};

/**
 * BUBBLES
 * make the screen bubbly, with some blue bubbles raising from the botom of the screen
 **/
$.fn.fly.bubbles = function(options){
	var options = {
		movement:'float',
		maxTextSize:'8em',
		randomColor:false,
		expandText:false,
		reset:false,
		destroy:true
	};
	for(var x=0;x<75;x++){
		$('body').append('<p class="fly_bubble" style="font-size:8pt;color:#0000FF">'+(x%2==0 ? 'O':'o')+'</p>');
	}
	$('.fly_bubble').fly(options);
;}
