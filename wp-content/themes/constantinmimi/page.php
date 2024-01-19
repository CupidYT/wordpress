<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constantinmimi
 */
get_header();

while ( have_posts() ) : the_post(); ?>

    <div class="page-header-default">
        <div class="site-container">
            <?php
            if ( function_exists('constantinmimi_breadcrumbs') ) {
                constantinmimi_breadcrumbs();
            }
            ?>
            <?php the_title( '<h1>', '</h1>' ); ?>
            <?php if ( is_page(48) ){ ?>
                <p>Loft space for rent for events</p>
            <?php } ?>
        </div>
    </div>

    <main class="main-content">
        <div class="site-container">
            <div class="page-content">
                <?php the_content(); ?>             
            </div>
        </div>
    </main>

<?php endwhile;

get_footer();
