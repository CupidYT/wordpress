<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package constantinmimi
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <?php wp_head(); ?>
		
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-BWN9HRK2V1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-BWN9HRK2V1');
		</script>
    </head>
    <body <?php body_class(); ?>>		
        <header class="main-header">
            <nav class="main-nav">
                <div class="nav-logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(). '/assets/images/blue-logo.svg'; ?>" alt="constantinmimi">                       
                    </a>
                </div>
                <div class="nav-menu">
                    <?php
                    if (has_nav_menu('constantinmimi-primary-nav')) {
                        wp_nav_menu(array(
                            'theme_location'    => 'constantinmimi-primary-nav',
                            'menu_id'           => 'menu-primary-nav',
                            'container_class'   => 'menu-primary-nav-container'
                        ));
                    } else {
                        ?>
                        <div class="site-navigation-notset">
                            <span><?php echo esc_html_e('Make your menu at Appearance => Menus', 'constantinmimi'); ?></span><br />
                        </div>
                    <?php } ?>
                </div>           
                <div class="nav-tools">                                    
                    <div class="nav-tools-cta">   
                        <a href="https://constantinmimi.md/doneaza/">Donează
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 56 56"><g clip-path="url(#Frame__a)"><path fill="#242963" d="M28 55.125c14.98 0 27.125-12.144 27.125-27.125C55.125 13.02 42.981.875 28 .875 13.02.875.875 13.019.875 28 .875 42.98 13.019 55.125 28 55.125Z"/><path fill="#fff" d="M30.887 29.312H20.125a1.27 1.27 0 0 1-.936-.378 1.265 1.265 0 0 1-.377-.934c0-.372.127-.684.378-.936.252-.252.564-.378.935-.377h10.762l-3.806-3.806c-.24-.24-.36-.547-.36-.919s.12-.678.36-.918c.24-.241.547-.361.919-.361s.678.12.919.36l6.037 6.038c.263.263.394.569.394.919 0 .35-.131.656-.394.919l-6.037 6.037c-.24.24-.547.361-.919.361s-.678-.12-.919-.36c-.24-.242-.36-.548-.36-.92 0-.371.12-.678.36-.918l3.806-3.807Z"/></g><defs><clipPath id="Frame__a"><path fill="#fff" d="M0 0h56v56H0z"/></clipPath></defs></svg>
                        </a>
                    </div>
                    <div class="nav-tools-mobile">   
                        <div class="menu-open-mobile">
							<span></span>
							<span></span>
							<span></span>
                        </div> 
                    </div> 
                </div>

            </nav>
        </header>