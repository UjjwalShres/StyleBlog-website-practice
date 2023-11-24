<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
<?php
$banner_visibility_settings_value = get_theme_mod('banner_visibility_settings');
if (strpos($categories, 'Banner') !== false && $banner_visibility_settings_value == 'option1') : //check the category name by the position in the array
    $args = array(
        'category_name' => 'Banner',
        'posts_per_page' => 1
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
?>
            <div class="banner" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                <div class="container">
                    <h2><?php echo get_the_title(); ?></h2>
                    <p><?php echo the_excerpt(); ?></p>
                    <a href="<?php echo the_permalink(); ?>">READ MORE</a>
                </div>
            </div>
<?php
        }
    }
endif; ?>

<div class="services w3l wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
    <div class="container">
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <?php
                    if (strpos($categories, 'Fashion') !== false) : ?>
                        <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">FASHION</a></li>
                    <?php endif; ?>
                    <?php if (strpos($categories, 'Travel') !== false) : ?>
                        <li role="presentation" class=""><a href="#safari" role="tab" id="safari-tab" data-toggle="tab" aria-controls="safari">TRAVEL</a></li>
                    <?php endif; ?>
                    <?php if (strpos($categories, 'Music') !== false) : ?>
                        <li role="presentation" class=""><a href="#trekking" role="tab" id="trekking-tab" data-toggle="tab" aria-controls="trekking">MUSIC</a></li>
                    <?php endif;
                    ?>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <?php //posts gallary for fashion
                    $fashion_gallary_args = array(
                        'category_name' => 'Fashion',
                        'posts_per_page' => 3,
                        'order' => 'DESC'
                    );
                    $fashion_gallary_query = new WP_Query($fashion_gallary_args);
                    if ($fashion_gallary_query->have_posts()) :
                    ?>
                        <div role="tabpanel" class="tab-pane fade active in" id="expeditions" aria-labelledby="expeditions-tab">
                            <?php
                            while ($fashion_gallary_query->have_posts()) :
                                $fashion_gallary_query->the_post();
                            ?><a href="<?php the_permalink(); ?>">
                                    <div class="col-md-4 col-sm-5 tab-image">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="Wanderer">
                                    </div>
                                </a>
                            <?php endwhile; ?>
                            <div class="clearfix"></div>
                        </div>

                    <?php endif; ?>




                    <?php //posts gallary for travel
                    $travel_gallary_args = array(
                        'category_name' => 'Travel',
                        'posts_per_page' => 3,
                        'order' => 'ASC'
                    );
                    $travel_gallary_query = new WP_Query($travel_gallary_args);
                    if ($travel_gallary_query->have_posts()) :
                    ?>
                        <div role="tabpanel" class="tab-pane fade" id="safari" aria-labelledby="safari-tab">
                            <?php
                            while ($travel_gallary_query->have_posts()) :
                                $travel_gallary_query->the_post();
                            ?><a href="<?php the_permalink(); ?>">
                                    <div class="col-md-4 col-sm-5 tab-image">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="Wanderer">
                                    </div>
                                </a>
                            <?php endwhile; ?>
                            <div class="clearfix"></div>
                        </div>

                    <?php endif; ?>


                    <?php //posts gallary for music
                    $music_gallary_args = array(
                        'category_name' => 'Music',
                        'posts_per_page' => 3,
                        'order' => 'ASC'
                    );
                    $music_gallary_query = new WP_Query($music_gallary_args);
                    if ($music_gallary_query->have_posts()) :
                    ?>
                        <div role="tabpanel" class="tab-pane fade" id="trekking" aria-labelledby="trekking-tab">
                            <?php
                            while ($music_gallary_query->have_posts()) :
                                $music_gallary_query->the_post();
                            ?><a href="<?php the_permalink(); ?>">
                                    <div class="col-md-4 col-sm-5 tab-image">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="Wanderer">
                                    </div>
                                </a>
                            <?php endwhile; ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="tech-no">
                <!-- technology-top -->
                <?php //posts gallary for music
                $big_post_category_settings_value = get_theme_mod('big_post_category_settings');
                $big_post_number_settings_value = get_theme_mod('big_post_number_settings');
                $big_post_thumbnail_settings_value = get_theme_mod('big_post_thumbnail_settings');
                if ($big_post_number_settings_value != 0) {
                    $big_post_args = array(
                        'category_name' => $big_post_category_settings_value,
                        'posts_per_page' => $big_post_number_settings_value,
                        'order' => 'DESC'
                    );


                    $big_post_query = new WP_Query($big_post_args);
                    if ($big_post_query->have_posts()) :
                ?>
                        <div class="tc-ch wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                            <?php
                            while ($big_post_query->have_posts()) :
                                $big_post_query->the_post();
                            ?>
                                <div class="tch-img">
                                    <a href="<?php the_permalink(); ?>"><img src="
                                    <?php echo ($big_post_thumbnail_settings_value == 'option1' ?
                                        get_the_post_thumbnail_url() : '') ?>" class="img-responsive" alt=""></a>
                                </div>

                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <h6>BY
                                    <a href="#"><?php the_author_meta("display_name"); ?></a>

                                    <?php echo get_the_date(); ?>
                                </h6>
                                <p><?php the_excerpt(); ?></p>
                                <div class=" bht1">
                                    <a href="<?php the_permalink() ?>">Continue Reading</a>
                                </div>
                                <div class="soci">
                                    <ul>
                                        <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
                                        <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                                        <li class="hvr-rectangle-out"><a class="goog" href="#"></a></li>
                                        <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                                        <li class="hvr-rectangle-out"><a class="drib" href="#"></a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            <?php endwhile; ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php endif; ?>
                <?php
                } else {
                    $big_post_args = array(
                        'post_status' => 'published'
                    );
                } ?>
                <div class="clearfix"></div>
                <!-- technology-top -->
                <!-- technology-top -->
                <div class="w3ls">
                    <?php //posts gallary for music
                    $medium_post_args = array(
                        'category_name' => 'Medium post',
                        'posts_per_page' => 2,
                        'order' => 'DESC'
                    );
                    $medium_post_query = new WP_Query($medium_post_args);
                    if ($medium_post_query->have_posts()) :
                        while ($medium_post_query->have_posts()) :
                            $medium_post_query->the_post();
                    ?>
                            <div class="col-md-6 w3ls-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                                <?php

                                ?>
                                <div class="tc-ch">
                                    <div class="tch-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt=""></a>
                                    </div>

                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <h6>BY
                                        <a href="#"><?php the_author_meta("display_name"); ?></a>

                                        <?php echo get_the_date(); ?>
                                    </h6>
                                    <p><?php the_excerpt(); ?>
                                    </p>
                                    <div class="bht1">
                                        <a href="<?php the_permalink(); ?>">Read More</a>
                                    </div>
                                    <div class="soci">
                                        <ul>
                                            <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
                                            <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </div>
                <!-- technology-top -->
                <?php //small posts query
                $small_post_args = array(
                    'category_name' => 'Small post',
                    'posts_per_page' => 3,
                    'order' => 'DESC'
                );
                $small_post_query = new WP_Query($small_post_args);
                if ($small_post_query->have_posts()) :
                ?>
                    <div class="wthree">
                        <?php
                        while ($small_post_query->have_posts()) :
                            $small_post_query->the_post();
                        ?>

                            <div class="col-md-6 wthree-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                                <div class="tch-img">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-6 wthree-right wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <h6>BY <a href="#"><?php the_author_meta("display_name"); ?> </a><?php echo get_the_date(); ?></h6>
                                <p><?php the_excerpt(); ?></p>
                                <div class="bht1">
                                    <a href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                                <div class="soci">
                                    <ul>

                                        <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                                        <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <div class="clearfix" style="width: 100px; height: 50px;"></div>

                            </div>
                        <?php endwhile; ?>
                        <div class="clearfix"></div>
                    </div>

                <?php endif; ?>

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
get_footer();
