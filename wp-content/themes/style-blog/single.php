<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		<div class="col-md-9 technology-left">
			<div class="agileinfo">
				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', get_post_type());

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'style-blog') . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'style-blog') . '</span> <span class="nav-title">%title</span>',
						)
					);

				endwhile; // End of the loop.
				?>
				<div class="coment-form">
					<h4>Leave your comment</h4>
					<form action="#" method="post">
						<input type="text" value="Name " name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="email" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="text" value="Website" name="websie" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}" required="">
						<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">Your Comment...</textarea>
						<input type="submit" value="Submit Comment">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- technology-right -->
		<div class="col-md-3 technology-right">


			<div class="blo-top1">

				<?php get_sidebar(); ?>



			</div>


		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->


	</div>
</div>


<?php
get_sidebar();
get_footer();
