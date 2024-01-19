<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constantinmimi
 */

get_header();

$constantinmimi_alternate_background=get_field('page_header_image',  get_option( 'page_for_posts' ));

$constantinmimi_page_description=get_field('page_description',  get_option( 'page_for_posts' ));
?>

<div class="page-header-default">
    <div class="site-container">
        <?php
        if ( function_exists('constantinmimi_breadcrumbs') ) {
            constantinmimi_breadcrumbs();
        }
        ?>
        <?php
        if ( is_category() ) {
            $current_category = single_cat_title( '', false );
            echo '<h1>' . $current_category . '</h1>';
        } else {
            echo '<h1>' . get_the_title( get_option( 'page_for_posts' ) ) . '</h1>';
        }
        ?>
    </div>
</div>

<div class="posts-page">
    <div class="site-container">
        <div class="site-row">
            <div class="site-col-12">
                <div class="posts-page-navigation">
                    <ul>                       
                        <?php
                        $current_category = get_query_var('cat');
                        $categories = get_categories(array(
                            'hierarchical' => 1,
                            'depth' => 1,
                            'number' => 10,
                        ));
                        foreach ($categories as $category) {
                            $active_class = ($current_category == $category->term_id) ? 'current-cat' : '';
                            echo '<li class="cat-item ' . esc_attr($active_class) . '"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            if ( have_posts() ) :
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                    /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content', 'default' );

                endwhile;

                constantinmimi_pagination();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>
        </div>
    </div>
</div>
<?php
get_footer();