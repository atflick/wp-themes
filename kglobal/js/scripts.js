(function($) {

	$(document).on('ready', function() {
		$(".regular").slick({
			dots: true,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1
		});

		$('.quotes').slick({
			infinite: true,
			dots: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			// autoplay: true,
			// autoplaySpeed: 2000,
		});

		$('.image-slider-container').slick({
			infinite: true,
			dots: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true
		});

		$('.scroll-down').on('click', function(){
			var body = $("html, body");
			var offset = $("#module-2").offset().top;
			body.stop().animate({scrollTop:offset}, 500, 'swing');
		});

		$('.mobile-nav-icon').click(function(){
			$('.one').toggleClass('one-a');
			$('.two').toggleClass('two-a');
			$('.three').toggleClass('three-a');

			$('#header').toggleClass('open');

      // if you close the header and the search is open, th search closes too
			if( !$("#header").hasClass('open') && $('.search-input').css('left') == '0px' ){
				var value = -$('.search-input').width();
				$('.search-input').css('left', value);
			}

		})

		$('#cat').change(function() {
			var newCat = this.value;
			var slug = ''
			if($('#main-index')) {
				slug = '/' + $('#main-index').data('page-slug')
			}
			currentUrl = window.location.href;
			var tag = ''
			if(currentUrl.indexOf('tag') !== -1) {
				tag = '&tag=' + currentUrl.substring(currentUrl.lastIndexOf('tag=') + 4, currentUrl.length)
			}
			var auth = ''
			if(currentUrl.indexOf('auth') !== -1) {
				auth = '&auth=' + currentUrl.substring(currentUrl.lastIndexOf('auth=') + 5, currentUrl.length)
			}
			var url = slug + '?cat=' + newCat + tag + auth;
			window.open(url, '_self')
		})

		$('.open-button').on('click', function(){
			serviceToggle($(this))
		})

		if(window.location.hash.indexOf('service') != -1) {
			var hash = window.location.hash
			$('html, body').animate({
					scrollTop: $(hash).offset().top - 200
			}, 2000);
			var openThisItem = $(hash).find('.open-button')
			serviceToggle(openThisItem)
		}

		function serviceToggle(item) {
			item.parent().find('.service-detail').slideToggle();
			item.parent().find('.service-detail').toggleClass('open');
			var url = item.data('url');
			var status = item.data('status');
			if( status === 'closed') {
				item.css('background', 'url(' + url + '/dist/images/collapse.svg) no-repeat center center');
				item.data('status', 'open');
			} else if( status === 'open'){
				item.css('background', 'url(' + url + '/dist/images/expand.svg) no-repeat center center');
				item.data('status', 'closed');
			}
		}


		$("#search-icon").on('click', function(e){
			$('.nav-social-icon').toggleClass('hide')
			$('.search-input').toggleClass('open')
			var img = $(this).find('img')
			var newSrc = img.data('toggle-src')
			img.data('toggle-src', img.attr('src'))
			img.attr('src', newSrc)
		})

		if($('#apply-now')) {
			if(window.location.hash) {
				$('#apply-now').hide()
				$('.application-form').addClass('open')
			} else {
				var job = $('#apply-now').data('job')
				$('.wpforms-field-hidden input').val(job)
				$('#apply-now').click(function(e) {
					var newText = $(this).data('text')
					var currentText = $(this).html()
					if(newText) {
						$(this).html(newText)
					} else {
						$(this).html('hide')
					}
					$(this).data('text', currentText)
					e.preventDefault()
					$('.application-form').toggleClass('open')
					if(currentText !== 'hide') {
						$('html, body').animate({
							scrollTop: $(this).offset().top
						}, 500);
					}
				})
			}
		}

		$(".play_button").on('click', function(){
			$('iframe')[0].src += "&autoplay=1";
			$('.video-container').removeClass('hide');
			$(this).addClass('hide');
		})

		$('input:file').change(function (){
       var fileName = $(this).val();
       if(fileName) {
				 $('.fake-button').html('File Chosen')
			 }
     });


		 var animations = []
		 $('.animated').each(function(i) {
			 animations.push($(this));
			 $(window).scroll(function() {
				 if(animations.length > 0) {
					 var scroll = $(window).scrollTop();
					 var targetOffset = animations[i].offset().top;
					 var animationType = animations[i].data('animation')
					 if((targetOffset - scroll) < ($(window).height())  && animationType) {
						 animations[i].animateCss(animationType)
						 animations[i].data('animation', false)
						 animations[i].removeClass('hide-opacity');
						 animations[i].css('opacity', 1);
					 }
				 }
			 })
		 })

		 var animationSeries = []
		 $('.animation-series').each(function(i) {
			 animationSeries.push($(this))
			 $(window).scroll(function() {
				 if(animationSeries.length > 0) {
					 var scroll = $(window).scrollTop();
					 var targetOffset = animationSeries[i].offset().top;
					 var animationType = animationSeries[i].data('animation');
					 var itemSet = animationSeries[i].children();
					 if((targetOffset - scroll) < ($(window).height() - 200) && animationType) {
						 animationRecursion(itemSet, animationType, 0);
						 animationSeries[i].data('animation', false);

					 }
				 }
			 })
		 })

		if($('.wpforms-field-file-upload')) {
			var fakeButton = '<div class="button-container fake-button">Choose File</div>';
			$('.wpforms-field-file-upload').append(fakeButton);
			$('.fake-button').click(function() {
				$('.wpforms-field-file-upload input').click()
			})
		}

		if(navigator.platform.indexOf('iPad') != -1) {
			$('main').addClass('ipad');
		}

	});


	function animationRecursion(arr, animation, i) {
		var newI = i + 1;
		if(arr.length >= newI) {
			setTimeout(function () {
				arr.eq(i).removeClass('hide-opacity').animateCss(animation, animationRecursion(arr, animation, newI))
			},100)
		} else {
			arr.eq(i).animateCss(animation)
		}
	}


	$(window).scroll(function() {
		var scrollTop = $(window).scrollTop();
		if(scrollTop > 100) {
			$('#header').addClass('scrolled')
		} else {
			$('#header').removeClass('scrolled')
		}
	})


}) (jQuery);

$.fn.extend({
  animateCss: function (animationName, callback) {
    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    this.addClass('animated ' + animationName).one(animationEnd, function() {
      $(this).removeClass('animated ' + animationName);
			$(this).css('opacity', '1')
      if (callback) {
        callback();
      }
    });
    return this;
  }
});
