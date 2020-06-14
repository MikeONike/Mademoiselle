<?php 
    get_header('header.php');
?>

<main>

    <section class="news">
        <div class="container">
        <h2 class="news-title underline"><?php the_field('latest_posts_title'); ?></h2>

        <?php get_template_part('template_partials/loop-latest-posts'); ?>
  
           
        </div>
    </section>

    <section class="services">
            <div class="container">

                <h2 class="services-title underline"><?php the_field('homepage_services_title') ?></h2>

                <?php get_template_part('template_partials/services-loop') ?>

            </div>
    </section>        

    <section class="personnel">
        <div class="container">
         <h2 class="personnel-title underline"><?php the_field('personnel_title'); ?></h2>

         <?php get_template_part('template_partials/personnel-loop'); ?>

         </div>
    </section>
        

</main>


<?php
    get_footer('footer.php');
?>