(function($){
  $.fn.extend({
    BubbleEngine: function(options) {
      var defaults = {
        particleSizeMin:            0,
        particleSizeMax:            60,
        particleSourceX:            0,
        particleSourceY:            500,
        particleAnimationDuration:  3000,
        particleAnimationVariance:  2000,
        particleScatteringX:        500,
        particleScatteringY:        200,
        particleDirection:          'center' /* 'right', 'left', 'center'*/,
        gravity:                    -100,
        imgSource:                  'images/bubble.png',
        RenewBubbles:               'on'
      };
      var options = $.extend(defaults, options);
      options.couter = 0;

      //-----------------------------------------------------------------------
      //Public Functions ------------------------------------------------------
      //-----------------------------------------------------------------------
      this.settings = function( particleSizeMin, particleSizeMax, particleSourceX, particleSourceY, particleAnimationDuration, particleAnimationVariance, particleScatteringX, particleScatteringY, particleDirection, imgSource ) {
        if (particleSizeMin)           options.particleSizeMin           = particleSizeMin;
        if (particleSizeMax)           options.particleSizeMax           = particleSizeMax;
        if (particleSourceX)           options.particleSourceX           = particleSourceX;
        if (particleSourceY)           options.particleSourceY           = particleSourceY;
        if (particleAnimationDuration) options.particleAnimationDuration = particleAnimationDuration;
        if (particleAnimationVariance) options.particleAnimationVariance = particleAnimationVariance;
        if (particleScatteringX)       options.particleScatteringX       = particleScatteringX;
        if (particleScatteringY)       options.particleScatteringY       = particleScatteringY;
        if (particleDirection)         options.particleDirection         = particleDirection;
        if (imgSource)                 options.imgSource                 = imgSource;
      }
      this.getConfig = function() {
        ConfigValues = new Array(options.particleSizeMin, options.particleSizeMax, options.particleAnimationDuration, options.particleScatteringX, options.particleScatteringY, options.imgSource);
        return(ConfigValues);
      };
      this.getCounter = function() {
        return(options.couter);
      };
      this.removeBubbles = function() {
        options.RenewBubbles = 'off';
        options.couter = 0;
      };
      this.addBubbles = function(number) {
        if (!number) number = 25;
        options.RenewBubbles = 'on';
        for (i=1;i<=number;i++) {
          options.couter++;
          window.setTimeout(function() {
            GenerateElement();
          }, Math.floor(Math.random()*3000));
        }
      };
      
      //-----------------------------------------------------------------------
      //Private Functions -----------------------------------------------------
      //-----------------------------------------------------------------------
      function GetRandom( min, max ) {
        if( min > max ) {
          return( -1 );
        }
        if( min == max ) {
          return( min );
        }
        return( min + parseInt( Math.random() * ( max-min+1 ) ) );
      }

      //-----------------------------------------------------------------------
      function GenerateElement(){
        var animationEndY     = options.particleSourceY + options.gravity + GetRandom( -options.particleScatteringY, options.particleScatteringY );
        if (options.particleDirection == 'left') {
          var animationEndX     = options.particleSourceX - GetRandom( 0, options.particleScatteringX );
        } else if (options.particleDirection == 'right') {
          var animationEndX     = options.particleSourceX + GetRandom( 0, options.particleScatteringX );
        } else if (options.particleDirection == 'center') {
          var animationEndX     = options.particleSourceX + GetRandom( -options.particleScatteringX, options.particleScatteringX );
        }
        var animationDuration = options.particleAnimationDuration + GetRandom( 0, options.particleAnimationVariance );
        var particleSize      = GetRandom( options.particleSizeMin, options.particleSizeMax )
        var div = jQuery('<img class="bubble '+options.ids+'" src="'+options.imgSource+'" onclick="random_prize(this);">').css({
          position: 'absolute',
          top:      options.particleSourceY,
          left:     options.particleSourceX,
          width:    particleSize,
          height:   particleSize
        }).appendTo('#container');
        div.animate({
          left:     animationEndX,
          top:      [animationEndY, 'easeOutCubic']
        }, {
          queue:    false,
          duration: animationDuration,
          complete: function() {
			  
            $(this).remove();
            if (options.RenewBubbles == 'on') {
              GenerateElement();
            } else {
            }
          }
        });	
      }		
      
      //-----------------------------------------------------------------------
      return this.each(function() {
        var o =options;
        var obj = $(this);			
        o.ids = Math.floor(Math.random()*1000);
      });
    }
  });
})(jQuery);
function getRandomInt (min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function gup( name ) {
	  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	  var regexS = "[\\?&]"+name+"=([^&#]*)";
	  var regex = new RegExp( regexS );
	  var results = regex.exec( window.location.href );
	  if( results == null )
		return "";
	  else
		return results[1];
}

function random_prize(el){
	var no_clicks = parseInt(document.getElementById('no_clicks').value);
	var has_clicked = document.getElementById('has_clicked').value;
	var cprize1 = document.getElementById('cprize1').value;
	var cprize2 = document.getElementById('cprize2').value;
	var cprize3 = document.getElementById('cprize3').value;
	var cprize4 = document.getElementById('cprize4').value;
	
	if( no_clicks > 0 ){
		document.getElementById('no_clicks').value = no_clicks - 1;
		$('#hud_pop').html(no_clicks - 1);
		if(has_clicked == '0'){
			
			has_clicked = true;
			var x_pos = parseInt($(el).css("left")) + 30;
			var y_pos = parseInt($(el).css("top")) + 210;
			$('#prize1').css('left',''+x_pos+'px');
			$('#prize1').css('top',''+y_pos+'px');
			$('#prize2').css('left',''+x_pos+'px');
			$('#prize2').css('top',''+y_pos+'px');
			
			var which = jQuery(el).attr('src');
			if(which == "images/bubble1.png"){
			
				var x_b = parseInt($(el).css("left")) - 40;
				var y_b = parseInt($(el).css("top")) - 50;
				var rand1 = getRandomInt(0, 1000);
				$('#container').append('<div id="bubble_pop_blue'+rand1+'" style="display:none" class="blue_pop"></div>');
				$(el).fadeOut('fast');
				$('#bubble_pop_blue'+rand1).css('left',''+x_b+'px');
				$('#bubble_pop_blue'+rand1).css('top',''+y_b+'px');
				
				$('#bubble_pop_blue'+rand1).fadeIn('fast');
				$('#bubble_pop_blue'+rand1)
					.sprite({
						fps: 25, 
						no_of_frames: 4,
						rewind: false,
						on_last_frame: function(obj) {
							obj.spStop();
							$('.blue_pop').fadeOut('fast');
							$('.blue_pop').remove();
						}
					});
					setTimeout(function() {
						$('.blue_pop').fadeOut('fast');
					}, 250 );
			}else{
				var x_b = parseInt($(el).css("left")) - 40;
				var y_b = parseInt($(el).css("top")) - 50;
				var rand1 = getRandomInt(0, 1000);
				$('#container').append('<div id="bubble_pop_orange'+rand1+'" style="display:none" class="orange_pop"></div>');
				$(el).fadeOut('fast');
				$('#bubble_pop_orange'+rand1).css('left',''+x_b+'px');
				$('#bubble_pop_orange'+rand1).css('top',''+y_b+'px');
				
				$('#bubble_pop_orange'+rand1).fadeIn('fast');
				$('#bubble_pop_orange'+rand1)
					.sprite({
						fps: 25, 
						no_of_frames: 4,
						rewind: false,
						on_last_frame: function(obj) {
							obj.spStop();
							$('.orange_pop').fadeOut('fast');
							$('.orange_pop').remove();
						}
					});
					setTimeout(function() {
						$('.orange_pop').fadeOut('fast');
					}, 250 );
	
				
			}
			
			var random_prize = getRandomInt(0,3);
			var random_prize1 = 0;
			var random_prize2 = 0;
			var random_prize3 = 0;
			var random_prize4 = 0;
			
			if(random_prize == 0){
				random_prize1 = getRandomInt(0, 50);
			}else if(random_prize == 1){
				random_prize2 = getRandomInt(0, 1);
			}else if(random_prize == 2){
				random_prize3 = getRandomInt(0, 60);
			}else if(random_prize == 3){
				random_prize4 = getRandomInt(0, 20);
			}
			
			var num_ipad = parseInt(document.getElementById('tot_ipad').value);
			var num_memory = parseInt(document.getElementById('tot_memory').value);
			var num_voucher250 = parseInt(document.getElementById('tot_voucher250').value);
			var num_voucher500 = parseInt(document.getElementById('tot_voucher500').value);
			
			if(random_prize1 == 1 && cprize2 == 0 && cprize3 == 0 && cprize4 == 0 && num_ipad > 0){
				document.getElementById('has_clicked').value = '1';
				document.getElementById('cprize1').value = '1';
				$('#prize1').css('display','');
				$('#prize1').show("scale", 100);
				setTimeout(function() {
					$('#prize1').fadeOut('fast');
				}, 100 );
				
				setTimeout(function() {
					$( "#dialog-form-ipad" ).dialog( "open" );
				}, 250 );
			}
			
			if(random_prize2 == 1 && cprize1 == 0 && cprize3 == 0 && cprize4 == 0 && num_memory > 0){
				document.getElementById('has_clicked').value = '1';
				document.getElementById('cprize2').value = '1';
				$('#prize2').css('display','');
				$('#prize2').show("scale", 100);
				setTimeout(function() {
					$('#prize2').fadeOut('fast');
				}, 100 );
				
				setTimeout(function() {
					$( "#dialog-form-memory" ).dialog( "open" );
				}, 250 );
			}
			
			if(random_prize3 == 1 && cprize1 == 0 && cprize2 == 0 && cprize4 == 0  && num_voucher250 > 0){
				document.getElementById('has_clicked').value = '1';
				document.getElementById('cprize3').value = '1';
				$('#prize3').css('display','');
				$('#prize3').show("scale", 100);
				setTimeout(function() {
					$('#prize3').fadeOut('fast');
				}, 100 );
				
				setTimeout(function() {
					$( "#dialog-form-voucher250" ).dialog( "open" );
				}, 250 );
			}
			
			if(random_prize4 == 1  && cprize1 == 0 && cprize2 == 0 && cprize3 == 0 && num_voucher500 > 0){
				document.getElementById('has_clicked').value = '1';
				document.getElementById('cprize4').value = '1';
				$('#prize4').css('display','');
				$('#prize4').show("scale", 100);
				setTimeout(function() {
					$('#prize4').fadeOut('fast');
				}, 100 );
				
				setTimeout(function() {
					$( "#dialog-form-voucher500" ).dialog( "open" );
				}, 250 );
			}
		}
	}else {
		// $( "#dialog-message" ).dialog({ title: "Unlucky" });
		// $( "#dialog-message" ).html( "You have no more pops left! To Get more pops Answer few easy Question.  " );
	//	 $( "#dialog-message" ).dialog({open:"open"});
			swal({   title: "Unlucky",
				 
				text: "You have no more pops left! To Get more pops Answer few easy Question.",
				 
				icon: "error",
				
			    buttons: "Ok",
				 
				 closeOnClickOutside: false,
				 closeOnEsc: false,
				 
				}).then((willDelete) => {
				  if (willDelete) {
				    window.location.href = "dbconnect_flag.php";
				  } else {
				   
				  }
				});


	 }
	jQuery.post( 'admin/ajax_get_prizes.php',
	{ 
		user_id: gup( 'user_id' )
	},
	function( response_prize ) {
		for (var key in response_prize) {
		   var obj = response_prize[key];
		   for (var prop in obj) {
			  if(prop == "prize" && obj[prop] == "Apple iPad"){
					document.getElementById('tot_ipad').value = obj['total'];
			  } else if(prop == "prize" && obj[prop] == "Memory Stick"){
					document.getElementById('tot_memory').value = obj['total'];
			  } else if(prop == "prize" && obj[prop] == "R500 Gift Voucher"){
					document.getElementById('tot_voucher500').value = obj['total'];
			  } else if(prop == "prize" && obj[prop] == "R250 Gift Voucher"){
					document.getElementById('tot_voucher250').value = obj['total'];
			  }
		   }
		}
	});
}