<!DOCTYPE html>
<html <?php bloginfo('language') ?>>


<head>

    <!-- GITHUB URL: https://github.com/MikeONike/Mademoiselle.git -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php 
            bloginfo('name');
            wp_title(' | ', true, 'left');
            ?>
    </title>

    <!--iOS compatibility-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Website title">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/frontend/apple-icon-180x180.png">

    <!--Android compatibility-->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Website title">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/frontend/android-icon-192x192.png">


    <?php
        //Include default WordPress style
        wp_head();

        //field input values
        if(is_home() && get_option('page_for_posts')) {
            $featuredImage = get_the_post_thumbnail_url(get_option('page_for_posts'));
            $title = get_the_title(get_option('page_for_posts'));
        } else {
            $featuredImage = get_the_post_thumbnail_url();
            $title = get_the_title();
        }
       
    ?>

</head>

<body <?php body_class(); ?>>

    <header class="header">
        <div class="head-container">

            <div class="container">

                <nav  class="head-nav ">
                
                <?php
                    if(has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo home_url(); ?>" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/frontend/img/logo/logo.png" alt="logo">
                        </a><!--logo end-->
                        <?php
                    }
                
                ?>


                    <button class="ham-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </button><!-- ham-menu end -->

                    <?php
                        $menuLocations = get_nav_menu_locations();
                        $mainMenuId = $menuLocations['main-menu'];
                        $mainMenuItems = wp_get_nav_menu_items($mainMenuId);

                        // echo '<pre>';
                        // var_dump($mainMenuItems) ;
                        // echo '</pre>';

                        ?>
                        <ul class="head-nav-links">
                        <?php

                        foreach ($mainMenuItems as $mainMenuItem) {
                            $active = '';
                            if ($mainMenuItem -> url == get_permalink()) {
                                $active = 'active';
                            }

                            if ($mainMenuItem -> menu_item_parent == 0) {
                                ?>
                                <li><a class="<?php echo $active ?>" href="<?php echo $mainMenuItem -> url ?>"><?php echo $mainMenuItem -> title ?></a></li>
                                <?php
                            }
                        }
                        ?>

                        </ul>
                        <?php
                    ?>

                </nav>
                <!--head-nav end -->
            </div>
        </div>

        <?php 
        $bodyClasses = get_body_class();
            if(!(in_array('category', $bodyClasses) || in_array('single-post', $bodyClasses) || in_array('tag', $bodyClasses) || in_array('single-team_members', $bodyClasses) || in_array('single-services', $bodyClasses) || in_array('page-template-page-contact', $bodyClasses) || in_array('error404', $bodyClasses) || in_array('search', $bodyClasses) )) {
                ?>
                <section style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(<?php echo $featuredImage ?>);" class="head">
                    <h1>
                        <?php echo $title; ?>
                    </h1>
                </section>
                <!--head-main end-->
                <?php
            }   
            if (in_array('category', $bodyClasses)) {
                ?>

                <?php 
                    $term = get_queried_object();
                    $categoryImage = get_field('taxonomy_image', $term);
                ?>
                <section style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(<?php echo $categoryImage  ?>);" class="head">
                    <h1>
                        Search result for:
                        <span>
                            <?php echo single_cat_title();?>
                        </span>
                        
                        
                    </h1>
                    <?php echo the_archive_description(); ?>
                </section>
                <!--head-main end-->
                <?php
            }

            if (in_array('tag', $bodyClasses)) {
                ?>

                <?php 
                    $term = get_queried_object();
                    $categoryImage = get_field('taxonomy_image', $term);
                ?>
                <section style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(<?php echo $categoryImage  ?>);" class="head">
                    <h1>
                        Search result for:
                        <span>
                            <?php echo single_tag_title();?>
                        </span>
                        
                        
                    </h1>
                    <?php echo the_archive_description(); ?>
                </section>
                <!--head-main end-->
                <?php
            }

            if (in_array('search', $bodyClasses)) {
                ?>
                <section style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(<?php bloginfo('url'); echo '/wp-content/uploads/2020/05/search.jpg' ?>);" class="head">
                    <h1>
                        Search result for:
                        <span>
                            <?php echo get_search_query(); ?>
                        </span>
                    </h1>
                </section>
                <!--head-main end-->
                <?php
            }
        ?>

    </header>
    <!--header end-->