<?php
/*
Template Name: Front
*/
?>
<?php get_header(); ?>

<!-- Begin Section Promo -->
<section id="eu-promo" class="eu-promo">

	<div class="eu-promo__headline">
		<h1>
			<?php the_field('promo_headline') ?>
		</h1>
		<p><?php the_field('promo_tagline') ?></p>
	</div>

	<!-- Begin Promo Slider (CPT UI) -->
	<?php
	$PromoSliderArgs = array(
		'post_type'=>'promo_slide',
		'posts_per_page'=>3,
		// 'orderby'=>'',
		'order'=>'ASC'
		);
	$PromoSlider = new WP_Query($PromoSliderArgs);?>
	<?php if($PromoSlider->have_posts()): ?>
		<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out; timer-delay:500">

			<ul class="orbit-container">
				<?php while($PromoSlider->have_posts()): $PromoSlider->the_post() ?>
					<li class="orbit-slide orbit-slide--promo" style="background-image: url('<?php the_post_thumbnail_url('promo-slide')?>')">

					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif;?>
	<?php wp_reset_postdata() ?>
	<!-- End Promo Slider (CPT UI) -->

	<a href="#eu-about" class="eu-scroll">
		<svg width="32" height="32" viewBox="0 0 32 32">
			<path d="M15.233 19.175l0.754 0.754 6.035-6.035-0.754-0.754-5.281 5.281-5.256-5.256-0.754 0.754 3.013 3.013z" fill="#ffffff"></path>
		</svg>
	</a>
</section>
<!-- End Section Promo -->

<!-- Begin Section About -->
<section id="eu-about" class="eu-section eu-about">
	<div class="row column">
		<div class="row text-center">
			<h2 class="eu-section__title">
				<?php the_field('about_title') ?>
			</h2>
			<p class="eu-section__tagline"><?php the_field('about_tagline') ?></p>
		</div>

		<?php if (have_rows('feature')) : ?>
			<div class="row text-center">
				<div class="eu-feature__line">
					<?php while (have_rows('feature')) : the_row(); ?>

						<a href="#" class="eu-feature__link">
							<img src="<?php the_sub_field('feature_icon') ?>" alt="<?php the_sub_field('feature_title') ?>">
						</a>

					<?php endwhile; ?>
				</div>
			</div>
			<div class="row text-left">
				<div class="column small-12 medium-4 eu-feature-description">
					<?php while (have_rows('feature')) : the_row(); ?>

						<div class="eu-feature-description__item">
							<h3><?php the_sub_field('feature_title') ?></h3>
							<?php the_sub_field('feature_text') ?>
						</div>

					<?php endwhile; ?>
				</div>
				<div class="column small-12 medium-7 eu-about__text">
					<?php the_field('about_text') ?>
				</div>
			</div>
		<?php endif; ?>
	</div>

</section>
<!-- End Section About -->

<!-- Begin Section Featured Projects -->
<section id="eu-featured" class="eu-section eu-featured clearfix">
	<div class="row column">
		<div class="row text-center">
			<h2 class="eu-section__title">
				<?php the_field('featured_title') ?>
			</h2>
			<p class="eu-section__tagline eu-section__tagline--featured"><?php the_field('featured_tagline') ?></p>
		</div>
	</div>

	<?php if (have_rows('featured_projects')) : ?>
		<div class="row column">
			<div class="projects-row">
				<div class="row large-collapse">
					<?php $i=1 ?>
					<?php while (have_rows('featured_projects')) : the_row(); ?>
						<?php if ($i==1): ?>
							<div class="eu-featured__box column small-12 medium-6">
							<?php else: ?>
							<div class="eu-featured__box column small-12 medium-3">
								<?php endif; ?>
								<img src="<?php the_sub_field('featured_image') ?>" alt="<?php the_sub_field('featured_title') ?>" style="height: 100%;">
								<div class="eu-featured__cover">
									<h3><?php the_sub_field('featured_title') ?></h3>
								</div>
							</div>
						<?php $i++ ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>

	<?php endif; ?>

	<div class="eu-featured-callout" style="background: url('<?php the_field('featured_callout_background') ?>'); background-size:cover;">
		<div class="row column">
			<div class="row">
				<p><?php the_field('featured_callout_text') ?></p>
				<a class="eu-callout__button button hollow" href="<?php the_field('featured_callout_link')?>"><?php the_field('featured_callout_label') ?></a>
			</div>
		</div>
	</div>
