/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
      $(document).ready(function(){
			//$('.project-img').bttrlazyloading();
			$().localScroll({hash:true});
		});
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  projects: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

function magicLine(){
	var $el, leftPos, newWidth,
		$mainNav = $("#menu-main");
		
	if(!$('#magic-line').length){
		$mainNav.append("<li id='magic-line'></li>");
	}
	var $magicLine = $("#magic-line");
	
	var lineOffset = $(".active").offset();
	var mainNavOffset = $mainNav.parent().offset();
	
	//console.log('lineOffset left:'+lineOffset.left+'mainNavOffset left:'+mainNavOffset.left);
	
	if(checkWindowWidth() > 991){
		$magicLine
			.width($(".active").width())
			.css("left", lineOffset.left-mainNavOffset.left-30)
			.data("origLeft", $magicLine.position().left)
			.data("origWidth", $magicLine.width());
	}else{
		$magicLine
			.width($(".active").width())
			.css("left", lineOffset.left-mainNavOffset.left-20)
			.data("origLeft", $magicLine.position().left)
			.data("origWidth", $magicLine.width());
	}
	
	/*$magicLine
		.width($(".active").width())
		.css("left", $(".active a").parent().position().left)
		.data("origLeft", $magicLine.position().left)
		.data("origWidth", $magicLine.width());*/
			
	$("#menu-main > li a").hover(
		function() {
			if($(this).parent().parent().hasClass('sub-menu')){
				$el = $(this).parent().parent().parent().find('a:first-child');
				leftPos = $el.parent().position().left;
				//console.log(leftPos);
				newWidth = $el.parent().width();
				//console.log(newWidth);
				$magicLine.stop().animate({
					left: leftPos,
					width: newWidth
				});
			}else{
				$el = $(this);
				leftPos = $el.parent().position().left;
				//console.log(leftPos);
				newWidth = $el.parent().width();
				//console.log(newWidth);
				$magicLine.stop().animate({
					left: leftPos,
					width: newWidth
				});
			}
		}, function() {
			if($(this).parent().parent().hasClass('sub-menu')){
				$magicLine.stop().animate({
					left: $magicLine.data("parentLeft"),
					width: $magicLine.data("parentWidth")
				});    
			}else{
				$magicLine.stop().animate({
					left: $magicLine.data("origLeft"),
					width: $magicLine.data("origWidth")
				});    
			}
	});	
	
	$(".sub-menu").bind({
		mouseenter: function() {
			console.log('enter');
			$el = $(this).parent().find('a:first-child');
			leftPos = $el.parent().position().left;
			//console.log(leftPos);
			newWidth = $el.parent().width();
			//console.log(newWidth);
			$magicLine.data("parentLeft", leftPos)
		 			  .data("parentWidth", newWidth);
				
			$magicLine.stop().animate({
				left: leftPos,
				width: newWidth
			});
		}, 
		mouseleave: function(e) {
			e.stopPropagation();
			$magicLine.stop().animate({
				left: $magicLine.data("origLeft"),
				width: $magicLine.data("origWidth")
			});    
		}
	});	
}

function checkWindowWidth() {
	return $(window).width();
}

function itemHeightSync(){						
	var elementHeights = $('.heightReference').map(function() {
		return $(this).outerHeight();
	  }).get();
	
	var windowWidth = checkWindowWidth(),
		windowTop = $(window).scrollTop();
		
	$('.heightSync .bttrlazyloading-wrapper').css({'height':''});
	$('.heightSync').css({'height':''});
	$('.heightReference').css({'height':''});
	if(windowWidth > 740){
		//var maxHeight = Math.max.apply(null, elementHeights);
		//console.log('heightReference: '+$('.heightReference').outerHeight()+' heightSync:'+$('.heightSync').outerHeight()+'img: '+$('.heightSync .bttrlazyloading-wrapper img').height());
		if($('.heightReference').outerHeight() > $('.heightSync').outerHeight()){
			$('.heightSync .bttrlazyloading-wrapper').height( $('.heightReference').outerHeight() );
			$('.heightSync').height( $('.heightReference').outerHeight() );
		}else{
			$('.heightReference').css({'height':'auto'});
		}
	}else{
		$('.heightSync').css({'height':'auto'});
	}
}

$(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		if( $(this).scrollTop() > offset ) {
			 $back_to_top.addClass('cd-is-visible');
		}else {
			$back_to_top.removeClass('cd-is-visible cd-fade-out');
		}
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
	
});

$(window).load(function(){
	itemHeightSync();
	magicLine();	
	
	$( window ).resize(function() {
	  itemHeightSync();
	  magicLine();
	});
});

$(document).ready(UTIL.loadEvents);
	
$(document).ready(function(){
	//$('#mainImg1').bttrlazyloading();
	/*$('#mainImg2').bttrlazyloading();
	$('#mainImg3').bttrlazyloading();
	$('#mainImg4').bttrlazyloading();
	$('#mainImg5').bttrlazyloading();
	$('#mainImg6').bttrlazyloading();*/
});

})(jQuery); // Fully reference jQuery after this point.
