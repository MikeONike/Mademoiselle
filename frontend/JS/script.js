$(document).ready(function () {

	if ($(window).width() <= 992) {
		var navHeight = $('.head-nav-links').height();
	} else {
		var navHeight = 57 * $('.head-nav-links').children().length;
	}

	var blogNewsLength = $('.news-items .page').children().length;
	var newsLength = $('.news-items').children().length;

	var headerHeight = $('.head-nav').height();
	var trigger = false;


	if ($(window).width() <= 992) {
		$('.head-nav-links').height(0);
	}

	///////////////////////////////////////////////////////////////////

	$('input#searchsubmit').attr('value', '🔍');
	$('input#s').attr('placeholder', 'Search for blog posts');

	///////////////////////////////////////////////////////////////////

	if($('.blog-next-prev-links .blog-link:first-of-type a').length == 0) {
		$('.blog-next-prev-links .blog-link:first-of-type i').remove();
	}
	if($('.blog-next-prev-links .blog-link:last-of-type a').length == 0) {
		$('.blog-next-prev-links .blog-link:last-of-type i').remove();
	}

	//////////////////////////////////////////////////////////////////////////////
	//set width of the map element (map-wrapper(width) + container(right-margin))
	//////////////////////////////////////////////////////////////////////////////

	// var containerMargin = Number($('.container').css('margin-right').replace('px',''));

	// $(window).resize(function() {
	// 	containerMargin = Number($('.container').css('margin-right').replace('px',''));
	// 	$('.contact .map iframe').css('right', `-${containerMargin}px`);
	// });

	function calculateWidthAndMargin() {
		var mapWrapperWidth = $('.map-wrapper').width();
		var containerMargin = Number($('.container').css('margin-right').replace('px', ''));
		return mapWidth = mapWrapperWidth + containerMargin;
	}

	function calculateMapWidth() {
		$('.contact .map').css('width', `${calculateWidthAndMargin()}px`);
	}

	// function calculateMapMargins() {
	// 	var containerMargin = Number($('.container').css('margin-right').replace('px', ''));
	// 	$('.contact .map').css('margin-right', `-${containerMargin}px`);
	// 	$('.contact .map').css('margin-left', `-${containerMargin}px`);
	// }

	if ($(window).width() >= 992) {
		// calculateWidthAndMargin();
		calculateMapWidth();
	} else {
		$('.contact .map').css('width', `100%`);
		// calculateMapMargins();
	}

	$(window).resize(function () {
		if ($(window).width() >= 992) {
			calculateMapWidth();
		} else {
			$('.contact .map').css('width', `100%`);
		}
	});



	///////////////////////////////////////////////////////
	// calculate left and rigth margin for flex items
	///////////////////////////////////////////////////////

	function flexMargins() {
		if (!($('.flex-item').css('flex-basis'))) {
			return;
		}
		var flexItemBasis = $('.flex-item').css('flex-basis').replace('%', '');
		flexItemBasis = Number(flexItemBasis);

		//I - calculate how many items are there by dividing 100% by Flex Basis to get number of items in the flex container (100 / 49 == 2)
		//II - than multiplay that by flax basis to know how much space those items take (49 * 2 == 98)
		//III - than 	subtract that from 100% to know find out how much space is left for margins (100% - 98% == 2%)

		//I.1 - same as I and multiplay that by 2 to get how many margins should be set (2 * 2 == 4)

		//final - subtract III by I.1 to get left and right margin value in % (2 / 4 == 0.5%)

		flexItemMargin = (100 - (flexItemBasis * (100 / flexItemBasis).toFixed(0))) / ((100 / flexItemBasis).toFixed(0) * 2);

		if ((100 - (flexItemBasis * (100 / flexItemBasis).toFixed(0))) <= 0) {
			return;
		}

		$('.flex-item').css('margin-right', `${flexItemMargin}%`);
		$('.flex-item').css('margin-left', `${flexItemMargin}%`);
	}
	if ($(window).width() > 768) {
		flexMargins();
	}


	$(window).resize(function () {
		if ($(window).width() > 768) {
			flexMargins();
		} else {
			$('.flex-item').css('margin-right', `auto`);
			$('.flex-item').css('margin-left', `auto`);
		}
	});

	////////////////////////////////////////////////////////
	// change margin-top property value if header is fixed
	////////////////////////////////////////////////////////
	$(window).scroll(function () {
		if ($('body').hasClass('logged-in')) {
			var wpAdminBar = $('#wpadminbar').height();

			if ($('.head-container').hasClass('header-fixed')) {
				$('.header-fixed').css('top', wpAdminBar);
				$('.header').css('margin-top', '0');
			} else {
				$('.header').css('margin-top', wpAdminBar);
			}

		}
	});

	///////////////////////////////////////
	// add all h2 tags the 'underline' class
	///////////////////////////////////////

	var h2Tags = $('h2');

	for (i = 0; i < h2Tags.length; i++) {
		if (!$(h2Tags[i]).hasClass('underline')) {
			$(h2Tags[i]).addClass('underline')
		}
	}

	//////////////////////////////////
	//change menu or resize
	//////////////////////////////////

	$(window).resize(function () {
		if ($(window).width() > 992) {
			$('.head-nav-links').css('height', 'auto');
			$('.ham-menu').addClass('btn-close').removeClass('btn-open');
		} else {
			$('.head-nav-links').height(0);
			$('.ham-menu').addClass('btn-close').removeClass('btn-open');
		}
	});


	//////////////////////////////////
	// slide ham menu down/up on click
	//////////////////////////////////


	$('.ham-menu').click(function () {
		if ($('.head-nav-links').height() == 0) {
			$('.head-nav-links').height(navHeight);

			$('.ham-menu').addClass('btn-open').removeClass('btn-close');

		} else {
			$('.head-nav-links').height(0);

			$('.ham-menu').addClass('btn-close').removeClass('btn-open');
		}
	});



	////////////////////////////////////
	//	back to top btn
	////////////////////////////////////
	var check = false;
	var arrowTop = '<div class="top-btn"><a class="fas fa-arrow-up "></a></div>'
	$(document.body).append(arrowTop);

	$('.top-btn').click(function () {
		$('html, body').animate({
			scrollTop: '0'
		}, 1000);
	});

	if ($(window).scrollTop() < 500) {
		$('.top-btn').css('display', 'none');
	}


	$(window).scroll(function () {

		if ($(window).scrollTop() >= 500) {
			if (check == true) {
				return;
			}
			$('.top-btn').css('display', 'block');
			check = true;

		} else {
			$('.top-btn').css('display', 'none');
			check = false;
		}

	});


	/////////////////////////////////////
	// check if there is carousel on page
	/////////////////////////////////////

	if ($('.personnel-carousel').length) {

		$('.personnel-carousel').slick({
			arrows: true,
			dots: true,
			autoplay: true,
			autoplaySpeed: 5000
		});
	}

	///////////////////////////////
	//header fix on scroll
	////////////////////////////////

	$(window).scroll(function () {

		if ($(window).scrollTop() <= headerHeight) {
			trigger = true;
		}

		if (trigger == true) {

			if ($(window).scrollTop() >= headerHeight + 100) {
				$('.header .head-container').addClass('header-fixed');
			} else {
				$('.header .head-container').removeClass('header-fixed');
			}
		}
	});

	///////////////////////////
	//form validation
	///////////////////////////

	$('#contact-form').validate();


	///////////////////////////
	// scrollreveal animations
	//////////////////////////

	function headerReveal(item) {
		ScrollReveal().reveal(item, {
			distance: '20px',
			duration: 1300,
			origin: 'top',
			opacity: 0
		})
	}

	function newsReveal(item, dir) {
		ScrollReveal().reveal(`.news-items .news-items-item:${item}`, {
			distance: '50px',
			duration: 1000,
			origin: dir,
			easing: 'ease-out',
			opacity: 0
		});
	}

	function serviceReveal(item, dir) {
		ScrollReveal().reveal(`.service-items .service-items-item:${item}`, {
			distance: '50px',
			duration: 1300,
			origin: dir,
			easing: 'ease-out',
			opacity: 0
		});
	}

	function blogArticleReveal(item, dir) {
		ScrollReveal().reveal(`.blog-article-head ${item}`, {
			distance: '50px',
			duration: 1300,
			origin: dir,
			easing: 'ease',
			opacity: 0
		});
	}

	function serviceArticleReveal(item, dir) {
		ScrollReveal().reveal(`.service-article-main ${item}`, {
			distance: '50px',
			duration: 1300,
			origin: dir,
			easing: 'ease',
			opacity: 0
		});
	}

	headerReveal('.head-nav .logo');
	headerReveal('.head-nav .ham-menu');
	headerReveal('.head-nav .head-nav-links li');

	ScrollReveal().reveal('.header h1', {
		origin: 'bottom',
		distance: '30px',
		duration: 1500
	});
	
	ScrollReveal().reveal('.header p', {
		origin: 'bottom',
		distance: '30px',
		duration: 1500
	});

	function newsRevealAll(news) {
		var dir;
		for (i = 0; i < news; i++) {
			if (i % 2 != 1) {
				dir = 'left';
			} else if (i % 2 == 1) {

				dir = 'top';
			}

			newsReveal(`nth-of-type(${i+1})`, dir);
		}
	}

	newsRevealAll(blogNewsLength);
	newsRevealAll(newsLength);

	serviceReveal('first-of-type', 'left');
	serviceReveal('nth-of-type(2)', 'right');
	serviceReveal('nth-of-type(3)', 'left');
	serviceReveal('last-of-type', 'right');

	blogArticleReveal('.blog-article-content', 'left');
	blogArticleReveal('figure', 'right');

	serviceArticleReveal('.service-article-img', 'left');
	serviceArticleReveal('.service-article-content', 'right');


	ScrollReveal().reveal(`.blog-article-main`, {
		duration: 1300,
		easing: 'ease',
		opacity: 0,
		scale: 0.9
	});

	ScrollReveal().reveal(`.personnel .personnel-carousel`, {
		duration: 2000,
		easing: 'ease-out',
		opacity: 0,
		arrow: false
	});

	ScrollReveal().reveal('.about-main', {
		duration: 1500,
		scale: 0.8,
		opacity: 0,
		easing: 'ease'
	});

	ScrollReveal().reveal('.search', {
		origin: 'left',
		distance: '100px',
		duration: 1500,
		opacity: 0,
		easing: 'ease',
	});
});