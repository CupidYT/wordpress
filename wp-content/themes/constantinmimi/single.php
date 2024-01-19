<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package constantinmimi
 */

get_header();

    while ( have_posts() ) : the_post(); ?>
        <div class="post-single-content">
            <div class="post-single-header">
                <div class="site-container">
                    <div class="site-row">
                        <div class="site-col-8 site-col-offset-2 text-center">
                            <div class="post-single-image">
                                <figure>
                                    <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                                </figure>
                            </div>
                            <h1><?php echo get_the_title(); ?></h1>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-single-text">
                <div class="site-container">
                    <div class="site-row">
                        <div class="site-col-8 site-col-offset-2">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;

get_footer();
?>
