<?php 
    get_header('header.php');
?>

<main>


    <section class="error-404">
        <img src=<?php echo get_template_directory_uri().'/frontend/img/404/404.png'?> alt="404 image">
        <a class="btn-pink" href="<?php echo get_home_url(); ?>">Back to home</a>
    </section>
    <!--head-main end-->


</main>

<?php 
    get_footer('footer.php');
?>