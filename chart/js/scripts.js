(function($) {

	$('#secondary-nav a[href^="#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash;
				var offsetSize = $('.header').innerHeight() + $('.secondary-menu').innerHeight();
        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top - offsetSize
        }, 750, 'swing', function() {
            //window.location.hash = target;
      $('#secondary-nav').find('a').removeClass('active');
      $('[href*="'+target+'"]').addClass('active');
        });
    });

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('#secondary-nav a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#secondary-nav a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}
// https://johnresig.com/blog/learning-from-twitter/
		didScroll = false;
		$(window).scroll(function(){
			didScroll = true;
		})
		setInterval(function() {
    if ( didScroll ) {
        didScroll = false;
				var scroll = $(window).scrollTop();
				var targetOffset = $('#header').offset().top;
				// console.log(scroll);
				// console.log(targetOffset);
				if( scroll > targetOffset) {
					$("#header").addClass('stickify');
				}
				if(scroll == 0){
					$("#header").removeClass('stickify');
				}
    }
		}, 50);

    $(window).scroll(function() {
			if($("#secondary-nav").length > 0) {
				var scroll = $(window).scrollTop();
		    var targetOffset = $("#main-section").offset().top;
				onScroll();

		    if (scroll > targetOffset) {
		        //var id = $(this).attr('id');
		        $("#secondary-nav").addClass("sticky");

		    }
		    else{
		    	$("#secondary-nav").removeClass("sticky");
		    }
			}
	});

	$(document).on('ready', function() {
      $(".member_slider").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
      });

			$('.person_slider').slick({
				dots: true,
			  infinite: true,
			  // speed: 300,
			  slidesToShow: 4,
			  slidesToScroll: 4,
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3,
			        infinite: true,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			  ]
			})
			$('.staff_slider').slick({
				dots: true,
			  infinite: true,
			  // speed: 300,
			  slidesToShow: 4,
			  slidesToScroll: 4,
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3,
			        infinite: true,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			  ]
			})

			// Code for navigating to module on page after clicking one of the icons plus
			// fix for IE because it loads slower and runs the JS before full DOM loading
			var ua = window.navigator.userAgent;
			var msie = ua.indexOf("MSIE ");

			if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  {
				$(window).bind("load", function() {
					if(window.location.hash && window.location.hash !== '#wpforms-4786') {
						var offsetSize = $('.header').innerHeight();
						$('html, body').stop().animate({scrollTop:$(window.location.hash).offset().top - offsetSize }, 10);
					}
				});
			} else {
				if(window.location.hash && window.location.hash !== '#wpforms-4786') {
					var offsetSize = $('.header').innerHeight();
					$('html, body').stop().animate({scrollTop:$(window.location.hash).offset().top - offsetSize }, 10);
				}
			}


			if($('#qt_bbp_topic_content_em') || $('#qt_bbp_reply_content_em')) {
				var linkButton = '<input type="button" id="replacement_link_button" class="button button-small" value="link">';
				$('#qt_bbp_topic_content_em').after(linkButton);
				$('#qt_bbp_reply_content_em').after(linkButton);
			}

			$('#replacement_link_button').on('click', function(e) {
				e.preventDefault();
				var url = prompt('Enter URL address', 'http://');
				if (url === null) { return; }
				var description = prompt('Enter a description');
				if (description === null) { return; }
				var anchor = '<a href="' + url + '" target="_blank">' + description + '</a>';
				$('.bbp-the-content').insertAtCaret(anchor);
			})

			if($('.nav.navbar-nav')) {
				$('.nav.navbar-nav').hide()
				console.log('');
				var navItem = $('.nav.navbar-nav li').eq(3).find('a')
				if (navItem.html() !== 'Sign Out') {
					navItem = $('.nav.navbar-nav li').eq(4).find('a')
				}
				navItem.html('Forms')
				navItem.attr('href', '/support/?page=faq')
				$('.nav.navbar-nav').show()
			}

			if($('.wpsp_faq_header')) {
				$('.wpsp_faq_header').html('Forms')
			}

		});

    var pull = $('#pull');
    $('#pull').on('click', function(e) {
        e.preventDefault();
        $('.main-menu').slideToggle('is-open');
        $('.main-menu').clearQueue();
    });
    $('.main-menu-search').on('click', function(e) {
        e.preventDefault();
        $('.main-search').slideToggle('is-open');
        $('.main-search').clearQueue();
    });

    $( "#tabs-test" ).tabs();

    $('[id^="tabs-"]').tabs();

		Highcharts.setOptions({
    colors: ['#03A9F4', '#068B84', '#d9534f', '#f0ad4e']
		});

