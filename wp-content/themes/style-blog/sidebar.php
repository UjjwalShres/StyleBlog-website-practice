<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Style_Blog
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<div class="tech-btm">
	<div class="search-1 wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
		<div class="search-1">
			<form role="search" id="searchform" action="<?php home_url('/') ?>" method="get">
				<input type="search" name="s" id="s" placeholder="Search" value="<?php get_search_query() ?>">
				<input type="submit" id="searchform" value="<?php esc_attr__('Search') ?> ">
			</form>
		</div>
	</div>
	<?php //small posts query
	$sidebar_post_settings_value = get_theme_mod('sidebar_post_settings');
	$popular_post_args = array(
		'category_name' => $sidebar_post_settings_value,
		'posts_per_page' => 5,
		'order' => 'DESC'
	);
	$popular_post_query = new WP_Query($popular_post_args);
	if ($popular_post_query->have_posts()) :
	?>
		<h4><?php echo ($sidebar_post_settings_value == 'popular-posts' ? 'Popular Posts' : 'Gallary Posts') ?></h4>
		<?php
		while ($popular_post_query->have_posts()) :
			$popular_post_query->the_post();
		?>
			<div class="blog-grids wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
				<div class="blog-grid-left">
					<a href="singlepage.html"><img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt=""></a>
				</div>
				<div class="blog-grid-right">

					<h5><a href="singlepage.html"><?php the_title(); ?></a> </h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<div class="insta wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
		<?php //gallary posts query
		$gallary_post_args = array(
			'category_name' => 'Gallary Posts',
			'posts_per_page' => 9,
			'order' => 'DESC'
		);
		$gallary_post_query = new WP_Query($gallary_post_args);
		if ($gallary_post_query->have_posts()) :
		?>
			<h4>Instagram</h4>
			<ul>
				<?php
				while ($gallary_post_query->have_posts()) :
					$gallary_post_query->the_post();
				?>

					<li><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt=""></a></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>

	<p>Get to us via Instagram!</p>
	<div class="twt">

		<iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-hashtag-button twitter-hashtag-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.b7de008f493a5185d8df1aedd62d77c6.en.html#button_hashtag=TwitterStories&amp;dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=https%3A%2F%2Fp.w3layouts.com%2Fdemos%2Fduplex%2Fweb%2F&amp;size=l&amp;time=1467721486626&amp;type=hashtag" style="position: static; visibility: visible; width: 166px; height: 28px;" data-hashtag="TwitterStories"></iframe>
		<script>
			! function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0],
					p = /^http:/.test(d.location) ? 'http' : 'https';
				if (!d.getElementById(id)) {
					js = d.createElement(s);
					js.id = id;
					js.src = p + '://platform.twitter.com/widgets.js';
					fjs.parentNode.insertBefore(js, fjs);
				}
			}(document, 'script', 'twitter-wjs');
		</script>
	</div>
</div>