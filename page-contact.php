<?php 
    // template name: Contact Page
    get_header('header.php');
?>

<main class="contact">

    <section class="contact-form">
        <div class="container">

            <div class="contact-input">
                <h2 class="underline"><?php the_field('contact_page_title'); ?></h2>
                <form id="contact-form" class="contact-form" action="#" method="POST">
                    <?php the_field('contact_page_form') ?> 
                </form>
            </div>
            <!--contact-form end-->

            <div class="map-wrapper">
                <div class="map">
                    <?php the_field('google_map'); ?>
                    <!--map end-->
                </div>
            </div>
        </div>

    </section>
    <!--contact end-->

    <?php 
    get_template_part('template_partials/contact-data'); 
    ?>

</main>

<?php 
    get_footer('footer.php');
?>