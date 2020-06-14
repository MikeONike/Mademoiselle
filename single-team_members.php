<?php 
    get_header('header.php');
?>

<main>
	<section class="single-member">
		<div class="container">
    <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
                ?>
                    <figure class="single-member-img">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'single-team-list'); ?>
                    </figure>
                    <div class="single-member-content">
                        <h3><?php echo the_title();?></h3>
                        <p><?php echo the_content();?></p>
                    </div>
						  <?php
            }
			}
			?>
	</div>
 </section>
</main>

<?php 
    get_footer('footer.php');
?>