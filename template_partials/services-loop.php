<?php 
            if(have_posts()) {
                while(have_posts()) {
                    the_post();

                    ?>
                    <div class="service-items">
                    <?php 

                }
                ?>
        <?php

            }

            $arg = array(
                'posts_per_page' => -1,
                'post_type' => 'services', 
                'order' => 'ASC',
                'orderby' => 'date'
            );

            $services = new WP_Query($arg);

            if($services -> have_posts()) {
                ?>
                <?php
                while($services -> have_posts()) {
                    $services -> the_post();
                    ?>
                    <article class="service-items-item">
                        <figure class="service-item-img">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'service-list');?>
                        </figure>
                        <div class="service-item-content">
                            <p><?php echo the_title(); ?></p>
                            <a class="btn-black" href="<?php the_field('services_button_link'); ?>"><?php the_field('services_button_text'); ?></a>
                        </div>
                    </article>
                    <!--service-items-item end-->
                    <?php
                }
            } else {
                ?>
                <p class="no-posts">There are no services!</p>
                <?php
            }
            
            wp_reset_postdata();
            ?>

            </div>
        <!--service-items end-->