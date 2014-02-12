$(document).ready(function() {
	
	$("h1.josefin a").mouseover(function(){$(this).stop().animate({color: "#ccc"},{queue:false, duration:500}) });
	$("h1.josefin a").mouseout(function(){$(this).stop().animate({color: "#fff"},{queue:false, duration:500}) });
	$("h2.josefin a").mouseover(function(){$(this).stop().animate({color: "#555"},{queue:false, duration:500}) });
	$("h2.josefin a").mouseout(function(){$(this).stop().animate({color: "#fff"},{queue:false, duration:500}) });	
	$('.films').sorted();
	$('.tabs').show(); //FOUC
	$('.slided').show(); //FOUC
	$('.slided').film({
		slider: '.slider',
		slide: '.slide',
		addNav: true,
		addPagination: true,
		speed: 300 // ms.
	});
	
	//jQuery('.film-link').live('click', function(e){
		///e.preventDefault();
		//var link = jQuery(this).attr('href');
		///jQuery('.film-media').html('<div class="media-loading"><p>Loading...</p></div>');
		//jQuery('.film-media').load(link+'.attachment');
		//});
	
    $('.video').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });
	
});


/*** Skeleton V1.1 copyright 2011, Dave Gamache www.getskeleton.com http://www.opensource.org/licenses/mit-license.php */
(function ($) {
  function hashchange () {
    var hash = window.location.hash
      , el = $('ul.tabs [href*="' + hash + '"]')
      , content = $(hash)
    if (el.length && !el.hasClass('active') && content.length) {
      el.closest('.tabs').find('.active').removeClass('active');
      el.addClass('active');
      content.show().addClass('active').siblings().hide().removeClass('active');
    }
  }
  $(window).on('hashchange', hashchange);
  hashchange();
  $(hashchange);
})(jQuery);
