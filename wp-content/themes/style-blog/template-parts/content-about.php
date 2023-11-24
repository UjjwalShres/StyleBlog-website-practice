<?php
?>
<div class="col-md-9 technology-left">
    <div class="w3agile-1">
        <div class="welcome">
            <div class="welcome-top heading">
                <h2 class="w3">WELCOME</h2>
                <div class="welcome-bottom">

                    <?php if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            echo get_the_post_thumbnail();

                            the_content();
                        }
                    } ?>
                </div>
            </div>
        </div>
        <div class="team">
            <h3 class="team-heading">Meet our team</h3>
            <div class="team-grids">
                <?php
                $page_id = 8;
                $member_name_1 = get_post_meta($page_id, '_member_name_1', true);
                $image_id_1 = get_post_meta($page_id, '_image_id_1', true);
                $member_position_1 = get_post_meta($page_id, '_member_position_1', true);
                $member_description_1 = get_post_meta($page_id, '_member_description_1', true);
                $member_name_2 = get_post_meta($page_id, '_member_name_2', true);
                $image_id_2 = get_post_meta($page_id, '_image_id_2', true);
                $member_position_2 = get_post_meta($page_id, '_member_position_2', true);
                $member_description_2 = get_post_meta($page_id, '_member_description_2', true);
                ?>
                <div class="col-md-6 team-grid">
                    <div class="team-grid1">
                        <img src="<?php echo $image_id_1; ?>" alt=" " class="img-responsive">
                        <div class="p-mask">
                            <p><?php echo $member_description_1; ?></p>

                        </div>
                    </div>
                    <h5><?php echo $member_name_1; ?><span><?php echo $member_position_1; ?></span></h5>
                    <ul class="social">
                        <li><a class="social-facebook" href="#">
                                <i></i>
                                <div class="tooltip"><span>Facebook</span></div>
                            </a></li>
                        <li><a class="social-twitter" href="#">
                                <i></i>
                                <div class="tooltip"><span>Twitter</span></div>
                            </a></li>
                        <li><a class="social-google" href="#">
                                <i></i>
                                <div class="tooltip"><span>Google+</span></div>
                            </a></li>
                    </ul>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid1">
                        <img src="<?php echo $image_id_2; ?>" alt=" " class="img-responsive">
                        <div class="p-mask">
                            <p><?php echo $member_description_2; ?></p>

                        </div>
                    </div>
                    <h5><?php echo $member_name_2; ?><span><?php echo $member_position_2; ?></span></h5>
                    <ul class="social">
                        <li><a class="social-facebook" href="#">
                                <i></i>
                                <div class="tooltip"><span>Facebook</span></div>
                            </a></li>
                        <li><a class="social-twitter" href="#">
                                <i></i>
                                <div class="tooltip"><span>Twitter</span></div>
                            </a></li>
                        <li><a class="social-google" href="#">
                                <i></i>
                                <div class="tooltip"><span>Google+</span></div>
                            </a></li>
                    </ul>
                </div>


                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>