</section>
<!-- End Section Featured Projects -->

<!-- Begin Section Our Services -->
<section id="eu-services" class="eu-section eu-services">
	<div class="row column">
		<div class="row text-center">
			<h2 class="eu-section__title">
				<?php the_field('services_title') ?>
			</h2>
			<p class="eu-section__tagline"><?php the_field('services_tagline') ?></p>
		</div>

		<div class="row text-left">
			<div class="column small-12 medium-6">

				<?php if (have_rows('service')) : ?>
					<div class="eu-services__box">
						<div class="eu-services__line">
						 <?php while (have_rows('service')) : the_row(); ?>
							<a href="#" class="eu-services__link">
								<img src="<?php the_sub_field('service_icon') ?>" alt="<?php the_sub_field('service_title') ?>">
							</a>
						 <?php endwhile; ?>
						</div>

						<div class="eu-services-description">
							<?php while (have_rows('service')) : the_row(); ?>
								<div class="eu-services-description__item">
									<h3><?php the_sub_field('service_title') ?></h3>
									<?php the_sub_field('service_text') ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<div class="column small-12 medium-6">
				<?php if (have_rows('service_count')) : ?>
					<div class="eu-services__count">
						<?php $i = 1 ?>
						 <?php while (have_rows('service_count')) : the_row(); ?>
							<div class="eu-services__skill">
								<div id="cont-<?php echo $i?>" class="eu-contour" data-pct="100">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" id="svg-<?php echo $i?>" width="124" height="124" viewPort="0 0 100 100" >
										<circle r="59" cx="62" cy="62" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0" stroke="#047378" stroke-width= "4px" style="transform-origin:center; transform:rotate(-90deg); transition: stroke-dashoffset 1.5s linear;"></circle>
										<circle id="bar-<?php echo $i?>" r="59" cx="62" cy="62" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0" stroke="#19BD9A" stroke-width= "5px" style="transform-origin:center; transform:rotate(-90deg); transition: stroke-dashoffset 1.5s linear;" ></circle>
									</svg>
								</div>
							<p><?php the_sub_field('service_skill') ?></p>
							</div>

						 	<script type="text/javascript">
						 		;(function($){
						 			$(document).ready(function(){
						 				var val = <?php the_sub_field('service_percent') ?>;
						 				var $circle = $('#svg-<?php echo $i?> #bar-<?php echo $i?>');
						 				var $hole = $('#svg-<?php echo $i?> #hole-<?php echo $i?>');

						 				if (isNaN(val)) {
						 					val = 100;
						 				}
						 				else{
						 					var r = $circle.attr('r');
						 					var c = Math.PI*(r*2);

						 					if (val < 0) { val = 0;}
						 					if (val > 100) { val = 100;}

						 					var pct = ((100-val)/100)*c;
						 					var hole = 100-pct;

						 					$circle.css({ strokeDashoffset: -pct});
						 					$hole.css({ strokeDashoffset: hole});


						 					$('#cont-<?php echo $i?>').attr('data-pct',val);
						 				}
						 		});
						 	})(jQuery);
						 	</script>
						 	<?php $i++ ?>
						 <?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

</section>
<!-- End Section Our Services -->

