<div class="news-items">
<?php

    $arg = array(
        'numberposts' => 3,
        'post-type' => 'posts',
        'order' => 'DESC',
        'orderby' => 'date'
    );

    $latestPosts = new WP_Query($arg);

    if($latestPosts -> have_posts()) {
        while($latestPosts -> have_posts()) {
            $latestPosts -> the_post();
            ?>
            <article class="news-items-item flex-item">
                <a href="<?php echo the_permalink(); ?>">
                <?php
                    if (has_post_thumbnail(get_the_ID())) {
                        echo get_the_post_thumbnail(get_the_ID());
                    } 
                ?>
                </a>
                <div class="news-item-content">
                    <p class="news-item-date"><?php echo the_date('m/d/Y');?></p>
                    <p class="news-item-text">
                        <?php echo the_title();?>
                    </p>
                </div>
            </article>
            <!--news item end-->
            <?php
        }
    } else {
        ?>
        <p class="no-posts">There are no posts!</p>
        <?php
    }


    wp_reset_postdata();

?>
</div>