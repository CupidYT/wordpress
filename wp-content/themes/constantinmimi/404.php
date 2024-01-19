<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package constantinmimi
 */

get_header(); ?>

<div class="no-result-page">
    <div class="site-container">
        <div class="site-row">
            <div class="site-col-8 site-col-offset-2">          
                <h1><?php esc_html_e( 'Pagina nu poate fi găsită.', 'constantinmimi' ); ?></h1>
                <p><?php esc_html_e( 'Se pare că nu s-a găsit nimic în această pagină, încercați să navigați din nou, accesând pagina principală!', 'constantinmimi' ); ?></p>
                <div class="site-button">
                    <a href="/" class="btn"><span>Pagina principală</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("constantinmimi_page_bottom") ) : ?>
<?php endif; ?>

<?php
get_footer();
