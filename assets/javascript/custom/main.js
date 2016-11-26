;(function($){
$(window).load(function() {

	//section About
		$(".eu-feature__link").eq( 0 ).attr("data-name", "ideas");
		$(".eu-feature__link").eq( 1 ).attr("data-name", "design");
		$(".eu-feature__link").eq( 2 ).attr("data-name", "team");

		$(".eu-feature-description__item").eq( 0 ).attr("data-name", "ideas");
		$(".eu-feature-description__item").eq( 1 ).attr("data-name", "design");
		$(".eu-feature-description__item").eq( 2 ).attr("data-name", "team");

		// Adding item class "eu-feature-description__item--active" to first div
		$( ".eu-feature-description__item" ).eq( 0 ).addClass('eu-feature-description__item--active');

		$('.eu-feature__line').on( 'mouseenter', '.eu-feature__link', function(e) {
			var filterValue = $(this).attr('data-name');
			var filterText = $('.eu-feature-description').find('[data-name = ' + filterValue + ']');

			filterText
				.siblings()
					.removeClass('eu-feature-description__item--active')
					.end()
				.addClass('eu-feature-description__item--active');


			e.preventDefault();
		});

	//section Services
		$(".eu-services__link").eq( 0 ).attr("data-name", "web");
		$(".eu-services__link").eq( 1 ).attr("data-name", "graphic");
		$(".eu-services__link").eq( 2 ).attr("data-name", "game");
		$(".eu-services__link").eq( 3 ).attr("data-name", "service");

		$(".eu-services-description__item").eq( 0 ).attr("data-name", "web");
		$(".eu-services-description__item").eq( 1 ).attr("data-name", "graphic");
		$(".eu-services-description__item").eq( 2 ).attr("data-name", "game");
		$(".eu-services-description__item").eq( 3 ).attr("data-name", "service");

		// Adding item class "eu-services-description__item--active" to first div
		$( ".eu-services-description__item" ).eq( 0 ).addClass('eu-services-description__item--active');

		// Adding item class "eu-feature-description__item--active" to first div
		$( ".eu-services-description__item" ).eq( 0 ).addClass('eu-services-description__item--active');

		$('.eu-services__line').on( 'mouseenter', '.eu-services__link', function(e) {
			var filterValue = $(this).attr('data-name');
			var filterText = $('.eu-services-description').find('[data-name = ' + filterValue + ']');

			filterText
				.siblings()
					.removeClass('eu-services-description__item--active')
					.end()
				.addClass('eu-services-description__item--active');


			e.preventDefault();
		});

	// Section Portfolio
	// Init Swipebox
	if($.fn.swipebox){
		$('.swipebox').swipebox({

		});
	}

	// Init Isotope
	// Cheking using function "isotope"
		if($.fn.isotope){
			var $grid = $('.iso-grid').isotope({
				itemSelector: '.eu-works__work',
				layoutMode: 'masonry',
				// sortBy : 'original-order',
				masonry: {
					columnWidth: 270,
					isFitWidth: true,
					gutter: 10
				}
			});
		}
		// bind filter button click
		$('.filters-button-group').on( 'click', 'button', function() {
			var filterValue = $( this ).attr('data-filter');
			$grid.isotope({ filter: filterValue });
		});
		// change is-checked class on buttons
		$('.eu-filters').each( function( i, buttonGroup ) {
			var $buttonGroup = $( buttonGroup );
			$buttonGroup.on( 'click', 'button', function() {
				$buttonGroup.find('.is-checked').removeClass('is-checked');
				$( this ).addClass('is-checked');
		  });
		});

	// Section Contact
	$("#eu-map__scroll").click(function(e) {
		e.preventDefault();
		$(".eu-map__cover").css("transform", "translateY(101%)");
	});
});
})(jQuery);
