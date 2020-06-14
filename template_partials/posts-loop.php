
    <?php

if(have_posts()){
    ?>
    <section class="blog-news">
        <div class="container">
            <div class="news-items">
                <?php
    while(have_posts()){
        the_post();
        ?>
                <article class="news-items-item flex-item">
                    <a href="<?php echo the_permalink() ?>">
                        <?php echo the_post_thumbnail('blog-list'); ?>
                    </a>
                    <div class="news-item-content">
                        <p class="news-item-date"><?php echo get_the_date('m/d/Y'); ?></p>
                        <p class="news-item-text">
                            <?php echo the_title(); ?>
                        </p>
                    </div>
                </article>
                <!--news item end-->
                <?php
    } 
    ?>
            </div>
            <?php 
            the_posts_pagination(array(
                'screen_reader_text' => ' ' 
            ));
            
            ?>
        </div>
    </section>
    <?php
}else {
    ?>
    <section class="blog-news">
        <div class="container">
            <p class="no-posts">There are no posts!</p>
        </div>
    </section>
    <?php
}
?>