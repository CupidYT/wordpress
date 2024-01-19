<?php

/* Template Name: Page with background image */
$constantinmimi_page_main_heading=get_field('page_main_heading');
$constantinmimi_page_header_image=get_field('page_header_image');
$constantinmimi_page_description=get_field('page_description');

get_header(); ?>

<?php while ( have_posts() ) :
	the_post(); ?>
<div class="site-header">
    <div class="site-header-image">
        <figure>
            <img src="<?php echo esc_url($constantinmimi_page_header_image); ?>" class="img-fluid" alt="<?php echo get_the_title(); ?>">
        </figure>
    </div>
    <div class="site-header-caption">
        <div class="site-container">
            <div class="site-header-inner">
                <div class="site-header-content">      
                    <?php
                    if ( function_exists('constantinmimi_breadcrumbs') ) {
                        constantinmimi_breadcrumbs();
                    }
                    ?>              
                    <h1><?php echo nl2br($constantinmimi_page_main_heading); ?></h1>       
                    <p><?php echo nl2br($constantinmimi_page_description); ?></p>                    				
                </div>
            </div>
        </div>
    </div>
</div>

<main class="main-content">
    <div class="site-container">
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </div>
</main>


<?php endwhile; // End of the loop. ?>
<?php get_footer(); ?>
