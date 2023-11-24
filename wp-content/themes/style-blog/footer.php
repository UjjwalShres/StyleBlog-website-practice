<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Style_Blog
 */

?>

<div class="footer">
	<div class="container">
		<div class="col-md-4 footer-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
			<?php dynamic_sidebar('footer-1'); ?>
		</div>
		<div class="col-md-4 footer-middle wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
			<?php dynamic_sidebar('footer-2'); ?>

		</div>
		<div class="col-md-4 footer-right wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
			<?php dynamic_sidebar('footer-3'); ?>

			<div class="clearfix"> </div>

		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="copyright wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
	<div class="container">
		<p>© <?php echo get_theme_mod('footer_settings'); ?> | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</div>
<?php wp_footer(); ?>
</body>

</html>