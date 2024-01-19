<?php
/*
Plugin Name: Constantin Mimi
Plugin URI: https://constantinmimi.md/
Description: Shortcodes constantinmimi.md
Version: 1.0
Author: 2Bros Agency
Author URI: https://2bros.md/
*/

/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Constantin Mimi
/*-----------------------------------------------------------------------------------*/

// Custom post type
add_action('init', 'constantinmimi_cpt_register');
function constantinmimi_cpt_register() {
    $args = array(
        'label' => __('Proiecte', 'constantinmimi'),
        'menu_icon' => 'dashicons-excerpt-view',
        'public' => true,
        'show_ui' => true,
        // 'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        // 'rewrite'  => array( 'slug' => 'proiecte', 'with_front' => false ),
        'supports' => array('title','editor','thumbnail')
    );

    register_post_type( 'proiecte' , $args );}

// Special Heading
function constantinmimi_special_heading($atts, $content=null) {
    extract(shortcode_atts(array(
        "custom_heading" 		=> 'h1',
        "custom_heading_style" 	=> 'white',
        "title" 				=> '',
        "heading_text_align"	=> 'text-left'
    ), $atts));

    $output = $return = '';

    if ( is_singular('tribe_events') ){
                  
        global $event_id;
        $cost  = tribe_get_formatted_cost( $event_id );

        $return .= '<div class="tribe-events-schedule tribe-clearfix"> ';
        $return .= tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' );
            if ( ! empty( $cost ) ) :
                $return .= '<span class="tribe-events-cost">'.esc_html( $cost ) .'</span>';
            endif;
        $return .= '</div>';

        ob_start();
        do_action( 'tribe_events_single_event_after_the_content' );
        $action_data = ob_get_clean();

        $return .= $action_data;       

    }

    if($custom_heading == 'h1'){
        $output .= '<div class="site-heading '.$heading_text_align.' site-heading-'.$custom_heading_style.'">';
        $output .= '<h1>'.$title.'</h1>';
        $output .= '</div>';
    }elseif($custom_heading == 'h2'){
        $output .= '<div class="site-heading '.$heading_text_align.' site-heading-'.$custom_heading_style.'">';
        $output .= '<h2>'.$title.'</h2>';
        $output .= '</div>';

        $output .= $return;

    }elseif($custom_heading == 'h3'){
        $output .= '<div class="site-heading '.$heading_text_align.' site-heading-'.$custom_heading_style.'">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 33"><path stroke="#242963" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M1 16.577c.942 0 .942.119 1.883.119.942 0 .942-.177 1.884-.177.941 0 .941.109 1.883.109.941 0 .941-.073 1.883-.073m5.934.055c.942 0 .942-.02 1.883-.02.942 0 .942.113 1.884.113.941 0 .941-.128 1.883-.128.941 0 .941.048 1.883.048M11.799 13.33c0-.872-.091-.872-.091-1.743 0-.871.078-.871.078-1.74 0-.868-.02-.87-.02-1.742 0-.871.128-.871.128-1.742s-.176-.871-.176-1.742m.206 27.277c0-.93-.168-.93-.168-1.858 0-.93-.028-.93-.028-1.859 0-.929.025-.929.025-1.858s.139-.929.139-1.858.02-.929.02-1.858-.036-.929-.036-1.86c0-.932-.173-.93-.173-1.861M11.7 3.208c0-1.103-.007-1.103-.007-2.208"/></svg>';
        $output .= '<h3>'.$title.'</h3>';
        $output .= '</div>';
    }elseif($custom_heading == 'h4'){
        $output .= '<div class="site-heading '.$heading_text_align.' site-heading-'.$custom_heading_style.'">';
        $output .= '<h4>'.$title.'</h4>';
        $output .= '</div>';
    }elseif($custom_heading == 'h5'){
        $output .= '<div class="site-heading '.$heading_text_align.' site-heading-'.$custom_heading_style.'">';
        $output .= '<h5>'.$title.'</h5>';
        $output .= '</div>';
    }elseif($custom_heading == 'h6'){
        $output .= '<div class="site-heading '.$heading_text_align.' site-heading-'.$custom_heading_style.'">';
        $output .= '<h6>'.$title.'</h6>';
        $output .= '</div>';
    }elseif($custom_heading == 'p'){
        $output .= '<div class="site-heading '.$heading_text_align.' site-heading-'.$custom_heading_style.'">';
        $output .= '<p>'.$title.'</p>';
        $output .= '</div>';
    }elseif($custom_heading == 'div'){
        $output .= '<div class="site-heading '.$heading_text_align.' site-heading-'.$custom_heading_style.'">';
        $output .= '<div>'.$title.'</div>';
        $output .= '</div>';
    }

    return $output;
}
remove_shortcode('special_heading');
add_shortcode('special_heading', 'constantinmimi_special_heading');

// Custom Button
function constantinmimi_custom_button($atts, $content = null) {
    extract(shortcode_atts(array(
        "button_label" => 'View details',
        "button_align" => 'text-left',
        "button_link" => ''
    ), $atts));

    $a_href = $a_title = $a_target = '';
    $button_link = ( $button_link == '||' ) ? '' : $button_link;
	$button_link = vc_build_link( $button_link );
	$use_link = false;
	if ( strlen( $button_link['url'] ) > 0 ) {
		$a_href = $button_link['url'];
		$a_title = $button_link['title'];
		$a_target = strlen( $button_link['target'] ) > 0 ? $button_link['target'] : '_self';
	}

    $output = '<div class="site-button-dark '.$button_align.'">
					<a href="'.$a_href.'" class="btn" target="'.$a_target.'">'.$a_title.'</a>
				</div>';

    return $output;
}
remove_shortcode('custom_button');
add_shortcode('custom_button', 'constantinmimi_custom_button');

// Hero Call To Action
function constantinmimi_cta($atts, $content=null) {
    extract(shortcode_atts(array(
        "cta_title" 	        => '',
        "cta_desc" 		        => '',        
    ), $atts));

    $cta_desc_html = '';
    if( $cta_desc !== '' ){
        $cta_desc_html = '<p>'.$cta_desc.'</p>';
    }

    $output = '
    
    <style>
        .m-wrapper h4{
            font-size: 32px;
            font-weight: 400;
        }
        .m-wrapper #m1 img, .m-wrapper #m1 h4{
            opacity: 0
        }
        .m-wrapper #m2 img, .m-wrapper #m2 h4{
            opacity: 0
        }
        .m-wrapper #m3 img, .m-wrapper #m3 h4{
            opacity: 0
        }
        .z{ transform: scale(3.5); transition: 2s; }

        #m1 .z{ translate: 100%}

        #m3 .z{ translate: -100%}

        .m-wrapper{display: flex; color: white;justify-content: space-around;}
        #m1,
        #m2,
        #m3{
            height: auto;
        }
        .m-wrapper img{ 
            width: 100%;
            height: auto;
        }


        .hero-caption-content h1, .hero-caption-content p, .hero-icon-scroll{opacity: 0 }
    </style>';


    $output .= '
            <div class="site-hero">  
                  
                <div class="hero-caption">                    
                    <div class="site-container">
                        <div class="hero-caption-content">
                            <div class="m-wrapper">
                                <div id="m1">
                                    <img src="'. get_template_directory_uri().'/assets/images/mountain_1.png" />
                                    <h4>Data Analytics</h4>
                                </div>

                                <div id="m2">
                                    <img src="'. get_template_directory_uri().'/assets/images/mountain_2.png" />
                                    <h4>Clinical Trial Systems</h4>
                                </div>

                                <div id="m3">
                                    <img height="160" src="'. get_template_directory_uri().'/assets/images/mountain_3.png" />
                                    <h4>Full Service</h4>
                                </div>
                            </div>

                            <div class="hero-text-caption">
                                <h1>'.$cta_title.'</h1>
                                '.$cta_desc_html.'
                                <div class="hero-icon-scroll">
                                    <div class="icon-scroll"><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 6"><path d="M5.5 3.879 9.212.166l1.06 1.06L5.5 6 .727 1.227l1.06-1.06L5.5 3.878Z" fill="#ffffff"/><path d="M5.5 3.879 9.212.166l1.06 1.06L5.5 6 .727 1.227l1.06-1.06L5.5 3.878Z" fill="#ffffff" fill-opacity=".2"/></svg></div>                           
                                </div>
                            </div>                            
                        </div>  
                    </div>                    
                </div>                
            </div>';

    return $output;
}
add_shortcode('CTA', 'constantinmimi_cta');


