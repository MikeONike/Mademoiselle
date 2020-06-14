<?php 
    get_header();
?>

<main class="blog-article">

    <?php

if(have_posts()){
    
    while(have_posts()){
        the_post();

        $featureImage = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
    <section class="blog-article-head">
        <div class="container">

            <div class="blog-article-content">
                <p class="blog-article-date"> 
                    <?php 
                        $blogCategories = get_the_category(get_the_ID());
                
                        foreach($blogCategories as $blogCategorie) {
                            
                            ?>
                            <a class="blog-category" href="<?php echo get_category_link($blogCategorie -> term_id); ?>"><?php echo $blogCategorie -> name ?></a>
                            <?php
                            if(sizeof($blogCategories) >= 2 ) {
                                ?>
                                ,
                                <?php
                            }
                        }
                    ?>
                    | <span><?php echo the_date('m/d/Y'); ?></span>
                </p>
                <h3 class="blog-article-title">
                    <?php echo the_title(); ?>
                </h3>
                <p class="blog-article-text">
                    <?php echo get_the_excerpt(); ?>
                </p>
            </div>

            <figure>
                <img src="<?php echo $featureImage; ?>" alt="">
            </figure>

        </div>
    </section>
    <!--blog-article end-->

    <section class="blog-article-main">
        <div class="wrapper">
            
            <?php echo the_content(); ?>

            <div class="tags">
                <p>Tags:</p>
                <div>
                    <?php
                        $blogTags = get_the_tags(get_the_ID());

                        foreach ($blogTags as $blogTag) {
                            ?>
                            <a href="<?php echo get_tag_link($blogTag -> term_id) ?>"><?php echo $blogTag -> name ?></a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!--blog-article-main end-->

    <?php
        
        
    } //while end
    ?>
    <section class="blog-next-prev-links">
        <div class="container">
            <div class="blog-link">
                <i class="fas fa-chevron-left"></i>
                <?php
                previous_post_link($format = '%link');
                ?>
            </div>
            <div class="blog-link">
                <?php
                next_post_link($format = '%link');
                ?>
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </section>
    <?php
}// if end

?>
</main>


<?php
    get_footer();
?>