

<?php 
    get_header('header.php');
?>

<main>

    <?php
    // Template Name: About Page
    //WP input fields

if(have_posts()){
    
    while(have_posts()){
        the_post();
        ?>
    <section class="about">
        <div class="container">

            <article class="about-main">
                <?php echo the_content(); ?>
            </article>

            <article class="about-news">
                <?php get_sidebar('sidebar.php') ?>
                
                <!--news items end-->
            </article>

        </div>
    </section>
    <?php
    } //while end
}// if end

?>
</main>


<?php
    get_footer('footer.php');
?>