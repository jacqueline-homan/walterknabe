(function( $ ){
	/* === PLUGIN menuStretch: Equal menu item widths to fit menu holder === */
	/* === menu items percentage width depending on number of items === */
	
	$.fn.menuStretch = function() {
	
	return this.each(function(options) {
		
		var defaults = {   
			menuItem: 'li'
		}; 
		
		var options = $.extend(defaults, options);
				
		$(this).each(function (){
			var menuItemsNo = $(this).children().length;
			var ItemWidth = 100 / menuItemsNo;
			$(this).find( options.menuItem ).css('width', ItemWidth + '%');
		})
	
	})
	
  };//end $.fn.menuStretch = function()
  
})( jQuery );

(function( $ ){

	/* === PLUGIN hCaption: Zoom in image on hover and adds caption overlay  === */
	
	$.fn.hCaption = function() {
	
	return this.each(function(options) {
		
		var defaults = {   
			image: 'img',  
			caption: ".enlarge-link",
			zoom: 1.1,
		}; 
		var options = $.extend(defaults, options);
	
		var zoomRatio = options.zoom;
		
		var imgW = $(this).find( options.image ).width();
		var imgH = $(this).find( options.image ).height();
		
		
		$(this).hover(function() {
					
			width = imgW * zoomRatio; // calculate zoom
			height = imgH * zoomRatio; //
			
			moveX = imgW/2 - width/2; // centering zoom
			moveY = imgH/2 - height/2;
			 
			$(this).find( options.image ).stop(false,true).animate({'width':width, 'height':height, 'top':moveY, 'left':moveX}, {duration:200});
			$(this).find( options.caption ).stop(false,true).fadeIn(200);
		},
		function() {
			$(this).find( options.image ).stop(false,true).animate({'width': imgW, 'height':imgH , 'top':'0', 'left':'0'}, {duration:50});    
			$(this).find( options.caption ).stop(false,true).fadeOut(200);
		});
	
	})
	
  };//end $.fn.hCaption = function()
  
})( jQuery );

(function( $ ){

	/* === PLUGIN hOverlay: Adds caption overlay on hover === */
	
	$.fn.hOverlay = function() {
	
	return this.each(function(options) {
		
		var defaults = {   
			caption: ".enlarge-link",
		}; 
		var options = $.extend(defaults, options);
		
		
		$(this).hover(function() {
			$(this).find( options.caption ).stop(false,true).fadeIn(200);
		},

		function() { 
			$(this).find( options.caption ).stop(false,true).fadeOut(200);
		});
	
	})
	
  };//end $.fn.hOverlay = function()
  
})( jQuery );


(function($) {
	/* === PLUGIN levelize: Make all menu items same height as the highest item (measuring inner element)  === */
       $.fn.levelize = function() {
            var tallest = 0;
            this.each(function() {
                  tallest = Math.max(tallest, $(this).outerHeight(true) +  $(this).prev().outerHeight(true));
            }); 

            return this.each(function() {
                  $(this).parent().css('height', tallest);
            });
      };
})(jQuery);


(function($) {
	/* === PLUGIN widthByChildren: PARENT WIDTH - IF CHILDREN HAS SAME WIDTH  === */
       $.fn.widthByChildren = function() {
			this.each(function(){
				var childSize = $(this).children().outerWidth(true) ;
				var childNum = $(this).children().length;
				var parentWidth = childSize * childNum;
				$(this).css('width', parentWidth+'px');
			});
      };
})(jQuery);
	