// Hero image
function constantinmimi_hero_image($atts, $content=null) {
    extract(shortcode_atts(array(
		"hero_img" 	        	=> '',        
        "hero_subtitle" 	    => '',
        "hero_title" 	        => '',
        "hero_desc" 		    => '',
        "hero_btn_label" 		=> '',
        "hero_btn_url" 	        => '',
        "hero_btn_target" 	    => '_self',
    ), $atts));

    $image = wp_get_attachment_image_src($hero_img, array(370, 210));
    $image_alt = get_post_meta($hero_img, '_wp_attachment_image_alt', TRUE);

    if( $hero_desc !== '' ){
        $hero_desc_html = '<p>'.$hero_desc.'</p>';
    }

    $output = '
            <div class="site-hero">
                <div class="hero-image">
                    <figure>
                        <img src="'.$image[0].'" alt="'.$image_alt.'">
                    </figure>
                </div>

                <div class="hero-caption">
                    <div class="site-container">
                        <div class="hero-caption-content">
                            <h5>'.$hero_subtitle.'</h5>
                            <h2>'.$hero_title.'</h2>
                            '.$hero_desc_html.'
                            <div class="hero-btn">
                                <a href="'.$hero_btn_url.'" target="'.$hero_btn_target.'">'.$hero_btn_label.'</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';

    return $output;
}
add_shortcode('hero_image', 'constantinmimi_hero_image');

// Info block
function constantinmimi_info_block($atts, $content = null) {
    extract(shortcode_atts(array(
        "info_image"            => '',
        "info_block_style"      => 'right',        
        "info_subtitle"         => '',
        "info_heading"          => '',
        "info_desc"             => '',
        "info_link" 		    => '',
    ), $atts));

    $a_href = $a_title = $a_target = '';
    $info_link = ( $info_link == '||' ) ? '' : $info_link;
	$info_link = vc_build_link( $info_link );
	$use_link = false;
	if ( strlen( $info_link['url'] ) > 0 ) {
		$a_href = $info_link['url'];
		$a_title = $info_link['title'];
		$a_target = strlen( $info_link['target'] ) > 0 ? $info_link['target'] : '_self';
	}

    $block_style_class = 'info-block';
    if( $info_block_style == 'left' ){
        $block_style_class .= ' info-block-left';
    }   

    $output2 = '';   
    if( $info_heading !== '' ){
        $output2 .= '<div class="info-block-subtitle"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 33"><path stroke="#242963" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M1 16.577c.942 0 .942.119 1.883.119.942 0 .942-.177 1.884-.177.941 0 .941.109 1.883.109.941 0 .941-.073 1.883-.073m5.934.055c.942 0 .942-.02 1.883-.02.942 0 .942.113 1.884.113.941 0 .941-.128 1.883-.128.941 0 .941.048 1.883.048M11.799 13.33c0-.872-.091-.872-.091-1.743 0-.871.078-.871.078-1.74 0-.868-.02-.87-.02-1.742 0-.871.128-.871.128-1.742s-.176-.871-.176-1.742m.206 27.277c0-.93-.168-.93-.168-1.858 0-.93-.028-.93-.028-1.859 0-.929.025-.929.025-1.858s.139-.929.139-1.858.02-.929.02-1.858-.036-.929-.036-1.86c0-.932-.173-.93-.173-1.861M11.7 3.208c0-1.103-.007-1.103-.007-2.208"/></svg><h5>'.$info_subtitle.'</h5></div>';
    }
    if( $info_heading !== '' ){
        $output2 .= '<h2>'.$info_heading.'</h2>';
    }
    if( $info_desc !== '' ){
        $output2 .= wpautop($info_desc);
    }

    if( $a_href !== '' ){
        $output2 .= '<div class="site-button"><a href="'.$a_href.'" target="'.$a_target.'" class="btn"><span>'.$a_title.'</span></a></div>';
    }

    $image = wp_get_attachment_image_src($info_image,'full');
	$image_alt = get_post_meta($info_image, '_wp_attachment_image_alt', TRUE);

    $output = '<div class="'.$block_style_class.'">
                    <div class="info-block-holder">                        
                        <div class="site-row site-align-center">
                            <div class="site-col-6">
                                <div class="info-block-content">
                                    '.$output2.'
                                </div>
                            </div>
                            <div class="site-col-6">
                                <div class="info-block-image" data-aos="fade-up" data-aos-duration="600">
                                    <img src="'.$image[0].'" class="img-fluid" alt="'.$image_alt.'">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  ';

    return $output;
}
remove_shortcode('info_block');
add_shortcode('info_block', 'constantinmimi_info_block');

// Info block bubbles
function constantinmimi_info_block_bubbles($atts, $content = null) {
    extract(shortcode_atts(array(
        "info_bubbles_image"            => '',
        "info_bubbles_heading"          => '',        
        "info_bubbles_bubbles"          => '',
    ), $atts));

    $image = wp_get_attachment_image_src($info_bubbles_image,'full');

    $output = $output_bubbles = '';
    $bubbles_arr = explode(",",$info_bubbles_bubbles);
    foreach($bubbles_arr as $single_bubble) {
        $single_bubble = str_replace(',', "", $single_bubble);
        $output_bubbles .= '<span>' .$single_bubble . '</span>';
    }

    $output .= '
        <div class="info-block-bubbles" style="background-image: url('.$image[0].');">
            <div class="site-container">
                <div class="site-row site-align-center">
                    <div class="site-col-5">
                        <div class="info-block-bubbles-content">
                            <h2>'.$info_bubbles_heading.'</h2>
                            '.wpautop($content).'
                        </div>
                    </div>
                    <div class="site-col-6 site-col-offset-1">
                        <div class="info-block-bubbles-list">
                            '.$output_bubbles.'
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';

    return $output;
}
remove_shortcode('info_block_bubbles');
add_shortcode('info_block_bubbles', 'constantinmimi_info_block_bubbles');

// Logos gallery
function constantinmimi_logos_gallery($atts, $content = null) {
    extract(shortcode_atts(array(
        "logos_gallery_images" => '',
    ), $atts));

    ob_start();

    ?>
    <div class="image-gallery-carousel">
        <?php
        $images = explode( ',', $logos_gallery_images );
        $i = - 1;

        foreach ( $images as $attach_id ) {
            $img = wp_get_attachment_image_src($attach_id, 'full');
            $image_alt = get_post_meta($attach_id, '_wp_attachment_image_alt', TRUE);

            echo '<div class="carousel-item"><a href="'.$img[0].'"><figure><img src="'.$img[0].'" class="img-fluid" alt="'.$image_alt.'"></figure></a></div>';
        }

	echo '</div>';

	$content = ob_get_contents();
	ob_end_clean();

	return $content;

}
remove_shortcode('logos_gallery');
add_shortcode('logos_gallery', 'constantinmimi_logos_gallery');

