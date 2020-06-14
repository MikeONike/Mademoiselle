<footer class="footer">
    <div class="container">

        <?php
            $menuLocations = get_nav_menu_locations();
            $mainMenuId = $menuLocations['social'];
            $mainMenuItems = wp_get_nav_menu_items($mainMenuId);    

        ?>
        
        <ul class="social-nav">
            <?php

                foreach ($mainMenuItems as $mainMenuItem) {
                        if ($mainMenuItem -> menu_item_parent == 0) {
            ?>
                    <li><a class="fab fa-<?php 
                        echo strtolower($mainMenuItem -> title);
                        if ($mainMenuItem -> title == 'Facebook') {
                            echo '-f';
                        }
                    ?>" target="_blank" href="<?php echo $mainMenuItem -> url ?>"></a></li>
            <?php
                        }
                    }
            ?>

        </ul>

        <p class="copy">Copyright &copy; <?php echo date('Y'); ?><a href="<?php echo home_url(); ?>"> <?php echo bloginfo('title'); ?></a></p>

    </div>
</footer>
<!--footer end-->
<?php

wp_footer();

?>


</body>

</html>