<!-- Begin Section Portfolio -->
<section id="eu-portfolio" class="eu-section eu-portfolio">
	<div class="row column">
		<div class="row text-center">
			<h2 class="eu-section__title">
				<?php the_field('portfolio_title') ?>
			</h2>
			<p class="eu-section__tagline"><?php the_field('portfolio_tagline') ?></p>
		</div>

		<?php
		$worksArgs = array(
			'post_type'=>'works',
			'posts_per_page'=>-1,
			// 'orderby'=>'',
			'order'=>'ASC'
			);
			$works = new WP_Query($worksArgs);?>
			<?php if($works->have_posts()): ?>
				<div class="eu-filters filters-button-group text-center">
				<button class="eu-filter is-checked" data-filter="*">All Works</button>
					<?php $categories = get_categories()?>
					<?php for($i = 0, $size = count($categories); $i < $size-1; ++$i): ?>
						<button class="eu-filter" data-filter=".<?php echo $categories[$i]->cat_name; ?>"><?php echo $categories[$i]->cat_name ; ?></button>
					<?php endfor; ?>
				</div>
				<!-- End eu-filters -->
	</div>
			<div class="row column">
				<div class="iso-grid eu-works clearfix">
					<?php while($works->have_posts()): $works->the_post() ?>
						<div class="eu-works__work <?php  ?><?php  foreach( get_the_category() as $category ) {echo $category->cat_name . ' ';} the_id()?>">
							<a href="<?php the_post_thumbnail_url('full') ?>" title="<?php the_title() ?>">
								<?php the_post_thumbnail('full') ?>
							</a>
							<div class="eu-works__cover">
								<h3 class="eu-works__title">
									<?php the_title() ?>
								</h3>
								<?php the_content() ?>
								<a href="#" class="eu-works__link">
									<svg width="16" height="16" viewBox="0 0 32 32">
										<path d="M17.534 20.793c-1.301 0-2.602-0.495-3.592-1.485l0.754-0.754c1.566 1.566 4.112 1.565 5.678 0l6.715-6.716c1.565-1.565 1.565-4.111 0-5.677l-1.251-1.25c-1.565-1.565-4.112-1.565-5.677 0l-4.739 4.739-0.754-0.754 4.739-4.739c1.98-1.981 5.203-1.982 7.185 0l1.251 1.25c1.98 1.981 1.98 5.204 0 7.185l-6.715 6.715c-0.99 0.99-2.292 1.485-3.593 1.485z" fill="#ffffff"></path>
										<path d="M9.001 29.329c-1.357 0-2.633-0.528-3.592-1.488l-1.251-1.25c-1.981-1.982-1.981-5.204 0-7.185l6.716-6.716c1.98-1.98 5.205-1.98 7.185 0l1.251 1.251-0.754 0.754-1.251-1.251c-1.565-1.565-4.112-1.565-5.677 0l-6.716 6.716c-1.564 1.564-1.564 4.111 0 5.677l1.251 1.25c0.758 0.758 1.766 1.176 2.838 1.176s2.080-0.418 2.838-1.176l4.469-4.469 0.754 0.754-4.469 4.469c-0.959 0.96-2.235 1.488-3.592 1.488z" fill="#ffffff"></path>
									</svg>
								</a>
								<a href="#" class="eu-works__link">
									<svg width="16" height="16" viewBox="0 0 32 32">
										<path d="M21.886 5.115c3.521 0 6.376 2.855 6.376 6.376 0 1.809-0.754 3.439-1.964 4.6l-10.297 10.349-10.484-10.536c-1.1-1.146-1.778-2.699-1.778-4.413 0-3.522 2.855-6.376 6.376-6.376 2.652 0 4.925 1.62 5.886 3.924 0.961-2.304 3.234-3.924 5.886-3.924zM21.886 4.049c-2.345 0-4.499 1.089-5.886 2.884-1.386-1.795-3.54-2.884-5.886-2.884-4.104 0-7.442 3.339-7.442 7.442 0 1.928 0.737 3.758 2.075 5.152l11.253 11.309 11.053-11.108c1.46-1.402 2.275-3.308 2.275-5.352 0-4.104-3.339-7.442-7.442-7.442v0z" fill="#ffffff"></path>
									</svg>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif;?>
			<?php wp_reset_postdata() ?>

	<div class="row column">
		<div class="eu-portfolio-callout" style="background: url('<?php the_field('portfolio_callout_background') ?>'); background-size:cover;">
			<div class="row">
				<p><?php the_field('portfolio_callout_text') ?></p>
				<a class="eu-callout__button button hollow" href="<?php the_field('portfolio_callout_link')?>"><?php the_field('portfolio_callout_label') ?></a>
			</div>
		</div>
	</div>
</section>
<!-- End Section Portfolio -->

