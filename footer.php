<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<footer id="eu-footer" class="eu-section eu-footer">
	<div class="row column text-center">
		<h2 class="eu-company">
			<?php the_field('company', 'options') ?>
		</h2>
		<p><?php the_field('copyright', 'options') ?></p>

		<?php if (have_rows('social_links', 'options')) : ?>
			<!-- Begin Social Icons -->
			<ul class="eu-social">
				<?php while (have_rows('social_links', 'options')) : the_row(); ?>
					<li class="eu-social__item">
						<a href="<?php the_sub_field('link') ?>" class="eu-social__link" target="_blank"></a>
					</li>
				<?php endwhile; ?>
			</ul>
			<!-- End Social Icons-->
		<?php endif; ?>

	</div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
