<?php
/**
 * constantinmimi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package constantinmimi
 */

if ( ! function_exists( 'constantinmimi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function constantinmimi_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'constantinmimi-primary-nav' => esc_html__( 'Primary Navigation', 'constantinmimi' ),
            'constantinmimi-side-nav' => esc_html__( 'Side Navigation', 'constantinmimi' ),
            'constantinmimi-privacy-nav' => esc_html__( 'Footer privacy Navigation', 'constantinmimi' ),
		) );

        /**
         * Revert back to old widget instead of Gutenberg widgets
         *
         */
        remove_theme_support( 'widgets-block-editor' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

        /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

        /**
         * WP optimize
         */
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        /* Remove Emoticons */
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        add_filter('the_generator', '__return_empty_string');

	}
endif;
add_action( 'after_setup_theme', 'constantinmimi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function constantinmimi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'constantinmimi_content_width', 1440 );
}
add_action( 'after_setup_theme', 'constantinmimi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function constantinmimi_widgets_init() {	
    // Footer widgets
    register_sidebar(array(
        'name'          => esc_html__('Footer 1-st Widget Area', 'constantinmimi' ),
        'id'            => 'constantinmimi-footer-1st-col',
        'description'   => esc_html__('Add widgets for 1-st widget area', 'constantinmimi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer 2-nd Widget Area', 'constantinmimi' ),
        'id'            => 'constantinmimi-footer-2nd-col',
        'description'   => esc_html__('Add widgets for 2-nd widget area', 'constantinmimi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer 3-rd Widget Area', 'constantinmimi' ),
        'id'            => 'constantinmimi-footer-3rd-col',
        'description'   => esc_html__('Add widgets for 3-rd widget area', 'constantinmimi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer 4-th Widget Area', 'constantinmimi' ),
        'id'            => 'constantinmimi-footer-4th-col',
        'description'   => esc_html__('Add widgets for 4-th widget area', 'constantinmimi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

}
add_action( 'widgets_init', 'constantinmimi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function constantinmimi_scripts() {

    $ws_uniq_id = '1.0.0';    

	// Slick
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/js/plugins/slick/slick.css');
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/plugins/slick/slick.min.js', array('jquery'),'', true);    

    // Magnific
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/js/plugins/magnific/magnific-popup.min.css');
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/plugins/magnific/magnific-popup.min.js', array('jquery'),'', true);            

    // Main JS
    wp_enqueue_script('constantinmimi-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $ws_uniq_id, true);

    // Main CSS
	wp_enqueue_style( 'constantinmimi-style', get_stylesheet_uri(), '', $ws_uniq_id );
}
add_action( 'wp_enqueue_scripts', 'constantinmimi_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Theme custom metaboxes
 */
require_once(get_template_directory() . '/inc/metaboxes.php' );

/**
 * Extend VC
 */
 if(class_exists('Vc_Manager')) {
    function constantinmimi_extend_composer() {
		require_once( get_template_directory() . '/inc/vc-extend.php' );
    }
    add_action('init', 'constantinmimi_extend_composer', 20);
}

/**
 * Pagination
 */
function constantinmimi_pagination() {

    $args = array(
        'prev_text'          => esc_attr__('<', "constantinmimi"),
        'next_text'          => esc_attr__('>', "constantinmimi"),
        'before_page_number' => '',
        'after_page_number'  => ''
    ); ?>
	
    <div class="page-pagination">        
        <?php echo paginate_links( $args ); ?>        
    </div>	

    <?php
}

/**
 * Add SVG support
 */
function constantinmimi_svg_suppport($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'constantinmimi_svg_suppport', 1, 1);

/**
 * General settings
 */
// Disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);
// Disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
//Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_discovery_links');
//Remove oEmbed JavaScript from the front-end and back-end.
remove_action('wp_head', 'wp_oembed_add_host_js');
// Disable WP version
add_filter('the_generator', 'dartcreations_remove_version');
function dartcreations_remove_version() {
    return '';   
}

/**
 * Posts navigation
 */
function constantinmimi_post_navigation()
{
    $constantinmimi_prev_post = get_previous_post();
    $constantinmimi_next_post = get_next_post();

    if (!empty($constantinmimi_prev_post) || !empty($constantinmimi_next_post)) : ?>
    <div class="navigation post-navigation">
        <div class="nav-links">

            <?php if (!empty($constantinmimi_prev_post)) : ?>
                <div class="nav-previous <?php if (empty($next_post)) : ?>first<?php endif; ?>">
                    <span class="post-nav-title"><?php esc_html_e('Previous Post', 'constantinmimi'); ?></span>
                    <a href="<?php echo get_permalink($constantinmimi_prev_post->ID); ?>"><?php echo esc_html($constantinmimi_prev_post->post_title); ?></a>
                </div>
            <?php endif; ?>

            <?php if (!empty($constantinmimi_next_post)) : ?>
                <div class="nav-next">
                    <span class="post-nav-title"><?php esc_html_e('Next Post', 'constantinmimi'); ?></span>
                    <a href="<?php echo get_permalink($constantinmimi_next_post->ID); ?>"><?php echo esc_html($constantinmimi_next_post->post_title); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div><?php
    endif;
}

/**
 * Function for limit content
 */
function constantinmimi_string_limit_words($string, $word_limit){
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}

/* Delete Composer meta */
add_action('wp_head', 'constantinmimi_delete_visualcomposer_meta', 1);
function constantinmimi_delete_visualcomposer_meta() {
    if ( class_exists( 'Vc_Manager' ) ) {
        remove_action('wp_head', array(visual_composer(), 'addMetaData'));
    }
}

function constantinmimi_breadcrumbs() {

    /* === OPTIONS === */
    $text['home']     = 'Acasă'; // text for the 'Home' link
    $text['category'] = 'Archive by Category "%s"'; // text for a category page
    $text['search']   = 'Search result for "%s"'; // text for a search results page
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
    $text['author']   = 'Articles Posted by %s'; // text for an author page
    $text['404']      = 'Error 404'; // text for the 404 page
    $text['page']     = 'Page %s'; // text 'Page N'
    $text['cpage']    = 'Comment Page %s'; // text 'Comment Page N'

    $wrap_before    = '<div class="page-breadcrumbs">'; // the opening wrapper tag
    $wrap_after     = '</div>'; // the closing wrapper tag
    $sep            = '<span class="breadcrumbs-separator"> / </span>'; // separator between crumbs
    $before         = '<span class="breadcrumbs-current">'; // tag before the current crumb
    $after          = '</span>'; // tag after the current crumb

    $show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_current   = 1; // 1 - show current page title, 0 - don't show
    $show_last_sep  = 1; // 1 - show last separator, when current page title is not displayed, 0 - don't show
    /* === END OF OPTIONS === */

    global $post;
    $home_url       = home_url('/');
    $link           = '<span>';
    $link          .= '<a class="breadcrumbs-link" href="%1$s"><span>%2$s</span></a>';
    $link          .= '</span>';
    $parent_id      = ( $post ) ? $post->post_parent : '';
    $home_link      = sprintf( $link, $home_url, $text['home'], 1 );

    if ( is_home() || is_front_page() ) {

        //if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

        if ( $show_on_home ) echo  $wrap_before . $home_link . $sep . $before . get_the_title( get_option( 'page_for_posts' ) ) . $after . $wrap_after;

    } else {

        $position = 0;

        echo $wrap_before;

        if ( $show_home_link ) {
            $position += 1;
            echo $home_link;
        }

        if ( is_category() ) {
            $parents = get_ancestors( get_query_var('cat'), 'category' );
            foreach ( array_reverse( $parents ) as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $cat = get_query_var('cat');
                echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_search() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $show_home_link ) echo $sep;
                echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['search'], get_search_query() ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_year() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_time('Y') . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_month() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_day() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
            $position += 1;
            echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_single() && ! is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                if ( get_post_type() == 'product' ) {
                    $position += 1;
                    $post_type = get_post_type_object(get_post_type());
                    if ($position > 1) echo $sep;
                    echo sprintf($link, get_post_type_archive_link($post_type->name), 'Products', $position);
                    if ($show_current) echo $sep . $before . get_the_title() . $after;
                    elseif ($show_last_sep) echo $sep;
                }
                elseif ( get_post_type() == 'wine-tours' ) {
                    $position += 1;
                    $post_type = get_post_type_object(get_post_type());
                    if ($position > 1) echo $sep;
                    echo sprintf($link, get_the_permalink(20), 'Wine Tours', $position);
                    if ($show_current) echo $sep . $before . get_the_title() . $after;
                    elseif ($show_last_sep) echo $sep;
                }
                else{
                    $position += 1;
                    $post_type = get_post_type_object(get_post_type());
                    if ($position > 1) echo $sep;
                    echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->labels->name, $position);
                    if ($show_current) echo $sep . $before . get_the_title() . $after;
                    elseif ($show_last_sep) echo $sep;
                }
            } else {
                $cat = get_the_category(); $catID = $cat[0]->cat_ID;
                $parents = get_ancestors( $catID, 'category' );
                $parents = array_reverse( $parents );
                $parents[] = $catID;
                foreach ( $parents as $cat ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                }
                if ( get_query_var( 'cpage' ) ) {
                    $position += 1;
                    echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
                    echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                } else {
                    if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                    elseif ( $show_last_sep ) echo $sep;
                }
            }

        } elseif ( is_post_type_archive() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if (get_post_type() == 'product') {
                    if ($show_home_link && $show_current) echo $sep;
                    if ($show_current) echo $before . 'products' . $after;
                    elseif ($show_home_link && $show_last_sep) echo $sep;
                }else {
                    if ($show_home_link && $show_current) echo $sep;
                    if ($show_current) echo $before . $post_type->label . $after;
                    elseif ($show_home_link && $show_last_sep) echo $sep;
                }
            }

        } elseif ( is_tax() && is_tax() == 'vinuri' ) {

            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                //if ( $show_current ) echo $before . $post_type->label . $after;
                //elseif ( $show_home_link && $show_last_sep ) echo $sep;*/

                $obj = get_queried_object();
                echo sprintf( $link, get_the_permalink(18), $post_type->label, $position ) . $sep . $before.  $obj->name .$after;
            }


        } elseif ( is_tax() && is_tax() !== 'vinuri' ) {

            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                //if ( $show_current ) echo $before . $post_type->label . $after;
                //elseif ( $show_home_link && $show_last_sep ) echo $sep;*/

                $obj = get_queried_object();
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position ) . $sep . $before.  $obj->name .$after;
            }


        }
        elseif ( is_attachment() ) {
            $parent = get_post( $parent_id );
            $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
            $parents = get_ancestors( $catID, 'category' );
            $parents = array_reverse( $parents );
            $parents[] = $catID;
            foreach ( $parents as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            $position += 1;
            echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_page() && ! $parent_id ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_title() . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_page() && $parent_id ) {
            $parents = get_post_ancestors( get_the_ID() );
            foreach ( array_reverse( $parents ) as $pageID ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
            }
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_tag() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $tagID = get_query_var( 'tag_id' );
                echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_author() ) {
            $author = get_userdata( get_query_var( 'author' ) );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_404() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . $text['404'] . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( has_post_format() && ! is_singular() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
}

add_action( 'template_redirect', 'constantinmimi_redirect_post' );
function constantinmimi_redirect_post() {
    if ( is_singular('post') ) :
        wp_redirect( get_permalink(12), 301 );
        exit;
    endif;
}