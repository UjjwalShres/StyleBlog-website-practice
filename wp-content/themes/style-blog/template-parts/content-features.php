<?php ?>

<div class="col-md-9 technology-left">
    <div class="features-main">
        <?php
        $about_select_field_value = get_post_meta($page_id, 'custom_select_field', true);
        $args = array(
            'category_name' => $about_select_field_value,
            'posts_per_page' => 4
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) { ?>

            <div class="fea-top">
                <h3 class="w3">AMAZING <?php echo strtoupper($about_select_field_value); ?></h3>
                <?php the_content(); ?>
            </div>



            <div class="feature-botttom">
                <?php
                while ($query->have_posts()) {
                    $query->the_post();
                ?>
                    <div class="col-md-6 fea-grid">
                        <div class="fea-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" /></div>
                        <div class="fea-text">
                            <h4><?php echo get_the_title(); ?></h4>
                            <?php the_excerpt(); ?>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
        <?php } ?>
    </div>
</div>