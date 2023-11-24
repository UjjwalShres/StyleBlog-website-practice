<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Style_Blog
 */

?>

<!-- technology-left -->
<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">

				<div class="single">
					<img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt="">
					<div class="b-bottom">
						<h5 class="top"><?php the_title(); ?></h5>
						<p class="sub"><?php the_content(); ?></p>
						<p>On <?php the_date(); ?> <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>

					</div>
				</div>






			</div>
		</div>
	</div>
</div>