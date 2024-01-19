<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package constantinmimi
 */

if ( ! is_active_sidebar( 'constantinmimi_sidebar' ) && ! is_active_sidebar( 'constantinmimi_shop_sidebar' ) ) {
	return;
}
$constantinmimi_sidebar_id = 'constantinmimi_sidebar';

if (class_exists('Woocommerce')) {
    if(is_woocommerce() || is_shop() || is_cart() || is_checkout() || is_account_page()) {
        $constantinmimi_sidebar_id = 'constantinmimi_shop_sidebar';
    }
}
?>

<?php if( !is_product() ){ ?>
    <div class="site-col-3">
        <aside class="site-sidebar">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($constantinmimi_sidebar_id)) ?>
        </aside>
    </div>
<?php } ?>

