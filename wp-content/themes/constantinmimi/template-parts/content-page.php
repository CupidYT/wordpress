<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constantinmimi
 */

?>

    <?php
    if ( !is_page_template('template-image-page.php') ) {
        the_title( '<h1>', '</h1>' );
    }

    constantinmimi_post_thumbnail(); ?>


		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'constantinmimi' ),
				'after'  => '</div>',
			) );
		?>
	