// Icon boxes
if(!function_exists('constantinmimi_icon_box_wrapper')){
    function constantinmimi_icon_box_wrapper( $atts, $content = null ) {
        extract(shortcode_atts(array(
            "icon_box_style"           => 'style1',
        ), $atts));

        $icon_box_classes = 'icons-block';
        if( $icon_box_style == 'style2' ){
            $icon_box_classes .= ' icons-block-second-style';
        }else if( $icon_box_style == 'style3' ){
            $icon_box_classes .= ' icons-block-third-style';
        }

        return '<div class="'.$icon_box_classes.'">
                    <div class="icons-block-list">'.do_shortcode($content).'</div>
                </div>';
    }
    add_shortcode('icon_box_wrapper', 'constantinmimi_icon_box_wrapper');
}

function constantinmimi_icon_box($atts, $content=null) {
    extract(shortcode_atts(array(
        "icon_box_icon"           => '',
        "icon_box_heading"           => '',
        "icon_box_desc"              => '',
    ), $atts));

    $image = wp_get_attachment_image_src($icon_box_icon,'full');
	$image_alt = get_post_meta($icon_box_icon, '_wp_attachment_image_alt', TRUE);

    $output = '<div class="icon-block-col">
					<div class="icon-block-item">
                        <div class="icon-block-image">
                            <img src="'.$image[0].'" class="img-fluid" alt="'.$image_alt.'">
                        </div>
                        <div class="icon-block-content">
                            <h4>'.$icon_box_heading.'</h4>
                            <p>'.$icon_box_desc.'</p>
                        </div>
					</div>
				</div>';

    return $output;
}
add_shortcode('icon_box', 'constantinmimi_icon_box');


// Menu Block
if(!function_exists('constantinmimi_black_box_wrapper')){
    function constantinmimi_black_box_wrapper( $atts, $content = null ) {
        return '<div class="menu-block">
                    '.do_shortcode($content).'
                </div>';
    }
    add_shortcode('black_box_wrapper', 'constantinmimi_black_box_wrapper');
}

function constantinmimi_black_box($atts, $content=null) {
    extract(shortcode_atts(array(        
        "black_box_heading"        => '',
        "black_box_desc"           => '',
        "black_box_price"            => '',
    ), $atts));
     
    $output = '
        <div class="menu-block-item">
            <div class="menu-block-item-left">
                <div class="menu-block-item-heading">
                    <h3>'.$black_box_heading.'</h3>
                </div>            
                <div class="menu-block-item-description">
                    <p>'.$black_box_desc.'</p>
                </div>  
            </div>    
            <div class="menu-block-item-right">     
                <div class="menu-block-item-price">
                    <p>'.$black_box_price.'</p>
                </div>  
            </div>  
        </div>
    ';

    return $output;
}
add_shortcode('black_box', 'constantinmimi_black_box');


// Technologies Boxes List
if(!function_exists('constantinmimi_featured_categories_wrapper')){
    function constantinmimi_featured_categories_wrapper( $atts, $content = null ) {

        return '<div class="technologies-boxes-list">
                    <div class="site-row">    
                        '.do_shortcode($content).'						
                    </div>
                </div>';
    }
    add_shortcode('featured_categories_wrapper', 'constantinmimi_featured_categories_wrapper');
}

function constantinmimi_featured_categories($atts, $content=null) {
    extract(shortcode_atts(array(       
        "featured_categories_name"          => '',        
        "featured_categories_aos_duration" 	=> '600',
    ), $atts));
    
    $output = ' <div class="site-col-3">                       
                    <div class="technologies-box-item" data-aos="fade-up" data-aos-duration="'.$featured_categories_aos_duration.'">   
                        <div class="technologies-box-inner">     
                            <div class="technologies-box-image">
                                <figure>
                                    <img src="wp-content/themes/constantinmimi/assets/images/triangle.svg" class="img-fluid">
                                </figure>
                            </div>                                                                    
                            <div class="technologies-box-caption">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 80 80"><path stroke="#101C64" stroke-width="1.5" d="M59.423 23.722c0 11.073-8.907 20.036-19.878 20.036-10.972 0-19.878-8.963-19.878-20.036 0-11.072 8.906-20.035 19.878-20.035 10.971 0 19.878 8.963 19.878 20.035Z" opacity=".3"/><path stroke="#101C64" stroke-width="1.5" d="M49.386 57.307c0 11.06-9.013 20.035-20.142 20.035-11.13 0-20.142-8.975-20.142-20.035s9.013-20.035 20.142-20.035c11.13 0 20.142 8.974 20.142 20.035Z" opacity=".3"/><path stroke="#101C64" stroke-width="1.5" d="M42.635 37.156c0 11.06-9.013 20.035-20.142 20.035-11.13 0-20.143-8.975-20.143-20.035S11.364 17.12 22.493 17.12c11.129 0 20.142 8.975 20.142 20.036Z" opacity=".3"/><path stroke="#101C64" stroke-width="1.5" d="M77.65 37.155c0-11.06-9.013-20.036-20.142-20.036s-20.142 8.975-20.142 20.036c0 11.06 9.013 20.035 20.142 20.035 11.13 0 20.143-8.975 20.143-20.035Z" opacity=".3"/><path stroke="#101C64" stroke-width="1.5" d="M70.963 57.306c0-11.06-9.013-20.036-20.142-20.036-11.13 0-20.143 8.975-20.143 20.036 0 11.06 9.014 20.035 20.143 20.035 11.129 0 20.142-8.975 20.142-20.035Z" opacity=".3"/><path stroke="#101C64" stroke-width="1.5" d="M77.618 37.369c0-11.06-9.013-20.036-20.142-20.036-11.13 0-20.143 8.975-20.143 20.036 0 11.06 9.014 20.035 20.143 20.035 11.129 0 20.142-8.975 20.142-20.035Z" opacity=".3"/></svg>                            
                                <h2>'.$featured_categories_name.'</h2>
                            </div>  
                        </div>                                                                                              
                    </div>
                </div>';

    return $output;

}
add_shortcode('featured_categories', 'constantinmimi_featured_categories');