var $j = jQuery.noConflict();
$j(document).ready(function() {

	
	
	/*============= PARENT WIDTH - IF CHILDREN HAS VARIABLE WIDTH =================*/
	function childrenWidth(parent){
		parent.each(function(){
			var width = 0;
			//$j(this).find('>*').each( // >* - select only first level children
			$j(this).children().each(
				
				function(){
					width += $j(this).outerWidth(true);
				}
			);

			$j(this).css('width', width ); // +5 -> safe margin, sometimes it calculates less, so the code doesn't work
		});
	};

	
	/* ===== FUNCTION equalHeight() - all menu items to heighest item =====*/
	function equalHeight(group) {
		var tallest = 0;
		group.each(function() {
			var thisHeight = $j(this).outerHeight(true) + $j(this).prev().outerHeight(true) ;
			if(thisHeight > tallest) {
				tallest = thisHeight+ $j(this).css('padding');
			}
		});
		group.parent().height(tallest);
	}
	/* ===== FUNCTION centerCaption() - center products images caption on resize ===== */
	function centerCaption (link) {
	
		link.each( function(){
		
			var ovo = $j(this);
			var parent = $j(this).parent();
			
			var left = parent.width()/2 - ovo.width()/2;
			ovo.css('left', left);
			var top = parent.height()/2 - ovo.height()/2;
			ovo.css('top', top);
			
		})
		
		
	}
	
	/* ===== FUNCTION smoothHover() - fade hover effect - elements fading inside holder on hover =====
	function smoothHover (hover) {
		hover.each( function(){
			$j(this).hover(function () {
				$j(this).children().fadeToggle('slow');
			});
		})
	}
	
	smoothHover($j('a.facebook, a.twitter'));
*/
	
	/* ===== FUNCTION setupLabel() - for styling checkboxes and radio buttons =====*/
	function setupLabel() {
		if ($j('.label_check input').length) {
			$j('.label_check').each(function(){ 
				$j(this).removeClass('c_on');
			});
			$j('.label_check input:checked').each(function(){ 
				$j(this).parent('label').addClass('c_on');
			});                
		};
		if ($j('.label_radio input').length) {
			$j('.label_radio').each(function(){ 
				$j(this).removeClass('r_on');
			});
			$j('.label_radio input:checked').each(function(){ 
				$j(this).parent('label').addClass('r_on');
			});
		};
	};
	$j('body').addClass('has-js');
	$j('.label_check, .label_radio').click(function(){
		setupLabel();
	});
	setupLabel(); 
	
	
	/* ===== ANON. FUNCTION - animated scroll to top =====*/
	$j("#back-top").hide();
	
	$j(function () {
		$j(window).scroll(function () {
			if ($j(this).scrollTop() > 100) {
				$j('#back-top').fadeIn();
			} else {
				$j('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$j('#back-top a').click(function () {
			$j('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	
	/* =====  ajaxForm plugin email contact form validation with =====*/
	$j('#contact').ajaxForm(function(data) {
		if (data==1){
			$j('#success').fadeIn("slow");
			$j('#bademail').fadeOut("slow");
			$j('#badserver').fadeOut("slow");
			$j('#contact').resetForm();
		}
		else if (data==2){
			$j('#badserver').fadeIn("slow");
		}
		else if (data==3)
		{
			$j('#bademail').fadeIn("slow");
		}
	});


	/*===== extending horizontal menu items to fill the menu area ======= */
	$j('#home-menu ul:first, #menu-pages ul:first').menuStretch();
	$j('#home-menu ul:first-child li a span, #menu-pages ul:first-child li a span').levelize(); // all menu items to heighest item PLUGIN
	
	
	/*===== custom jQuery plugin for thumbmail images and caption animation ======= */
	$j('.image-links, .latest_item_image, .gallery-thumb-with-zoom, .search-product-image').hCaption();

	
	/*===== tabs snippet ======= */
	$j('.tabber').each(function() {
		
		var tabHolder = $j(this);
		
		tabHolder.find(".tab_container .tab_content").hide(); //Hide all content
		tabHolder.find("ul.tabs li:first").addClass("active").show(); //Activate first tab
		tabHolder.find(".tab_content:first").show(); //Show first tab content
		
		tabHolder.find("ul.tabs li").click( function() {

			tabHolder.find("ul.tabs li").removeClass("active"); //Remove any "active" class
			$j(this).addClass("active"); //Add "active" class to selected tab
			tabHolder.find(".tab_content").hide(); //Hide all tab content

			var tabIdentifier =  $j(this).find("a").attr("href");//Find the href attribute value to identify the active tab + content
			var activeTab = tabHolder.find(tabIdentifier); 
			
			$j(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		}); // end click
	});
	
	
	/*===== menu system  ======= */
	$j("#home-menu li,#menu-pages li, #cart_account li, #header-categories li, #cart_widget li").mouseenter(
		function () {
			$j(this).find('ul:first').css({display: "block"}).fadeTo("fast", 1);
		}
		).mouseleave(
		function () {
			$j(this).find('ul:first').fadeTo("fast", 0, function(){$j(this).css({display: "none"})});
		}
	);
	

	/*===== accordion  ======= */
	$j('div.accordion_content').hide();
	$j('div.accordion_item>h3').click(function() {
		
		var title = $j(this);
		var holderDiv = $j(this).parent();
		var contentDiv =$j(this).next();
		var visibleSiblings = holderDiv.siblings().find('div.accordion_content:visible');
		var visibleTitle = visibleSiblings.prev();

		if ( visibleSiblings.length ) {
		
			visibleSiblings.slideUp('fast', function() { // turn OFF other active content div (if any)
				contentDiv.slideToggle('fast'); // turn ON content div of clicked title
				visibleTitle.removeClass('active').addClass('inactive');
				title.removeClass('inactive').addClass('active');
			});
		  
		} else {
		
		   contentDiv.slideToggle('fast');
		   title.toggleClass('active').toggleClass('inactive');
	
		}	
		
	});

	/*===== end accordion  ======= */
	
	
	/*===== toggler  ======= */
	$j('div.toggler>h3').click(function() {
		$j(this).next().slideToggle('fast');
		$j(this).toggleClass('active').toggleClass('inactive');
	});
	/*===== end toggler  ======= */
	
	
	/*===== CHECK IF PRODUCT IS IN STOCK  =======*/
	function checkForChanges() {
		if ($j('#stock-toggler div').hasClass('out_of_stock'))
			$j('#out_of_stock_overlay').fadeIn()
		else
			$j('#out_of_stock_overlay').fadeOut()
			setTimeout(checkForChanges, 200);
	}
	$j(checkForChanges);
	/*===== end check =====*/
	
	
	/*/ DEBUG DIV 
	$j('body').append('<div id="debug"></div>');
	*/

	
	$j(window).resize(function() {
			
		
		centerCaption($j('.products-zoom-single'));
		
		if ( $j(document).width() > 800 ) {

			$j('#home-menu ul:first, #menu-pages ul:first').menuStretch(); // equal menu item widths to fit menu holder
			$j('.homewidgets ul:first, .homewidgets2 ul:first').menuStretch(); // equal menu item widths to fit menu holder
			$j('#home-menu ul:first-child li a span, #menu-pages ul:first-child li a span').levelize(); // all menu items to heighest item PLUGIN
			
			
			$j("ul.sub-menu li").css('width', '100%'); // submenu width
			$j("ul.sub-menu li a").css('height', 'auto'); // submenu height
			
		}		
		else if  ( $j(document).width() < 800 ) {
		
			$j('#home-menu ul:first li, #menu-pages ul:first li, .homewidgets ul:first li').css('width','auto');
			$j('.homewidgets ul:first li, .homewidgets2 ul:first li').css('width','100%');
			$j("#home-menu li a,#menu-pages li a").css('height','auto');

			childrenWidth($j(' .special-price-center, .variations fieldset, .quantity-buy-now-center, .thumbnails'));
			
		}
		
		if ( $j(document).width() > 660 ) {
			$j('#store-buttons').css('width', 'auto');
		}
		else if  ( $j(document).width() < 660 ) {
			childrenWidth($j('#store-buttons'));
		}
		
		
	})// end .resize 
	
	
	.resize();
	
});
