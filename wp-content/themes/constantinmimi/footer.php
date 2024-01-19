<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package constantinmimi
 */
?>

<div class="site-overlay"></div>

<div class="menu-off-canvas">
    <div class="mobile-menu">
        <div class="mobile-menu-inner">
            <div class="mobile-menu-header">
                <div class="mobile-menu-logo">
                    <img src="<?php echo get_template_directory_uri(). '/assets/images/blue-logo.svg'; ?>" alt="constantinmimi">
                </div>
                <div class="mobile-menu-close">
                    <div class="mobile-menu-close-inner">
                        <a class="menu-close"></a>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-content">
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
            <div class="mobile-menu-footer">
                <div class="nav-tools-cta">
                    <a href="https://constantinmimi.md/doneaza/">Donează
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 56 56"><g clip-path="url(#Frame__a)"><path fill="#242963" d="M28 55.125c14.98 0 27.125-12.144 27.125-27.125C55.125 13.02 42.981.875 28 .875 13.02.875.875 13.019.875 28 .875 42.98 13.019 55.125 28 55.125Z"/><path fill="#fff" d="M30.887 29.312H20.125a1.27 1.27 0 0 1-.936-.378 1.265 1.265 0 0 1-.377-.934c0-.372.127-.684.378-.936.252-.252.564-.378.935-.377h10.762l-3.806-3.806c-.24-.24-.36-.547-.36-.919s.12-.678.36-.918c.24-.241.547-.361.919-.361s.678.12.919.36l6.037 6.038c.263.263.394.569.394.919 0 .35-.131.656-.394.919l-6.037 6.037c-.24.24-.547.361-.919.361s-.678-.12-.919-.36c-.24-.242-.36-.548-.36-.92 0-.371.12-.678.36-.918l3.806-3.807Z"/></g><defs><clipPath id="Frame__a"><path fill="#fff" d="M0 0h56v56H0z"/></clipPath></defs></svg>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer">
    <div class="site-container">
        <div class="footer-top">
            <div class="site-row">
                <div class="site-col-4">
                    <div class="footer-logo">
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(). '/assets/images/white-logo.svg'; ?>" alt="constantinmimi">                       
                        </a>
                    </div>
                </div>
                <div class="site-col-3">
                    <div class="footer-navigation">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("constantinmimi-footer-2nd-col")) : ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="site-col-3">
                    <div class="footer-text">
                        <h4>Contacte</h4>
                        <div class="footer-contact-block">
                            <div class="footer-contact-block-item">
                                <p>Raionul Anenii Noi,</p>
                                <p>sat. Bulboaca,</p>
                                <p>Republica Moldova</p>
                            </div>
                            <div class="footer-contact-block-item">
                                <a href="tel:+37368221107" target="_blank">+373 68 22 11 07</a>
                            </div>
                            <div class="footer-contact-block-item">
                                <a href="mailto:info@constantinmimi.md" target="_blank">info@constantinmimi.md</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-col-2">
                    <div class="footer-navigation">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("constantinmimi-footer-4th-col")) : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="site-row">
                <div class="site-col-6">
                    <div class="footer-copyright">
                        <p>&copy; <?php echo date("Y"); ?> Fundația Constantin Mimi. Toate drepturile rezervate.</p>
                    </div>
                </div>               
                <div class="site-col-6">
                    <div class="footer-privacy">
                        <a href="https://constantinmimi.md/politica-de-confidentialitate/">Politica de confidențialitate</a>
                        <p>|</p>
                        <a href="https://constantinmimi.md/termeni-si-conditii/">Termeni și condiții</a>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>                

</body>
</html>