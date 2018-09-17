<?php
/*
Template Name: Location
*/

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">


		<?php if(have_rows('location')): ?>

			<?php while(have_rows('location')) : the_row();

				$map = get_sub_field('google_map');
				$locationImage = get_sub_field('location_image');
				$locationName = get_sub_field('location_name');
				$locationAddress = get_sub_field('location_address');
				$locationPhone = get_sub_field('location_main_phone_number');
				$locationAddPhone = get_sub_field('additional_phone_number');
				$locationFax = get_sub_field('location_fax_number');
				$openingHours = get_sub_field('opening_hours');
				$closingTime = get_sub_field('closing_time');
				$locationDays = get_sub_field('location_days_open');
				$locationClose = get_sub_field('location_closed_message');
				$pharmacyHours = get_sub_field('pharmacy_opening_hours');
				$pharmacyClose = get_sub_field('pharmacy_closing_time');
				$pharmacyDays = get_sub_field('pharmacy_days_open');

				?>
			<div class="locations">
<div class="location-image">
				<img src="<?php echo $locationImage; ?>">
</div>
	<div class="location-content">
				<h3><?php echo $locationName; ?></h3>
				<h5><?php echo $locationAddress; ?></h5>
				<p><?php echo $locationPhone; ?></p>
				<p><?php echo $locationAddPhone; ?></p>
				<p><?php echo $locationFax; ?></p>
				<p><?php echo $openingHours; ?>&ndash;<?php echo $closingTime; ?></p>
				<p><?php echo $locationDays; ?></p>
				<p><?php echo $locationClose; ?></p>
				<p><?php echo $pharmacyHours; ?>&ndash;<?php echo $pharmacyClose; ?></p>
				<p><?php echo $pharmacyDays; ?></p>
	</div>

				<div class="acf-map">
				<div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>">
					<p class="address"><?php echo $map['address']; ?></p>
				</div>
			<?php endwhile; ?>
			</div>

		<?php endif; ?>
			</div>
		<?php if(have_rows('is_there_an_outreach_location')): ?>

			<?php while(have_rows('is_there_an_outreach_location')) : the_row();
				$outreachName = get_sub_field('outreach_name');
				$outreachAddress = get_sub_field('outreach_address');
				$outreachOpen = get_sub_field('outreach_days_open');
				$outreachHours = get_sub_field('outreach_opening_hours');
				$outreachClose = get_sub_field('outreach_closing_time')
				?>
				<?php if(!empty($outreachName)) { ?>
					<p><?php echo $outreachName; ?></p>
		<p><?php echo $outreachAddress; ?></p>
		<p><?php echo $outreachOpen; ?></p>
		<p><?php echo $outreachHours; ?>&ndash;<?php echo $outreachClose; ?></p>

<?php

		}
			endwhile; ?>


		<?php endif; ?>


		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEXGioqp6BFCyLI9NH755iNc5zp2MBmI4"></script>
		<script>
			(function($) {

				/*
				*  new_map
				*
				*  This function will render a Google Map onto the selected jQuery element
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	$el (jQuery element)
				*  @return	n/a
				*/

				function new_map($el) {

					// var
					var $markers = $el.find('.marker');


					// vars
					var args = {
						zoom: 16,
						center: new google.maps.LatLng(0, 0),
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};


					// create map
					var map = new google.maps.Map($el[0], args);


					// add a markers reference
					map.markers = [];


					// add markers
					$markers.each(function() {

						add_marker($(this), map);

					});


					// center map
					center_map(map);


					// return
					return map;

				}

				/*
				*  add_marker
				*
				*  This function will add a marker to the selected Google Map
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	$marker (jQuery element)
				*  @param	map (Google Map object)
				*  @return	n/a
				*/

				function add_marker($marker, map) {

					// var
					var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

					// create marker
					var marker = new google.maps.Marker({
						position: latlng,
						map: map
					});

					// add to array
					map.markers.push(marker);

					// if marker contains HTML, add it to an infoWindow
					if($marker.html()) {
						// create info window
						var infowindow = new google.maps.InfoWindow({
							content: $marker.html()
						});

						// show info window when marker is clicked
						google.maps.event.addListener(marker, 'click', function() {

							infowindow.open(map, marker);

						});
					}

				}

				/*
				*  center_map
				*
				*  This function will center the map, showing all markers attached to this map
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	map (Google Map object)
				*  @return	n/a
				*/

				function center_map(map) {

					// vars
					var bounds = new google.maps.LatLngBounds();

					// loop through all markers and create bounds
					$.each(map.markers, function(i, marker) {

						var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

						bounds.extend(latlng);

					});

					// only 1 marker?
					if(map.markers.length == 1) {
						// set center of map
						map.setCenter(bounds.getCenter());
						map.setZoom(16);
					}
					else {
						// fit to bounds
						map.fitBounds(bounds);
					}

				}

				/*
				*  document ready
				*
				*  This function will render each map when the document is ready (page has loaded)
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	5.0.0
				*
				*  @param	n/a
				*  @return	n/a
				*/
// global var
				var map = null;

				$(document).ready(function() {

					$('.acf-map').each(function() {

						// create map
						map = new_map($(this));

					});

				});

			})(jQuery);
		</script>

	</main>
</div>
