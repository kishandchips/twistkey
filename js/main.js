
;(function($) {

	window.main = {
		init: function(){

			$('a[href^=#].scroll-to-btn').click(function(){
				var target = $($(this).attr('href'));
				var offsetTop = (target.length != 0) ? target.offset().top : 0;
				//$('body, html').animate({scrollTop: offsetTop}, 500, 'easeInOutQuad');
				return false;
			});

			$('.mobilenav').on('click', function() {
				console.log('click');
				var navigation = $('#header .main-navigation');
				if(navigation.is(':visible')){
					navigation.slideUp();
				} else {
					navigation.slideDown();
				}
			});	

			$('.trigger').hover(function() { 
				$('#shape').addClass('rotate');
			}, function(){
				$('#shape').removeClass('rotate');
			});

			$('.arrow-up-btn').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});	

		    $(function(){
		      $('#dynamic_select').bind('change', function () {
		          var url = $(this).val(); // get selected value
		          if (url) { // require a URL
		              window.location = url; // redirect
		          }
		          return false;
		      });
		    });

		  	$("#template-examples .example").filter(":nth-child(even)").addClass("evenrow");

		   	$.fn.eqHeights = function() {
		        var el = $(this);
		        if (el.length > 0 && !el.data('eqHeights')) {
		            $(window).resize(function(){
			            setTimeout(function(){
			                el.eqHeights();
			            }, 400);
		            });
		            el.data('eqHeights', true);
		        }
		        return el.each(function() {
		            var curHighest = 0;
		            $(this).children('.column').each(function() {
		                var el = $(this),
		                    elHeight = el.height('auto').height();
		                if (elHeight > curHighest) {
		                    curHighest = elHeight;
		                }
		            }).height(curHighest);
		        });
		    };	

			$.fn.anchorAnimate = function(settings) {
			 	settings = jQuery.extend({
					speed : 1100
				}, settings);	
				
				return this.each(function(){
					var caller = this
					$(caller).click(function (event) {	
						event.preventDefault()
						var locationHref = window.location.href
						var elementClick = $(caller).attr("href")
						
						var destination = $(elementClick).offset().top;
						$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, settings.speed, function() {
							window.location.hash = elementClick
						});
					  	return false;
					})
				})
			}		      	       				
		},


		loaded: function(){
			$('.row .container').eqHeights();
			$("a.scroll-to-btn").anchorAnimate()
		},

		
		resize: function(){
		},
	}

	$(function(){
		main.init();
	});

	$(window).load(function(){
		main.loaded();
	});

})(jQuery);
