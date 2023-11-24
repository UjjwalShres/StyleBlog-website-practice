<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Style_Blog
 */

get_header();
?>
<?php
ob_start(); //create a buffer
wp_list_categories(); //list all the categories name in the buffer
$categories = ob_get_clean(); //store the output from the buffer to the variable
?>
<?php if (strpos($categories, 'Banner') !== false) : //check the category name by the position in the array
	$args = array(
		'category_name' => 'Banner',
		'posts_per_page' => 1
	);
	$query = new WP_Query($args);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
?>
			<div class="banner-1" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>');">

			</div>
<?php
		}
	}
endif; ?>


<div class="technology">
	<div class="container">
		<?php
		if (is_page('About')) { ?>
			<div class="technology">
				<div class="container">
					<?php get_template_part('template-parts/content', 'about'); ?>
					<div class="col-md-3 technology-right">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		<?php
		} elseif (is_page('Features')) { ?>
			<div class="technology">
				<div class="container">
					<?php get_template_part('template-parts/content', 'features'); ?>
					<div class="col-md-3 technology-right">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
			<?php
		} else {


			while (have_posts()) :
				the_post();
			?>
				<div class="col-md-9 technology-left">

			<?php

				get_template_part('template-parts/content', 'page');

			endwhile; // End of the loop.
		} ?>
				</div>


				<div class="col-md-3 technology-right">
					<?php get_sidebar(); ?>
				</div>
	</div>
</div>
</div>

<?php

get_footer();
