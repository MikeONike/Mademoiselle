<?php
                    $arg = array(
                        'posts_per_page' => -1,
                        'post_type' => 'team_members',
                        'order' => 'ASC',
                        'orderby' => 'title'
                    );

                $members = new WP_Query($arg);
                    
                if ($members -> have_posts()) {
                    ?>
                        <div class="personnel-carousel">
                            <?php
                            while ($members -> have_posts()) {
                                $members -> the_post(); ?>
                                <article class="personnel-carousel-item">
                                    <figure class="personnel-carousel-img">
                                        <?php the_post_thumbnail('team-list'); ?>
                                    </figure>
                                    <div class="personnel-carousel-content">
                                    <p>
                                        <span><?php echo the_title(); ?></span>
                                        <span><?php echo substr(get_the_excerpt(), 0, 300).' ...'; ?></span>
                                        <a class="personnel-btn" href="<?php the_field('personnel_button_link'); ?>"><?php the_field('personnel_button_text'); ?></a>
                                    </p>
                                    </div>
                                </article>
                                <!--personnel-carousel-item end-->
                                <?php
                            } ?>
                        </div>
                        <?php
                } else {
                    ?>
                        <div class="personnel-carousel">
                            <article class="personnel-carousel-item">
                                <p class="no-posts">There are no members!</p>
                            </article>
                        </div>
                        <?php
                }