(function ($) {
	"use strict";

	$(document).ready(function () {
		$(window).scroll(function () {

			var scroll = $(window).scrollTop();

			if (scroll >= 40) {
				if ($('#header').css("position") != "fixed")
					$('#header').css({position: "fixed", top: "-70px"}).animate({top: "0",}, 100, "linear");
				$("#header").addClass("fixed-header");
			} else if (scroll <= 39) {
				if ($('#header').css("position") != "static")
					$('#header').animate({top: "-70px",}, 100, "linear", function () {
						$('#header').css({position: "static"});
						$("#header").removeClass("fixed-header");
					})
			}
		});

		$('.lst-fade').each(function () {
			$(this).removeClass('hide');
			//$('#booking-container').removeClass('hide');
			$(this).slick({
				dots: false,
				infinite: true,
				speed: 1000,
				fade: true,
				cssEase: 'linear',
				autoplay: true,
				arrows: false
			});
		});

		// JavaScript Document
		$('.owl-carousel').owlCarousel({
			loop: false,
			margin: 20,
			dots: true,
			nav: true,
			navText: [
				"<span class='fa fa-chevron-right'></span>",
				"<span class='fa fa-chevron-left'></span>"
			],

			responsive: {
				0: {
					items: 1,
					nav: false
				},
				600: {
					items: 2,
					nav: false
				},

				768: {
					items: 2,
					nav: false
				},
				960: {
					items: 2,
					dotsEach: 3
				},
				1000: {
					items: 3,
					nav: true,
					dotsEach: 3
				},
				1200: {
					items: 4,
					nav: true,
					dotsEach: 3
				}
			}
		});

		var el = $('.img-intro span');
		var index = 0;
		var timer = window.setInterval(function () {
			if (index < el.length) {
				el.eq(index++).addClass('pop');
			} else {
				window.clearInterval(timer);
			}
		}, 450);
	});
})(jQuery);


(function ($) {
  $(document).ready(function () {
    $('.lst-search-location').each(function () {
      $(this).autocomplete({
        autoSelectFirst: true,
        minChars: 2,
        lookup: function (query, done) {
          // Do Ajax call or lookup locally, when done,
          // call the callback and pass your results:
          $.ajax({
            url: APP_URL + '/ajax_search',
            type: 'POST',
            dataType: 'json',
            data: {
              query: query
            },
            success: function (resp) {
              // Build resp.
              var result = {};
              result.suggestions = [];

              if (resp.country.length) {
                if (resp.country[0]) {
                  result.suggestions.push({
                    value: resp.country[0].display_text,
                    data: resp.country[0].id,
                    type: resp.country[i].type
                  });
                }
              }
              if (resp.state.length) {
                for (var i = 0; i <= 3; i++) {
                  if (resp.state[i]) {
                    result.suggestions.push({
                      value: resp.state[i].display_text,
                      data: resp.state[i].id,
                      type: resp.state[i].type
                    });
                  }
                }
              }
              if (resp.city.length) {
                for (var i = 0; i <= 3; i++) {
                  if (resp.city[i]) {
                    result.suggestions.push({
                      value: resp.city[i].display_text,
                      data: resp.city[i].id,
                      type: resp.city[i].type
                    });
                  }
                }
              }
              if (resp.area.length) {
                for (var i = 0; i <= 3; i++) {
                  if (resp.area[i]) {
                    result.suggestions.push({
                      value: resp.area[i].display_text,
                      data: resp.area[i].id,
                      type: resp.area[i].type
                    });
                  }
                }
              }
              if (resp.destination.length) {
                for (var i = 0; i <= 3; i++) {
                  if (resp.destination[i]) {
                    result.suggestions.push({
                      value: resp.destination[i].display_text,
                      data: resp.destination[i].id,
                      type: resp.destination[i].type
                    });
                  }
                }
              }
              if (resp.room.length) {
                for (var i = 0; i <= 20; i++) {
                  if (resp.room[i]) {
                    result.suggestions.push({
                      value: resp.room[i].display_text,
                      data: resp.room[i].id,
                      type: resp.room[i].type
                    });
                  }
                }
              }

              if (!result.suggestions.length) {
                result.suggestions.push({
                  value: 'No result',
                  data: '',
                  type: 'LOCATION'
                });
              }

              done(result);
            }
          });
        },
        onSelect: function (suggestion) {
          $('.lst-sid').val(suggestion.data);
          $('.lst-search-type').val(suggestion.type);
        }
      });
    });
  });
})(jQuery);
//# sourceMappingURL=home.js.map
