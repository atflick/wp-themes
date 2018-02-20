(function($) {

// ajax logic for all posts
    $('.post-selector').on('change', function() {
			ajaxSubmission($("#sorting-form"), false);
    })

		$('.all-posts').on('click', '.pager', function(){
			ajaxSubmission($("#sorting-form"), $(this).attr('id'));
		})

	$(".search-post-selector").on('change', function(){
		var stripSort = window.location.href.replace(/\&sort=(.*)/g, '');
		var newUrl = stripSort.replace(/\/page\/(.*)\//g, '');
		window.location.href = newUrl + "&sort=" + $(this).val();
	})

		function ajaxSubmission(form, direction){
			console.log(form.serialize());
			var request = $.ajax({
				url: '/ajax-sort',
				method: 'POST',
				data: {
					data: form.serialize(),
					direction: direction,
					offset_amount: $('.pagination').data('offset'),
				},
				dataType: "html"
			});

			request.done(function(msg) {
				$(".all-posts-container").empty().append(msg);
				$('html, body').animate({
					scrollTop: $(".all-posts-container").offset().top
				}, 'slow');
			})
			request.fail(function(jqXHR, textStatus) {
				console.log("Request failed with:" + textStatus);
			})
		}

// 	if( $("#geolocator").length ) {
// 	navigator.geolocation.getCurrentPosition(function (position) {
// 		getState(position);
// 	})

// 	function getState(position) {
// 		const settings = {
// 			"async": true,
// 			"crossDomain": true,
// 			"url": "https://locationiq.org/v1/reverse.php?key=99811875076efb&lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&format=json",
// 			"method": "GET"
// 		}

// 		$.ajax(settings).done(function (response) {
// 			const state = response.address.state;
// 			$("#geolocate-title").html("Local to " + state);
// 			const pageUrl = state == 'District of Columbia' ? "?state=DC" : "?state=" + state;
// 			const oldUrl = window.location.href;
// 			if(!oldUrl.includes('state')){
// 			window.location.href = oldUrl + pageUrl;
// 			}
// 		})
// 	}
// }

$("#get-updates-button").on("click", function(){
	if( $("#mailing-list").length) {
		$("html, body").animate({
			scrollTop: $("#mailing-list").offset().top
		}, 'slow');
	} else {
		window.location.href="/#mailing-list";
	}
})

$(".search-container").on("click", function(){
	$(this).children().toggleClass('hide');
	$(".search-form").toggleClass('hide-search');
});

$(".reader").on("click", function(){
	const parent = $(this).parent();
	parent.children('.toggle').each(function(){
		$(this).toggleClass('hide');
	});
})

$("#national-resources").on("click", function(){
	$("#locale").val("national");
	ajaxSubmission($("#sorting-form"), false);
	$('html, body').animate({
		scrollTop: $(".all-posts").offset().top
	}, 'slow');
})


}) (jQuery);