if($('#growth-graph').data('graphdata')){
		var growth_data = $('#growth-graph').data('graphdata');
		var growthChart = Highcharts.chart('growth-graph', {
			chart: {
				type: 'area',
				className: 'bar-chart',
				marginTop: 30,
			},
			title: {
				text: ''
			},
			xAxis: {
            labels: {
                enabled: true,
                formatter: function () {
                    return growth_data.xaxis[this.value];
                }
            },
            tickInterval: 1,
            minPadding: 0,
            maxPadding: 0,
            startOnTick: true,
            endOnTick: true
        },
			yAxis: {
				title: {
					text: 'Growth'
				},
			},
	    plotOptions: {
	        area: {
	            stacking: 'normal',
	            lineColor: '#666666',
	            lineWidth: 1,
	            marker: {
	                lineWidth: 1,
	                lineColor: '#666666'
	            }
	        }
	    },
			series: [{
				name: 'Surplus',
				data: growth_data.surplus,
				index: 1
			}, {
				name: 'Cumulative Dividends',
				data: growth_data.dividend,
				index: 0
			}]
		});
	}
if($('#projection-graph').data('graphdata')){
		var projections_data = $('#projection-graph').data('graphdata');
		var projectionsChart = Highcharts.chart('projection-graph', {
			chart: {
				type: 'column',
				className: 'bar-chart',
				marginTop: 30,
			},
			title: {
				text: ''
			},
			xAxis: {
				categories: projections_data.xaxis
			},
			yAxis: {
				title: {
					text: 'Projections'
				}
			},
			series: [{
				name: 'Surplus',
				data: projections_data.surplus
			}, {
				name: 'Income Allocation',
				data: projections_data.income
			}, {
				name: "Dividend",
				data: projections_data.dividend
			}]
		});
	}

if($('#claims-graph').data('graphdata')){
		var claims_data = $('#claims-graph').data('graphdata');
		var claimsChart = Highcharts.chart('claims-graph', {
			chart: {
				type: 'line',
				className: 'bar-chart',
				marginTop: 30,
			},
			title: {
				text: ''
			},
			xAxis: {
				categories: claims_data.xaxis
			},
			yAxis: {
				title: {
					text: 'Claims'
				}
			},
			series: [{
				name: 'Claims',
				data: claims_data.claims
			}, {
				name: 'Suits',
				data: claims_data.suits
			}]
		});
}

if( $("#simulation-graph").data('graphdata') ) {
	var simulation_data = $("#simulation-graph").data('graphdata');
	var simulationChart = Highcharts.chart('simulation-graph', {
		chart: {
			type: 'column',
			className: 'bar-chart',
			marginTop: 30
		},
		title: {
			text: ''
		},
		xAxis: {
			categories: simulation_data.xaxis
		},
		yAxis: {
			floor: 0,
			ceiling: 100,
			title: {
				text: 'Percent'
			}
		},
		series: [{
			name: 'Simulation Usage',
			data: simulation_data.score
		}]
	})
}

$(".hide-show.table-row").on('click', function(){
	$(this).next().toggleClass('hide');
})
$("#user-multiple-hospitals").on('click', function(e){
	e.preventDefault();
	$('.multiple-hospital-nav').toggleClass('hide');
})

if( $('[data-name="hospital"]') ) {
	$('[data-name="hospital"]').hide();
}

$("#newsletter-hide-show").on('click', function(){
	$(this).next().toggleClass('hide');
})

$(".toggle-docs").on('click', function() {
	$(this).toggleClass('open');
	$(this).next().toggleClass('hide');
})

$('.close-button').on('click', function() {
	$(this).parent().addClass('hide');
	$('.pdf-container').addClass('hide');
})
$(".file-view").on('click', function(e){
	e.preventDefault();
	var url = $(this).data('url');
	var type = $(this).data('type');
	var ext = $(this).data('ext');
	// console.log(url);
	// console.log($(this).data('admin'));
	var request = $.ajax({
		method: 'POST',
		url: '/ajax-pdf-view',
		data: {
			param: url,
			type: type,
			ext: ext
		}});
	 request.done(function(msg) {
		 console.log(msg);
		 $('.pdf-container').empty();
		 $('.pdf-container').append(msg);
		 if( $('.pdf-container').hasClass('hide') ) {
			 $('.pdf-container').removeClass('hide')
		 }
		 if( $('.close-pdf').hasClass('hide') ) {
			 $('.close-pdf').removeClass('hide');
		 }
		 $('iframe[src*="youtube"]').parent().fitVids();
	 })
	 request.fail(function(jqXHR, textStatus ) {
		 console.log("Request failed: " + textStatus);
	 });
})

