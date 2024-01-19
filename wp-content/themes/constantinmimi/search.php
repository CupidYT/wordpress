<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package constantinmimi
 */
get_header();

$constantinmimi_page_header_image=get_field('page_header_image', 24);
?>


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
                    <h1><?php printf( esc_html__( 'Rezultatul căutării pentru: %s', 'constantinmimi' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>


<main class="search-content">
    <div class="site-container">
        <div class="search-items-list">
            <?php
            if ( have_posts() ) : ?>

                <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'search' );
                endwhile;

                constantinmimi_pagination();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;           
            ?>
        </div>
    </div>
</main>
<?php
get_footer();
