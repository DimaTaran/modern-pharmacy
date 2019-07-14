/**
 * @package WordPress
 * @subpackage Constructor
 * 
 * @author   Anton Shevchuk <AntonShevchuk@gmail.com>
 * @link     http://anton.shevchuk.name
 */
(function($){
    $(document).ready(function(){

        // Header Drop-Down Menu
        if ($("#menu ul ul").length > 0) {

			$("#menu li:has(ul)").addClass('indicator');

			$("#menu li:has(ul)").hover(function(){
				$(this)
					.addClass('hover')
					.children('ul')
						.stop(true,true)
						.show()
					;
				$(this).find('div.menu-header-menu-container')
					   .children('ul')
                           .stop(true,true)
                           .show()
					;
			}, function(){
				$(this)
					.removeClass('hover')
					.children('ul')
					.hide()
					;
				$(this).find('div.menu-header-menu-container')
					   .children('ul').hide()
					;
			});
        }

        // Header Search Form
        var $menuSearch = $('#menusearchform .s');
        $menuSearch.mouseenter(function(){
            if (!$menuSearch.data('expand')) {
                $menuSearch.data('expand', true);
                $menuSearch.stop(true,true).animate({width:'+=32px',left:'-=16px'});
            }
        }).mouseleave(function(){
            if ($menuSearch.data('expand')) {
                $menuSearch.data('expand', false);
                $menuSearch.stop(true,true).animate({width:'-=32px',left:'+=16px'});
            }
        });

        // Header Slideshow
		if ($('.wp-sl').length > 0) {
			var sl = $('.wp-sl').wpslideshow({
			    url:wpSl.slideshow,
				thumb: wpSl.thumb,
				thumbPath: wpSl.thumbPath,
				limit: 480,
				effectTime: 1000,
				timeout: 10000,
				play: true
			});
		}

        // Tiles - small tile layout
        $('.tiles').hover(function(){
           $(this).find('.thumbnail').hide();
           $(this).find('.announce').fadeIn();
        }, function(){
           var $self = $(this);
           $self.find('.announce').fadeOut(function(){
               $self.find('.thumbnail').show();
           });
        });

		// No underline for a with img
		$('a:has(img)').css({border:0});
    });

//$(document).on('submit', '#searchform', data, handler); // jQuery 1.7+
$("#searchform").live('submit',function(event){
	var error = false;
	$(this).find("[type=text]").each(function(){
		if (!$(this).val().length) {
			$(this).css('border', 'red 1px solid');
			$(this).focus();
			error = true;
			event.preventDefault();
			return false; // Only exits the "each" loop
		}
	});
	if (error) {
		event.preventDefault();
	}
});

$(".print_facture_form").live('submit',function(event){
	var error = false;
	var chckd = false;
	$(this).find("textarea").each(function(){
		if (!$(this).val().length) {
			$(this).css('border', 'red 1px solid');
			$(this).focus();
			error = true;
		} else {
			$(this).css('border', 'black 1px solid');
		}
	});
	$(this).find("#per3").each(function(){if ($(this).prop("checked")) chckd = true;});
	$(this).find("#per6").each(function(){if ($(this).prop("checked")) chckd = true;});
	$(this).find("#per12").each(function(){if ($(this).prop("checked")) chckd = true;});
	if (!chckd) {
		error = true;
		$("span.per").css('color', 'red');
	} else {
		$("span.per").css('color', 'black');
	}
	$(this).find("[type=text]").each(function(){
		if (!$(this).val().length) {
			$(this).css('border', 'red 1px solid');
			$(this).focus();
			error = true;
		} else {
			$(this).css('border', 'black 1px solid');
			if ($(this).attr('name') == 'kod' || $(this).attr('name') == 'tel' ) {
				for(i = 0; i < $(this).val().length; i++) {
					//Блядская кроссбраузерная работа с типами данных в джаваскрипте!
					if(/*$(this).val().charAt(i) != '.' &&*/$(this).val().charAt(i) != '+' && $(this).val().charAt(i) != '(' && $(this).val().charAt(i) != ')' && $(this).val().charAt(i) != ' ' /*&& $(this).val().charAt(i) != '_'*/ && $(this).val().charAt(i) != '-' && $(this).val().charAt(i) != '0' && $(this).val().charAt(i) != '1' && $(this).val().charAt(i) != '2' && $(this).val().charAt(i) != '3' && $(this).val().charAt(i) != '4' && $(this).val().charAt(i) != '5' && $(this).val().charAt(i) != '6' && $(this).val().charAt(i) != '7' && $(this).val().charAt(i) != '8' && $(this).val().charAt(i) != '9') {
						$('.' + $(this).attr('name')).text('* (цифры, скобки, плюс, дефис, пробел)');
						$(this).css('border', 'red 1px solid');
						$(this).focus();
						error = true;
					}
				}
			}
			if ($(this).attr('name') == 'ind') {
				for(i = 0; i < $(this).val().length; i++) {
					if($(this).val().charAt(i) != '0' && $(this).val().charAt(i) != '1' && $(this).val().charAt(i) != '2' && $(this).val().charAt(i) != '3' && $(this).val().charAt(i) != '4' && $(this).val().charAt(i) != '5' && $(this).val().charAt(i) != '6' && $(this).val().charAt(i) != '7' && $(this).val().charAt(i) != '8' && $(this).val().charAt(i) != '9') {
						$('.' + $(this).attr('name')).text('* (только цифры)');
						$(this).css('border', 'red 1px solid');
						$(this).focus();
						error = true;
					}
				}
			}
		}
	});
	if (error) {
		event.preventDefault();
		return false;
	}
});

})(jQuery);
