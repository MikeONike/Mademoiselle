<?php
//template name: Services Page
get_header('header.php');
?>

<main>
    <section class="services">
        <div class="container">

<?php 
            if(have_posts()) {
                    
                    
                while(have_posts()) {
                    the_post();
                    ?>
                    <h2><?php the_field('services_title'); ?></h2>
                    <?php

                }
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
                    <div class="service-items">
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
                ?>
                    </div>
        <!--service-items end-->
                <?php
            } else {
                ?>
                <div class="service-items">
                    <p class="no-posts">There are no services!</p>
                </div>
                <?php
            }
            
            wp_reset_postdata();
            ?>
            
        </div>
    </section>
</main>

<?php
get_footer('footer.php');
?>


               