// Partners logos carousel
function constantinmimi_partners_logos_carousel($atts, $content = null) {
    extract(shortcode_atts(array(
        "partners_logos_images"             => '',
        "partners_logos_main_heading"       => '',
        "partners_logos_desc"               => '',
    ), $atts));

    ob_start();
    ?>
    <div class="partners-logos-block">
        <div class="site-container">
            <div class="site-row site-align-center">
                <div class="site-col-3">
                    <div class="partners-logos-content">
                        <h3><?php echo $partners_logos_main_heading; ?></h3>
                        <p><?php echo $partners_logos_desc; ?></p>
                    </div>
                </div>
                <div class="site-col-9">
                    <div class="marquee">    
                        <ul class="marquee-content">
                            <?php
                            $images = explode( ',', $partners_logos_images );
                            foreach ( $images as $attach_id ) {
                                $img = wp_get_attachment_image_src($attach_id, 'full');
                                $image_alt = get_post_meta($attach_id, '_wp_attachment_image_alt', TRUE);
                                echo '
                                    <li>                   
                                        <img src="'.$img[0].'" class="img-fluid" alt="'.$image_alt.'">                        
                                    </li>
                                ';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
	$content = ob_get_contents();
	ob_end_clean();

	return $content;
}
remove_shortcode('partners_logos_carousel');
add_shortcode('partners_logos_carousel', 'constantinmimi_partners_logos_carousel');


// Page Bottom CTA
function constantinmimi_page_cta($atts, $content=null) {
    extract(shortcode_atts(array(
        "page_cta_img" 	            => '',        
        "page_cta_heading" 	        => '',
        "page_cta_desc" 		    => '',
        "page_cta_btn_label" 	    => '',
        "page_cta_btn_url" 	        => '',
        "page_cta_url" 	        => '',
    ), $atts));

    $image = wp_get_attachment_image_src($page_cta_img, "full");

    $page_cta_url = ( $page_cta_url == '||' ) ? '' : $page_cta_url;
    $page_cta_url = vc_build_link( $page_cta_url );
    if ( strlen( $page_cta_url['url'] ) > 0 ) {
        $a_href = $page_cta_url['url'];
        $a_title = $page_cta_url['title'];
        $a_target = strlen( $page_cta_url['target'] ) > 0 ? $page_cta_url['target'] : '_self';
    }  

    $output = '
        <div class="page-bottom-cta">
            <div class="page-bottom-cta-image" style="background-image: url('.$image[0].')"></div>
            <div class="page-bottom-cta-caption">
                <div class="site-container">
                    <div class="page-bottom-cta-content">                        
                        <h2 data-aos="fade-up" data-aos-duration="400">'.$page_cta_heading.'</h2>
                        <p data-aos="fade-up" data-aos-duration="800">'.$page_cta_desc.'</p>
                        <div class="site-button" data-aos="fade-up" data-aos-duration="1200">
                            <a href="'.$a_href.'" class="btn" target="'.$a_target.'"><span>'.$a_title.'</span> <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><rect width="40" height="40" rx="20" fill="#fff"></rect><path d="M14.09 21.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 1 0 0 2.182Z" fill="#2C2C2C"></path><path d="M14.09 21.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 1 0 0 2.182Z" fill="#0D0D0D" fill-opacity=".2"></path></svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

    return $output;
}
add_shortcode('page_cta', 'constantinmimi_page_cta');


// Menu Block
function constantinmimi_menu_block($atts, $content=null) {
    extract(shortcode_atts(array(     
        "menu_block_heading_1" 	        => '',   
        "menu_block_img_1" 		        => '',
        "menu_block_btn_url_1" 		    => '',         
        "menu_block_heading_2" 	        => '',   
        "menu_block_img_2" 		        => '',        
        "menu_block_btn_url_2" 		    => '',  
        "menu_block_heading_3" 	        => '',   
        "menu_block_img_3" 		        => '',        
        "menu_block_btn_url_3" 		    => '',        
    ), $atts));

    $image_1 = wp_get_attachment_image_src($menu_block_img_1, "full");
    $image_alt_1 = get_post_meta($menu_block_img_1, '_wp_attachment_image_alt', TRUE);   

    $image_2 = wp_get_attachment_image_src($menu_block_img_2, "full");
    $image_alt_2 = get_post_meta($menu_block_img_2, '_wp_attachment_image_alt', TRUE);    

    $image_3 = wp_get_attachment_image_src($menu_block_img_3, "full");
    $image_alt_3 = get_post_meta($menu_block_img_3, '_wp_attachment_image_alt', TRUE);    

    $output = '
        <div class="menu-block-holder">
            <div class="site-row">
                <div class="site-col-4">
                    <a href='.$menu_block_btn_url_1.'>
                        <div class="menu-block-content">
                            <div class="menu-block-image">
                                <figure data-aos="fade-up" data-aos-duration="800">
                                    <img src="'.$image_1[0].'" class="img-fluid" alt="'.$image_alt_1.'">
                                </figure>
                            </div>
                            <div class="menu-block-title">
                                <h2>'.$menu_block_heading_1.'</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="site-col-4">
                    <a href='.$menu_block_btn_url_2.'>
                        <div class="menu-block-content">
                            <div class="menu-block-image">
                                <figure data-aos="fade-up" data-aos-duration="800">
                                    <img src="'.$image_2[0].'" class="img-fluid" alt="'.$image_alt_2.'">
                                </figure>
                            </div>
                            <div class="menu-block-title">
                                <h2>'.$menu_block_heading_2.'</h2>
                            </div>
                        </div>   
                    </a>
                </div>
                <div class="site-col-4">
                    <a href='.$menu_block_btn_url_3.'>
                        <div class="menu-block-content">
                            <div class="menu-block-image">
                                <figure data-aos="fade-up" data-aos-duration="800">
                                    <img src="'.$image_3[0].'" class="img-fluid" alt="'.$image_alt_3.'">
                                </figure>
                            </div>
                            <div class="menu-block-title">
                                <h2>'.$menu_block_heading_3.'</h2>
                            </div>
                        </div>   
                    </a>    
                </div> 
            </div>      
        </div>';

    return $output;
}
add_shortcode('menu_block', 'constantinmimi_menu_block');

// Team Members List
if(!function_exists('constantinmimi_wine_series_carousel_wrapper')){
    function constantinmimi_wine_series_carousel_wrapper( $atts, $content = null ) {

        return '<div class="team-members-list">
                    <div class="site-row">'.do_shortcode($content).'</div>                    
                </div>';
    }
    add_shortcode('wine_series_carousel_wrapper', 'constantinmimi_wine_series_carousel_wrapper');
}

function constantinmimi_wine_series_carousel($atts, $content=null) {
    extract(shortcode_atts(array(
        "wine_series_img"             => '',
        "wine_series_heading"         => '',
        "wine_series_subheading"      => '',        
        "wine_series_desc"            => '',        
        "wine_series_btn_url"         => '',
    ), $atts));

    $image = wp_get_attachment_image_src($wine_series_img,'full');
	$image_alt = get_post_meta($wine_series_img, '_wp_attachment_image_alt', TRUE);
    $wine_series_btn_html = '';
    if ($wine_series_btn_url){
        $wine_series_btn_html='<div class="team-member-social">                
                                <a href="'.$wine_series_btn_url.'" target="_blank" class="btn"><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect width="24" height="24" rx="4" fill="#5CDDEA" fill-opacity=".24"/><path d="M9.048 7.917a1.167 1.167 0 1 1-2.333-.001 1.167 1.167 0 0 1 2.333 0Zm.035 2.03H6.75v7.303h2.333V9.947Zm3.687 0h-2.322v7.303h2.299v-3.833c0-2.135 2.782-2.333 2.782 0v3.833h2.304v-4.626c0-3.6-4.118-3.465-5.086-1.697l.023-.98Z" fill="#fff"/></svg></a>                                
                            </div>';
    }

    $output = '<div class="site-col-3">                    
                    <div class="team-member-item">
                        <div class="team-member-image">                            
                            <img src="'.$image[0].'" class="img-fluid" alt="'.$image_alt.'">                            
                        </div>
                        <div class="team-member-holder">      
                            <div class="team-member-details">                            
                                <h2>'.$wine_series_heading.'</h2>
                                <p>'.$wine_series_subheading.'</p>
                                <div class="site-button-link">
                                    <a class="btn member-modal-open">Read Bio <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14"><path d="M1.09 8.09h9.185l-3.592 3.593a1.09 1.09 0 1 0 1.543 1.543L13.68 7.77a1.09 1.09 0 0 0 0-1.542L8.226.774a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592H1.091a1.09 1.09 0 0 0 0 2.182Z" fill="#ffffff"></path></svg></a>
                                </div>
                            </div>      
                            '.$wine_series_btn_html.'
                        </div>   
                        <div class="team-member-caption">
                            <div class="team-member-caption-holder">
                                <div class="member-caption-close">   
                                    <a class="member-caption-close-icon"></a>
                                </div>
                                <div class="team-member-bio">
                                    <p>'.$wine_series_desc.'</p>
                                </div>                            
                            </div>     
                        </div>                            
                    </div>                                            
                </div>';

    return $output;

}
add_shortcode('wine_series_carousel', 'constantinmimi_wine_series_carousel');

// Accordions block
if(!function_exists('constantinmimi_accordions_block_wrapper')){
    function constantinmimi_accordions_block_wrapper( $atts, $content = null ) {
        return '<ul class="accordions-block">
                    '.do_shortcode($content).'
                </ul>';
    }
    add_shortcode('accordions_block_wrapper', 'constantinmimi_accordions_block_wrapper');
}

function constantinmimi_accordions_block($atts, $content=null) {
    extract(shortcode_atts(array(
        "accordions_block_heading"        => '',
        "accordions_block_type"           => '',
        "accordions_block_time"           => '',
        "accordions_block_location"       => '',
    ), $atts));

    $output = '
        <li class="accordion-item">
            <div class="accordion-title">
                <h4>'.$accordions_block_heading.'</h4>
                <ul>
                    <li><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 16"><path d="M15.6 6.25H9v6h-.75v3h-4.5A.75.75 0 0 1 3 14.5V7.75H.75L8.495.71a.75.75 0 0 1 1.01 0L15.6 6.25Zm-5.1 1.5h6.75V13H10.5V7.75Zm-.75 7.5H18v-1.5H9.75v1.5Z" fill="#00545E"/></svg> '.$accordions_block_type.'</li>
                    <li><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 15"><path d="M8 15A7.5 7.5 0 1 1 8 0a7.5 7.5 0 0 1 0 15Zm.75-7.5V3.75h-1.5V9h4.5V7.5h-3Z" fill="#00545E"/></svg>'.$accordions_block_time.'</li>
                    <li><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 17"><path d="M10.813 10.359a5.25 5.25 0 1 0-7.626 0A4.497 4.497 0 0 1 7 8.25c1.607 0 3.017.842 3.813 2.109ZM7 16.296l-4.773-4.773a6.75 6.75 0 1 1 9.546 0L7 16.296ZM7 7.5A2.25 2.25 0 1 1 7 3a2.25 2.25 0 0 1 0 4.5Z" fill="#00545E"/></svg> '.$accordions_block_location.'</li>
                </ul>
            </div>
            <div class="accordion-content">
                '.wpautop($content).'

                <div class="site-button">
                    <a href="mailto:hr@constantinmimiinfoworks.com" class="btn">Apply for this position <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><rect width="40" height="40" rx="20" fill="#fff"></rect><path d="M14.09 21.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 1 0 0 2.182Z" fill="#2C2C2C"></path><path d="M14.09 21.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 1 0 0 2.182Z" fill="#0D0D0D" fill-opacity=".2"></path></svg></a>
                </div>
            </div>
        </li>';

    return $output;

}
add_shortcode('accordions_block', 'constantinmimi_accordions_block');

// FAQ Toggle Block
if(!function_exists('constantinmimi_toggle_block_wrapper')){
    function constantinmimi_toggle_block_wrapper( $atts, $content = null ) {
        extract(shortcode_atts(array(
            "toggle_block_main_heading"         => '',
            "toggle_block_id"                   => '',
        ), $atts));

        return '<div class="faq-toggle-list">
                    <ul class="accordions-block">
                        <h2 id="'.$toggle_block_id.'">'.$toggle_block_main_heading.'</h2>
                        '.do_shortcode($content).'
                    </ul>
                </div>';
    }
    add_shortcode('toggle_block_wrapper', 'constantinmimi_toggle_block_wrapper');
}

function constantinmimi_toggle_block($atts, $content=null) {
    extract(shortcode_atts(array(
        "toggle_block_heading"        => '',      
    ), $atts));

    $output = '
        <li class="accordion-item">
            <div class="accordion-title">
                <h4>'.$toggle_block_heading.'</h4>              
            </div>
            <div class="accordion-content">
                '.wpautop($content).'              
            </div>
        </li>';

    return $output;

}
add_shortcode('toggle_block', 'constantinmimi_toggle_block');

// Contact Phones Block
if(!function_exists('constantinmimi_contact_phones_wrapper')){
    function constantinmimi_contact_phones_wrapper( $atts, $content = null ) {
        return '<div class="contact-phones-block">
                    <div class="site-row">
                        '.do_shortcode($content).'
                    </div>
                </div>';
    }
    add_shortcode('contact_phones_wrapper', 'constantinmimi_contact_phones_wrapper');
}

function constantinmimi_contact_phones($atts, $content=null) {
    $output .= '
        <div class="site-col-3">
            <div class="contact-phones-list">                        
                '.wpautop($content).'                        
            </div>
        </div>';

    return $output;
}
add_shortcode('contact_phones', 'constantinmimi_contact_phones');

// Contact block inner
function constantinmimi_contact_block_inner($atts, $content=null) {
    extract(shortcode_atts(array(
        "contact_block_inner_address_heading" 	    => '',
        "contact_block_inner_address_content" 		=> '',       
        "contact_block_inner_ask_heading2" 	        => '',
        "contact_block_inner_ask_content2" 		    => '',
        "contact_block_inner_phone_heading" 	    => '',
        "contact_block_inner_phone_content1" 	    => '',
    ), $atts));

    $output = '
        <div class="contact-block-inner">
            <div class="contact-block-item">
                <div class="contact-block-content">
                    <div class="contact-block-icon">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 25"><g clip-path="url(#svgexport-7 1__a)" clip-rule="evenodd" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"><path d="M8.513 1.021c4.156 0 7.512 3.376 7.512 7.56 0 1.698-1.362 4.85-3.081 7.817-1.488 2.567-3.217 5.054-4.431 6.623-1.215-1.57-2.944-4.057-4.431-6.623C2.362 13.432 1 10.278 1 8.582 1 4.398 4.357 1.02 8.513 1.02Z"/><path d="M8.514 5.503a2.953 2.953 0 0 1 2.952 2.972 2.956 2.956 0 0 1-2.952 2.975 2.953 2.953 0 0 1-2.951-2.975 2.95 2.95 0 0 1 2.951-2.972Z"/></g><defs><clipPath id="svgexport-7 1__a"><path fill="#fff" d="M0 0h18v25H0z"/></clipPath></defs></svg>
                    </div>
                    <div class="contact-block-details">
                        <h4>'.$contact_block_inner_address_heading.'</h4>
                        <p>'.$contact_block_inner_address_content.'</p>
                    </div>
                </div>
            </div>

            <div class="contact-block-item">
                <div class="contact-block-content">
                    <div class="contact-block-icon">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13 1a1 1 0 0 1 1-1 10.01 10.01 0 0 1 10 10 1 1 0 0 1-2 0 8.009 8.009 0 0 0-8-8 1 1 0 0 1-1-1Zm1 5a4 4 0 0 1 4 4 1 1 0 1 0 2 0 6.006 6.006 0 0 0-6-6 1 1 0 1 0 0 2Zm9.093 10.739a3.1 3.1 0 0 1 0 4.378l-.91 1.049c-8.19 7.841-28.12-12.084-20.4-20.3l1.15-1a3.081 3.081 0 0 1 4.327.04c.031.031 1.884 2.438 1.884 2.438a3.1 3.1 0 0 1-.007 4.282L7.979 9.082a12.78 12.78 0 0 0 6.931 6.945l1.465-1.165a3.1 3.1 0 0 1 4.281-.006s2.406 1.852 2.437 1.883Zm-1.376 1.454s-2.393-1.841-2.424-1.872a1.1 1.1 0 0 0-1.549 0c-.027.028-2.044 1.635-2.044 1.635a1 1 0 0 1-.979.152A15.009 15.009 0 0 1 5.9 9.3a1 1 0 0 1 .145-1s1.607-2.018 1.634-2.044a1.1 1.1 0 0 0 0-1.549c-.031-.03-1.872-2.425-1.872-2.425a1.1 1.1 0 0 0-1.51.039l-1.15 1C-2.495 10.105 14.776 26.418 20.721 20.8l.911-1.05a1.12 1.12 0 0 0 .085-1.557Z" fill="#ffffff"/></svg>
                    </div>
                    <div class="contact-block-details">
                        <h4>'.$contact_block_inner_phone_heading.'</h4>
                        <p><a href="tel:'.str_replace(' ', '', $contact_block_inner_phone_content1).'" target="_blank">'.$contact_block_inner_phone_content1.'</a></p>                    
                    </div>
                </div>
            </div>

            <div class="contact-block-item">
                <div class="contact-block-content">
                    <div class="contact-block-icon">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 21"><path d="M28.516 2.06H2v17.556h26.516V2.06Z" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"/><path d="M28.457 2 15.26 15.23l-4.402-4.413L2.062 2M2 19.616l8.817-8.838m17.695 8.838-8.817-8.838" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"/></svg>
                    </div>                  
                    <div class="contact-block-details">
                        <h4>'.$contact_block_inner_ask_heading2.'</h4>
                        <p><a href="mailto:'.$contact_block_inner_ask_content2.'" target="_blank">'.$contact_block_inner_ask_content2.'</a></p>
                    </div>
                </div>
            </div>  
            
            <div class="contact-block-item">
                <h4>Urmăriți-ne</h4>
                <div class="contact-block-social">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/constantinmimi.moldova" target="_blank">
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 20"><path d="M7.75 11.5h2.5l1-4h-3.5v-2c0-1.03 0-2 2-2h1.5V.14C10.924.097 9.693 0 8.393 0 5.678 0 3.75 1.657 3.75 4.7v2.8h-3v4h3V20h4v-8.5Z" fill="#fff"/></svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/constantinmimi.md/" target="_blank">
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 7a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm6.5-.25a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0ZM10 2c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332a2.886 2.886 0 0 0-1.08.703 2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C2.006 7.075 2 7.461 2 10c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C7.075 17.994 7.461 18 10 18c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331a2.92 2.92 0 0 0 1.08-.702c.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.91 2.91 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C12.925 2.006 12.539 2 10 2Zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153.509.5.902 1.105 1.153 1.772.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772c-.5.508-1.105.902-1.772 1.153-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153A4.904 4.904 0 0 1 .525 16.55C.277 15.913.11 15.187.06 14.122.013 13.056 0 12.717 0 10c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 3.45.525C4.088.277 4.812.11 5.878.06 6.944.013 7.283 0 10 0Z" fill="#fff"/></svg>
                            </a>
                        </li>                       
                    </ul>
                </div>
            </div>
        </div>';

    return $output;
}
add_shortcode('contact_block_inner', 'constantinmimi_contact_block_inner');

// Blockquote
function constantinmimi_blockquote($atts, $content=null) {
    extract(shortcode_atts(array(
        "blockquote_content" 	  => '',
        "blockquote_name" 	      => '',
        "blockquote_img" 	      => '',      
        "blockquote_bg_img" 	  => '',        
        "aos_duration" 		      => '1200',
    ), $atts));

    $image = wp_get_attachment_image_src($blockquote_img,'full');
	$image_alt = get_post_meta($blockquote_img, '_wp_attachment_image_alt', TRUE);

    $image_bg = wp_get_attachment_image_src($blockquote_bg_img,'full');

    $output = '
        <div class="blockquote-holder" style="background-image: url('.$image_bg[0].')">
            <div class="site-container">
                <div class="blockquote-item" data-aos="fade-up" data-aos-duration="'.$aos_duration.'">
                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 40"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 40V0H0v21.835a8 8 0 0 0 3.412 6.554L20 40Zm30 0V0H30v21.835a7.999 7.999 0 0 0 3.412 6.554L50 40Z" fill="#fff"/></svg>
                    <div class="blockquote-details">
                        <h3>'.$blockquote_content.'</h3>
                        <!--<div class="blockquote-image">
                            <img src="'.$image[0].'" class="img-fluid" alt="'.$image_alt.'">
                            <p>'.$blockquote_name.'</p>                
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    ';

    return $output;
}
add_shortcode('blockquote', 'constantinmimi_blockquote');

// About Page Counter
function constantinmimi_legend_info_block($atts, $content=null) {
    extract(shortcode_atts(array(       
        "legend_info_block_v1" 	        => '',
        "legend_info_block_d1" 	        => '',
        "legend_info_block_v2" 	        => '',
        "legend_info_block_d2" 	        => '',
        "legend_info_block_v3" 	        => '',
        "legend_info_block_d3" 	        => '',
    ), $atts));    

    wp_enqueue_script('waypoints');
    wp_enqueue_script('counter');

    $output .= '
        <div class="about-counter-block">
            <div class="site-row">
                <div class="site-col-4">
                    <div class="about-counter-item">
                        <strong><span class="counter">'.$legend_info_block_v1.'</span></strong>
                        '.$legend_info_block_d1.'
                    </div>
                </div>
                <div class="site-col-4">
                    <div class="about-counter-item">
                        <strong>$<span class="counter">'.$legend_info_block_v2.'</span>B</strong>
                        '.$legend_info_block_d2.'
                    </div>
                </div>
                <div class="site-col-4">
                    <div class="about-counter-item">
                        <strong><span class="counter">'.$legend_info_block_v3.'</span>%</strong>
                        '.$legend_info_block_d3.'
                    </div>
                </div>              
            </div>
        </div>
    ';

    return $output;
}
add_shortcode('legend_info_block', 'constantinmimi_legend_info_block');

// FAQ navigation
function constantinmimi_faq_navigation($atts, $content=null) {    
    extract(shortcode_atts(array(       
        "faq_navigation_n1" 	        => '',
        "faq_navigation_n5" 	        => '',
        "faq_navigation_n2" 	        => '',
        "faq_navigation_n3" 	        => '',
        "faq_navigation_n4" 	        => '',
    ), $atts)); 

    $output = '
        <div class="faq-navigation">
            <ul>
                <li><a href="#general" class="is-active">'.$faq_navigation_n1.'</a></li>
                <li><a href="#service">'.$faq_navigation_n5.'</a></li>      
                <li><a href="#technical">'.$faq_navigation_n2.'</a></li>
                <li><a href="#quality">'.$faq_navigation_n3.'</a></li>
                <li><a href="#training">'.$faq_navigation_n4.'</a></li>                           
            </ul>
        </div>
    ';

    return $output;
}
add_shortcode('faq_navigation', 'constantinmimi_faq_navigation');

// Contact Phones Block
function constantinmimi_contact_phones_block($atts, $content=null) {    

    $output = '
        <div class="contact-phones-block">
            <div class="site-row">        
                <div class="site-col-3">
                    <div class="contact-phones-list">                        
                        '.wpautop($content).'                        
                    </div>
                </div>               
            </div>
        </div>
    ';

    return $output;
}
add_shortcode('contact_phones_block', 'constantinmimi_contact_phones_block');

// Technologies Block
if(!function_exists('constantinmimi_technologies_wrapper')){
    function constantinmimi_technologies_wrapper( $atts, $content = null ) {
        extract(shortcode_atts(array(
            "technologies_main_heading" 	                => '',
        ), $atts));

        return '<div class="technologies-block">
                    <div class="technologies-block-top">
                        <div class="technologies-block-heading">
                            <h2>'.$technologies_main_heading.'</h2>
                        </div>
                        <div class="technologies-block-carousel-arrows">
                            <div class="slick-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48"><rect width="48" height="48" fill="#fff" rx="24" transform="matrix(-1 0 0 1 48 0)"/><path fill="#2C2C2C" d="M29.91 25.09h-9.185l3.592 3.593a1.091 1.091 0 0 1-1.543 1.543L17.32 24.77a1.09 1.09 0 0 1 0-1.542l5.454-5.455a1.091 1.091 0 0 1 1.543 1.543l-3.592 3.592h9.184a1.09 1.09 0 0 1 0 2.182Z"/><path fill="#0D0D0D" fill-opacity=".2" d="M29.91 25.09h-9.185l3.592 3.593a1.091 1.091 0 0 1-1.543 1.543L17.32 24.77a1.09 1.09 0 0 1 0-1.542l5.454-5.455a1.091 1.091 0 0 1 1.543 1.543l-3.592 3.592h9.184a1.09 1.09 0 0 1 0 2.182Z"/></svg>
                            </div>
                            <div class="slick-next">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48"><rect width="48" height="48" fill="#fff" rx="24"/><path fill="#2C2C2C" d="M18.09 25.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 0 0 0 2.182Z"/><path fill="#0D0D0D" fill-opacity=".2" d="M18.09 25.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 0 0 0 2.182Z"/></svg>
                            </div>
                        </div>
                    </div>
                
                    <div class="technologies-block-bottom">
                        <div class="technologies-carousel">
                            '.do_shortcode($content).'
                        </div>
                        </div>
                    </div>';
    }
    add_shortcode('technologies_wrapper', 'constantinmimi_technologies_wrapper');
}

function constantinmimi_technologies($atts, $content=null) {
    extract(shortcode_atts(array(
        "technologies_heading" 	                        => '',
        "button_link" 	                                => '',
        "technologies_bg_img" 	                        => '',
        "technologies_logo_img" 	                    => '',
    ), $atts));

    $image = wp_get_attachment_image_src($technologies_bg_img,'full');
    $logo_image = wp_get_attachment_image_src($technologies_logo_img,'full');

    $a_href = $a_title = $a_target = '';
    $button_link = ( $button_link == '||' ) ? '' : $button_link;
	$button_link = vc_build_link( $button_link );
	if ( strlen( $button_link['url'] ) > 0 ) {
		$a_href = $button_link['url'];
		$a_title = $button_link['title'];
		$a_target = strlen( $button_link['target'] ) > 0 ? $button_link['target'] : '_self';
	}

    $output .= '
        <div class="technologies-carousel-slide">
            <div class="technologies-carousel-item">
                <div class="technologies-carousel-card">
                    <div class="technologies-carousel-card-banner">
                        <img src="'.$image[0].'" class="img-fluid" alt="'.$technologies_heading.'">
                    </div>
                    <div class="technologies-carousel-card-logo">
                        <img src="'.$logo_image[0].'" class="img-fluid" alt="'.$technologies_heading.'">
                    </div>
                    <div class="technologies-carousel-card-info">
                        <h4>'.$technologies_heading.'</h4>
                        <p>'.$content.'</p>
                    </div>
                </div>
                <div class="technologies-carousel-card-link">
                    <div class="technologies-carousel-card-btn">
                        <a href="'.$a_href.'" target="'.$a_target.'">Learn more
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path fill="#007C8A" d="M1.09 8.09h9.185l-3.592 3.593a1.09 1.09 0 1 0 1.543 1.543L13.68 7.77a1.09 1.09 0 0 0 0-1.542L8.226.774a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592H1.091a1.09 1.09 0 0 0 0 2.182Z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>';

    return $output;
}
add_shortcode('technologies', 'constantinmimi_technologies');

// Video block
function constantinmimi_video_block($atts, $content = null) {
    extract(shortcode_atts(array(
        "video_block_cover"          => '',
        "video_block_video_url"      => '',
        "video_block_text"           => '',
        "video_block_title"          => '',        
    ), $atts));

    $img = wp_get_attachment_image_src($video_block_cover, 'full');
    $image_alt = get_post_meta($video_block_cover, '_wp_attachment_image_alt', TRUE);

    $output .= '<div class="video-block">
                    <div class="site-row site-align-center">
                        <div class="site-col-6">
                            <div class="video-block-image">
                                <img src="'.$img[0].'" class="img-fluid" alt="'.$image_alt.'">
                            </div>
                            <div class="video-block-icon">
                                <a class="video-block-open"><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 55"><g filter="url(#icon__a)"><rect y=".5" width="54" height="54" rx="27" fill="#ffffff" fill-opacity=".25"/><path d="M38.198 25.921a280.458 280.458 0 0 1-4.766-2.71c-3.416-1.967-7.288-4.198-10.019-5.53a1.795 1.795 0 0 0-2.58 1.605l.001 8.214v8.213a1.795 1.795 0 0 0 2.58 1.604c2.733-1.332 6.609-3.565 10.029-5.536a286.576 286.576 0 0 1 4.755-2.704c.607-.332.969-.922.969-1.578s-.362-1.246-.969-1.578Z" fill="#fff"/></g><defs><filter id="icon__a" x="-40" y="-39.5" width="134" height="134" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feGaussianBlur in="BackgroundImageFix" stdDeviation="20"/><feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_314_6803"/><feBlend in="SourceGraphic" in2="effect1_backgroundBlur_314_6803" result="shape"/></filter></defs></svg></a>
                            </div>
                        </div>

                        <div class="site-col-5 site-col-offset-1">
                            <div class="video-block-text-holder">
                                <div class="video-block-text">
                                    <h2>'.$video_block_title.'</h2>
                                    '.wpautop($video_block_text).'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="video-block-iframe">
                    <div class="video-block-iframe-holder">
                        <div class="video-block-close">
                            <a class="video-close"></a>
                        </div>
                        <video controls id="video-iframe">
                            <source src="'. get_site_url() . $video_block_video_url.'" type="video/mp4">
                        </video>                                                
                    </div>
                </div>';

    return $output;
}
remove_shortcode('video_block');
add_shortcode('video_block', 'constantinmimi_video_block');

// Customers slider
if(!function_exists('constantinmimi_customers_slider_wrapper')){
    function constantinmimi_customers_slider_wrapper( $atts, $content = null ) {
        return '<div class="customers-slider">
                    '.do_shortcode($content).'
                </div>';
    }
    add_shortcode('customers_slider_wrapper', 'constantinmimi_customers_slider_wrapper');
}

function constantinmimi_customers_slider($atts, $content=null) {
    extract(shortcode_atts(array(
        "customers_slider_img" 	                        => '',
        "customers_slider_heading" 	                    => '',
        "customers_slider_btn_label" 	                => 'Read full Story',
        "customers_slider_btn_url" 	                    => '',
    ), $atts));

    $image = wp_get_attachment_image_src($customers_slider_img,'full');
	$image_alt = get_post_meta($customers_slider_img, '_wp_attachment_image_alt', TRUE);

    $output .= '
        <div class="customers-slide">
            <div class="customers-slide-content">
                <div class="customers-slide-image">
                    <img src="'.$image[0].'" class="img-fluid">
                </div>
                <div class="customers-slide-info">
                        <h2>'.$customers_slider_heading.'</h2>
                        <p>'.$content.'</p>
                        <div class="customers-slide-btn">   
                            <a href="'.$customers_slider_btn_url.'"> '.$customers_slider_btn_label.'
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><rect width="40" height="40" rx="20" fill="#fff"></rect><path d="M14.09 21.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 1 0 0 2.182Z" fill="#2C2C2C"></path><path d="M14.09 21.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 1 0 0 2.182Z" fill="#0D0D0D" fill-opacity=".2"></path></svg>
                            </a>
                        </div>
                </div>
            </div>
        </div>';

    return $output;
}
add_shortcode('customers_slider', 'constantinmimi_customers_slider');

// Reviews block
if(!function_exists('constantinmimi_reviews_wrapper')){
    function constantinmimi_reviews_wrapper( $atts, $content = null ) {
        extract(shortcode_atts(array(
            "reviews_wrapper_main_heading" 	              => '',
        ), $atts));

        return '
            <div class="reviews-block">
                <div class="reviews-block-top">
                    <div class="reviews-block-heading">
                        <h2>'.$reviews_wrapper_main_heading.'</h2>
                    </div>
                    <div class="reviews-block-carousel-arrows">
                        <div class="slick-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48"><rect width="48" height="48" fill="#fff" rx="24" transform="matrix(-1 0 0 1 48 0)"/><path fill="#2C2C2C" d="M29.91 25.09h-9.185l3.592 3.593a1.091 1.091 0 0 1-1.543 1.543L17.32 24.77a1.09 1.09 0 0 1 0-1.542l5.454-5.455a1.091 1.091 0 0 1 1.543 1.543l-3.592 3.592h9.184a1.09 1.09 0 0 1 0 2.182Z"/><path fill="#0D0D0D" fill-opacity=".2" d="M29.91 25.09h-9.185l3.592 3.593a1.091 1.091 0 0 1-1.543 1.543L17.32 24.77a1.09 1.09 0 0 1 0-1.542l5.454-5.455a1.091 1.091 0 0 1 1.543 1.543l-3.592 3.592h9.184a1.09 1.09 0 0 1 0 2.182Z"/></svg>
                        </div>
                        <div class="slick-next">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48"><rect width="48" height="48" fill="#fff" rx="24"/><path fill="#2C2C2C" d="M18.09 25.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 0 0 0 2.182Z"/><path fill="#0D0D0D" fill-opacity=".2" d="M18.09 25.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 0 0 0 2.182Z"/></svg>
                        </div>
                    </div>
                </div>
            
                <div class="reviews-block-bottom">                    
                    <div class="reviews-carousel-slider">
                        '.do_shortcode($content).'
                    </div>                
                </div>
            </div>
        ';
    }
    add_shortcode('reviews_wrapper', 'constantinmimi_reviews_wrapper');
}

function constantinmimi_review_item($atts, $content=null) {
    extract(shortcode_atts(array(
        "review_item_img" 	                        => '',        
    ), $atts));

    $image = wp_get_attachment_image_src($review_item_img,'full');
	$image_alt = get_post_meta($review_item_img, '_wp_attachment_image_alt', TRUE);

    $output = '        
        <div class="review-item">                
            <div class="review-image">
                <img decoding="async" src="'.$image[0].'" class="img-fluid" alt="'.$image_alt.'">                        
            </div>
        </div>        
    ';

    return $output;
}
add_shortcode('review_item', 'constantinmimi_review_item');

// Services home list
if(!function_exists('constantinmimi_services_home_list_wrapper')){
    function constantinmimi_services_home_list_wrapper( $atts, $content = null ) {
        extract(shortcode_atts(array(
            "services_home_list_main_heading" 	        => '',
            "services_home_list_desc" 	                => '',
            "services_home_list_img" 	                => '',            
        ), $atts));

        wp_enqueue_script('sticksy');

        $image = wp_get_attachment_image_src($services_home_list_img,'full');
        $image_alt = get_post_meta($services_home_list_img, '_wp_attachment_image_alt', TRUE);

        return '
            <div class="services-home-list">    
                <div class="services-home-list-holder">    
                    <div class="services-home-list-col">    
                        <div class="services-home-content">
                            <div class="services-home-content-top">
                                <h2>'.$services_home_list_main_heading.'</h2>
                                <div class="services-home-blockquote">
                                    '.wpautop($services_home_list_desc).'
                                </div>
                            </div>
            
                            <div class="services-home-content-bottom">
                                '.do_shortcode($content).'
                            </div>         
                        </div>     
                    </div> 
                    
                    <div class="services-home-list-col">
                        <div class="services-home-image-sticky js-sticky-widget">
                            <div class="services-home-image">
                                <img class="services-home-image-link" src="'.$image[0].'" alt="'.$image_alt.'">                                
                            </div>
                            <p class="services-home-image-desc">Experienced oversight and coordination of all functional groups and vendors.</p>
                        </div>  
                    </div>
                </div>
            </div>
        ';
    }
    add_shortcode('services_home_list_wrapper', 'constantinmimi_services_home_list_wrapper');
}

function constantinmimi_services_home_list_item($atts, $content=null) {
    extract(shortcode_atts(array(
        "services_list_img" 	                    => '',
        "services_list_link" 	                    => '',
        "services_home_list_description" 	        => '',
    ), $atts));

    $image = wp_get_attachment_image_src($services_list_img,'full');
	$image_alt = get_post_meta($services_list_img, '_wp_attachment_image_alt', TRUE);

    $a_href = $a_title = $a_target = '';
    $services_list_link = ( $services_list_link == '||' ) ? '' : $services_list_link;
	$services_list_link = vc_build_link( $services_list_link );
	if ( strlen( $services_list_link['url'] ) > 0 ) {
		$a_href = $services_list_link['url'];
		$a_title = $services_list_link['title'];
		$a_target = strlen( $services_list_link['target'] ) > 0 ? $services_list_link['target'] : '_self';
	}

    $output = '
        <div class="services-home-title-link" data-desc="'.$services_home_list_description.'" data-image="'.$image[0].'">
            <h3>'.$a_title.'</h3>
            <div class="site-button">
                <a href="'.$a_href.'" class="btn" target="'.$a_target.'"><span>Explore More</span> <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><rect width="40" height="40" rx="20" fill="#fff"></rect><path d="M14.09 21.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 1 0 0 2.182Z" fill="#2C2C2C"></path><path d="M14.09 21.09h9.185l-3.592 3.593a1.091 1.091 0 0 0 1.543 1.543l5.454-5.455a1.09 1.09 0 0 0 0-1.542l-5.454-5.455a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592h-9.184a1.09 1.09 0 1 0 0 2.182Z" fill="#0D0D0D" fill-opacity=".2"></path></svg></a>
            </div>
        </div>
    ';

    return $output;
}
add_shortcode('services_home_list_item', 'constantinmimi_services_home_list_item');

// Blog grid
function constantinmimi_blog_grid($atts, $content = null) {
    extract(shortcode_atts(array(
        "posts_number" => '3',
    ), $atts));


    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $posts_number,
    );

    $output = '<div class="home-posts">
                <div class="site-row">';

    $my_query = new WP_Query($args);

    if ($my_query->have_posts()) {
        while ($my_query->have_posts()) : $my_query->the_post();

            $output .= '<div class="site-col-4">
                            <article class="site-post">
                                <div class="post-details-holder">
                                    <div class="post-image">
                                        <figure>
                                            <a href="' . get_the_permalink() . '">
                                                ' . get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-fluid')) . '
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="post-details">
                                        <div class="post-title">
                                            <h2><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h2>
                                        </div>
                                        <div class="post-excerpt">
                                            <p>' . constantinmimi_string_limit_words(get_the_excerpt(), 20) . '...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-link-holder">
                                    <div class="post-link">
                                        <a href="' . get_the_permalink() . '">' . esc_html__('mai multe detalii', 'constantinmimi') . '
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 56 56"><g clip-path="url(#Frame__a)"><path fill="#242963" d="M28 55.125c14.98 0 27.125-12.144 27.125-27.125C55.125 13.02 42.981.875 28 .875 13.02.875.875 13.019.875 28 .875 42.98 13.019 55.125 28 55.125Z"/><path fill="#fff" d="M30.887 29.312H20.125a1.27 1.27 0 0 1-.936-.378 1.265 1.265 0 0 1-.377-.934c0-.372.127-.684.378-.936.252-.252.564-.378.935-.377h10.762l-3.806-3.806c-.24-.24-.36-.547-.36-.919s.12-.678.36-.918c.24-.241.547-.361.919-.361s.678.12.919.36l6.037 6.038c.263.263.394.569.394.919 0 .35-.131.656-.394.919l-6.037 6.037c-.24.24-.547.361-.919.361s-.678-.12-.919-.36c-.24-.242-.36-.548-.36-.92 0-.371.12-.678.36-.918l3.806-3.807Z"/></g><defs><clipPath id="Frame__a"><path fill="#fff" d="M0 0h56v56H0z"/></clipPath></defs></svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>';
        endwhile;
    }
    wp_reset_query();

    $output .= '</div>
                </div>';

    return $output;
}

remove_shortcode('blog_grid');
add_shortcode('blog_grid', 'constantinmimi_blog_grid');