// dashboard sub-nav
if( $('#member-pages').data('hosname') ) {
	var hospital_name = $('#member-pages').data('hosname');
		 $('main a:contains("' + hospital_name +'")').each(function(){
			 var current_text = $(this).html();
			 var new_text = current_text.replace(hospital_name, '');
			 $(this).html(new_text);
		 })
}

$('.dashboard-search').on('click', function(){
	$('#searchform').slideToggle();
})

// statistics counter
var timer;
function statNumberCount(stat) {
  var statVal = stat.html()
	var statInt = ''
	var lessStatInt = ''
  if(statVal.indexOf('%') > -1  && statVal.length < 5) {
    statInt = parseFloat(statVal)
    lessStatInt = statInt * .5;
    countUp(stat, lessStatInt, statInt, '%')
  } else if (statVal.indexOf('$') > -1 && statVal.length < 4) {
		statInt = Number(statVal.replace('$',''))
		lessStatInt = statInt * .5;
		countUp(stat, lessStatInt, statInt, '$')
  } else if (statVal.indexOf('+') > -1 && statVal.length < 5) {
		statInt = Number(statVal.replace('+',''))
		lessStatInt = statInt * .5;
		countUp(stat, lessStatInt, statInt, '+')
  } else if (isNaN(statVal)) {
  	return
  } else if (statVal.length < 3) {
		statInt = parseInt(statVal)
		lessStatInt = statInt - 20;
		countUp(stat, lessStatInt, statInt)
  } else if (statVal.length < 4) {
		statInt = parseInt(statVal)
		lessStatInt = statInt * .8;
		countUp(stat, lessStatInt, statInt)
  } else if (statVal.length < 5) {
		statInt = parseInt(statVal)
		lessStatInt = statInt * .9;
		countUp(stat, lessStatInt, statInt)
  }
}

function countUp(stat, start, finish, symbol) {
	start = parseInt(start)
	start++
  if(symbol == '%' || symbol == '+') {
		stat.html(start + symbol);
	} else if (symbol == '$') {
		stat.html(symbol + start);
	} else {
		stat.html(start);
	}
  if(start < finish) {
    timer = setTimeout(function() {
      countUp(stat, start, finish, symbol)
    }, 25)
  }
}
var statsArray = []
$('.statistics-number').each(function(i) {
	statsArray.push($(this));
	$(window).scroll(function() {
		if(statsArray.length > 0) {
			var scroll = $(window).scrollTop();
			var targetOffset = statsArray[i].offset().top;
			var stopNumber = statsArray[i].data('stop')
			if((targetOffset - scroll) < $(window).height() && stopNumber) {
				statNumberCount(statsArray[i]);
				statsArray[i].data('stop', false)
			}
		}
	})
})

$(".icon-inside").hover(
	function() {
		var old = $(this).attr('src');
		var new_image = $(this).data('hover');
		$(this).attr('src', new_image);
	},
	function() {
		var old = $(this).data('icon');
		$(this).attr('src', old);
	})
	if($('#tab_faq').length > 0) {
		$('#tab_faq').html('Forms')
	}

	$('iframe[src*="youtube"]').parent().fitVids();
	$('.pdf-viewers').fitVids();
	$('.pdf-container flex-container p').fitVids();
	$('.page_item_has_children > a').on('click', function(e) {
		e.preventDefault();
	})



}) (jQuery);

jQuery.fn.extend({
insertAtCaret: function(myValue){
  return this.each(function(i) {
    if (document.selection) {
      //For browsers like Internet Explorer
      this.focus();
      sel = document.selection.createRange();
      sel.text = myValue;
      this.focus();
    }
    else if (this.selectionStart || this.selectionStart == '0') {
      //For browsers like Firefox and Webkit based
      var startPos = this.selectionStart;
      var endPos = this.selectionEnd;
      var scrollTop = this.scrollTop;
      this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
      this.focus();
      this.selectionStart = startPos + myValue.length;
      this.selectionEnd = startPos + myValue.length;
      this.scrollTop = scrollTop;
    } else {
      this.value += myValue;
      this.focus();
    }
  })
}
});