<!-- Begin Section Team -->
<section id="eu-team" class="eu-section eu-team">
	<div class="row column">
		<div class="row text-center">
			<h2 class="eu-section__title">
				<?php the_field('team_title') ?>
			</h2>
			<p class="eu-section__tagline"><?php the_field('team_tagline') ?></p>
		</div>

		<?php
		$TeamArgs = array(
			'post_type'=>'team_member',
			'posts_per_page'=>3,
			// 'orderby'=>'',
			'order'=>'ASC'
		);
			$Team = new WP_Query($TeamArgs);?>
			<?php if($Team->have_posts()): ?>
				<div class="orbit" role="region" aria-label="Team Slider" data-orbit>
					<ul class="orbit-container small-up-1">
						<?php while($Team->have_posts()): $Team->the_post() ?>
							<li class="orbit-slide eu-team-slide">
								<div class="eu-team-slide__img column medium-5">
									<?php if( get_field('member_photo') ): ?>

										<img src="<?php the_field('member_photo'); ?>" alt="<?php the_title() ?>"/>

									<?php endif; ?>
								</div>
								<div class="eu-team-slide__info column medium-6">
									<div class="eu-team-slide__headline">
										<h3 class="eu-team-slide__name"><?php the_title() ?></h3>
										<p class="eu-team-slide__position"><?php the_field('member_position') ?></p>
									</div>
									<?php the_field('member_text') ?>
									<?php if (have_rows('member_skills')) : ?>
										<div class="eu-team-skills">
											<?php while (have_rows('member_skills')) : the_row(); ?>
												<div class="eu-team-skills__skill">
													<div class="eu-team-skills-line">
														<p><?php the_sub_field('skill') ?></p>
														<p><?php the_sub_field('percent') ?>%</p>
													</div>
													<div class="eu-team-skills__line success progress" role="progressbar" tabindex="0" aria-valuenow="<?php the_sub_field('percent') ?>" aria-valuemin="0" aria-valuemax="100">
														<span class="progress-meter" style="width: <?php the_sub_field('percent') ?>%"></span>
													</div>
												</div>
											<?php endwhile; ?>
										</div>
									<?php endif; ?>

								</div>
							</li>
						<?php endwhile; ?>
					</ul>
					<nav class="orbit-bullets orbit-bullets--team">
						<button class="is-active" data-slide="0"></button>
						<button data-slide="1"></button>
						<button data-slide="2"></button>
					</nav>
				</div>
			<?php endif;?>
			<?php wp_reset_postdata() ?>
	</div>

</section>
<!-- End Section Team -->

<!-- Begin Section Blog -->
<section id="eu-blog" class="eu-section eu-blog" style="background-image: url('<?php the_field('blog_background')?>');">
	<div class="row column">
		<div class="row text-left">
			<div class="eu-blog__headline">
				<h2 class="eu-section__title eu-section__title--blog">
					<?php the_field('blog_title') ?>
				</h2>
				<p class="eu-section__tagline eu-section__tagline--blog"><?php the_field('blog_tagline') ?></p>
			</div>
		</div>
		<div class="row">
		<?php
		$PostArgs = array(
			'post_type'=>'post',
			'posts_per_page'=>3,
			// 'orderby'=>'',
			'order'=>'DESC'
		);
			$Post = new WP_Query($PostArgs);?>
			<?php if($Post->have_posts()): ?>
				<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
					<ul class="orbit-container">
						<?php while($Post->have_posts()): $Post->the_post() ?>
							<li class="orbit-slide eu-blog__slide">
								<article <?php post_class('eu-post') ?>>
									<h3 class="eu-post__title"><?php the_title() ?></h3>
									<p class="eu-post__author-line">By <span class="eu-post__author"><?php the_author() ?></span></p>
									<p class="eu-post__counts">6950 Likes - <?php comments_number() ?> - 703 shares</p>
									<?php the_excerpt() ?>
									<a class= "eu-post__link" href="<?php the_permalink() ?>" target="_blank">+ Read More</a>
								</article>
							</li>
						<?php endwhile; ?>
					</ul>
					<nav class="orbit-bullets orbit-bullets--blog">
						<button class="is-active" data-slide="0"></button>
						<button data-slide="1"></button>
						<button data-slide="2"></button>
					</nav>
				</div>
			<?php endif;?>
			<?php wp_reset_postdata() ?>

		</div>
	</div>
</section>
<!-- End Section Blog -->

<!-- Begin Section Contact -->
<section id="eu-contact" class="eu-contact">
	<div class="row column eu-contact-form">
		<?php the_field('contact_form') ?>
	</div>

	<div class="eu-map">
		<?php

		$location = get_field('map');

		if( !empty($location) ):
			?>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>

	<?php endif; ?>
	<div class="eu-map__cover">
		<p>
			FIND US ON THE MAP
			<a href="#" id="eu-map__scroll" class="eu-scroll">
				<svg width="18" height="18" viewBox="0 0 32 32">
					<path d="M15.233 19.175l0.754 0.754 6.035-6.035-0.754-0.754-5.281 5.281-5.256-5.256-0.754 0.754 3.013 3.013z" fill="#ffffff"></path>
				</svg>
			</a>
		</p>
	</div>
</div>
<!-- End Section Contact -->

<?php get_footer();

