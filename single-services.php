<?php 
    get_header('header.php');

?>

<main>

    <?php
    if (have_posts()) {
        ?>
        <section class="service-article-main">
            <div class="container">
        <?php
        while (have_posts()) {
            the_post();
            ?>
            <figure class="service-article-img">
               <?php echo get_the_post_thumbnail(get_the_ID(), 'full') ?>
            </figure>
            <!--service-article-img end-->
            <div class="service-article-content">
                <h3><?php echo the_title(); ?></h3>
                <?php echo the_content(); ?>
            </div>
            <!--service-article-content end-->
            <?php
        } ?>
            </div>
        </section>
        <!--service-article-main end-->
        <section class="news">
            <div class="container">
                <h2><?php the_field('latest_posts_title' , get_option('page_on_front')); ?></h2>
                <?php
                get_template_part('template_partials/loop-latest-posts');
                ?>
            </div>
        </section>
    <?php
    }
    ?>

    

            
      
</main>

<?php 
    get_footer('footer.php');
?>