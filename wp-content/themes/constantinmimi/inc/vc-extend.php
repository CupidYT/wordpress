<?php
//
// Custom Visual Composer Scripts for a constantinmimi
//

vc_remove_element('vc_raw_js');
vc_remove_element('vc_wp_tagcloud');
vc_remove_element('vc_wp_custommenu');
vc_remove_element('vc_wp_links');
vc_remove_element('vc_basic_grid');
vc_remove_element('vc_wp_search');
vc_remove_element('vc_wp_meta');
vc_remove_element('vc_wp_text');
vc_remove_element('vc_wp_categories');
vc_remove_element('vc_wp_archives');
vc_remove_element('vc_wp_rss');
vc_remove_element('vc_wp_calendar');
vc_remove_element('vc_icon');
vc_remove_element('vc_masonry_media_grid');
vc_remove_element('vc_posts_slider');
vc_remove_element('vc_posts_grid');
vc_remove_element('vc_wp_pages');
vc_remove_element('vc_wp_recentcomments');
vc_remove_element('vc_wp_posts');
vc_remove_element('vc_flickr');
vc_remove_element('vc_pinterest');
vc_remove_element('vc_button');
vc_remove_element('vc_cta');
vc_remove_element('vc_masonry_grid');
vc_remove_element('vc_pie');
vc_remove_element('vc_widget_sidebar');
vc_remove_element('vc_media_grid');
vc_remove_element('vc_hoverbox');
vc_remove_element('vc_round_chart');
vc_remove_element('vc_line_chart');
vc_remove_element('vc_progress_bar');
vc_remove_element('vc_gallery');
vc_remove_element('vc_tta_pageable');
vc_remove_element('vc_tta_tour');
vc_remove_element('vc_images_carousel');
vc_remove_element('vc_gutenberg');
vc_remove_element('vc_facebook');
vc_remove_element('vc_tweetmeme');
vc_remove_element('vc_custom_heading');
vc_remove_element('vc_video');
vc_remove_element('vc_progress_bar');
vc_remove_element('vc_message');
vc_remove_element('vc_text_separator');
vc_remove_element('vc_zigzag');
vc_remove_element('vc_googleplus');
vc_remove_element('vc_tabs');
vc_remove_element('vc_tour');
vc_remove_element('vc_accordion');
vc_remove_element('vc_btn');
vc_remove_element('vc_tta_accordion');
vc_remove_element('vc_tta_tabs');

// Special Heading
vc_map( array(
    "name" => esc_html__("Special Heading", "constantinmimi"),
    "base" => "special_heading",
    "description" => esc_html__("Heading text", "constantinmimi"),
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "params" => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Heading', 'constantinmimi' ),
            'param_name' => 'custom_heading',
            'value' => array(
                esc_html__( 'h1', 'constantinmimi' ) => 'h1',
                esc_html__( 'h2', 'constantinmimi' ) => 'h2',
                esc_html__( 'h3', 'constantinmimi' ) => 'h3',
                esc_html__( 'h4', 'constantinmimi' ) => 'h4',
                esc_html__( 'h5', 'constantinmimi' ) => 'h5',
                esc_html__( 'h6', 'constantinmimi' ) => 'h6',
                esc_html__( 'p',  'constantinmimi' ) => 'p',
                esc_html__( 'div','constantinmimi' ) => 'div',
            ),
            'description' => esc_html__( 'Choose heading.', 'constantinmimi' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Heading style', 'constantinmimi' ),
            'param_name' => 'custom_heading_style',
            'value' => array(
                esc_html__( 'Light', 'constantinmimi' ) => 'grey',
                esc_html__( 'Dark', 'constantinmimi' ) => 'dark',
            ),
            'description' => esc_html__( 'Choose heading style.', 'constantinmimi' ),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Title", 'constantinmimi'),
            'admin_label' => true,
            "param_name" => "title",
            "description" => esc_html__("Heading text.", 'constantinmimi'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Text align', 'constantinmimi' ),
            'param_name' => 'heading_text_align',
            'value' => array(
                esc_html__( 'Align left', 'constantinmimi' ) => 'text-left',
                esc_html__( 'Align right', 'constantinmimi' ) => "text-right",
                esc_html__( 'Align center', 'constantinmimi' ) => 'text-center',
                esc_html__( 'Justify', 'constantinmimi' ) => 'text-justify'
            ),
            'description' => esc_html__( 'Select text align.', 'constantinmimi' )
        )
    )
));

// Hero image
vc_map( array(
    "name" => esc_html__("Hero image", "constantinmimi"),
    "base" => "hero_image",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Hero image",
    "params" => array(
	array(
            "type" => "attach_image",
            "heading" => esc_html__("hero image", "constantinmimi"),
            "param_name" => "hero_img",
        ),       
        array(
            "type" => "textarea",
            "heading" => esc_html__("Subtitle", 'constantinmimi'),
            "param_name" => "hero_subtitle",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Title", 'constantinmimi'),
            "param_name" => "hero_title",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'constantinmimi'),
            "param_name" => "hero_desc",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button label", "constantinmimi"),
            "param_name" => "hero_btn_label",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button URL", "constantinmimi"),
            "param_name" => "hero_btn_url",
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Button target", "constantinmimi"),
            "param_name" => "hero_btn_target",
            "value" => array(esc_html__("Same window", "constantinmimi") => "_self", esc_html__("New window", "constantinmimi") => "_blank"),
        ),
    )
));

// Button
vc_map( array(
    "name" => esc_html__("Custom Button", "constantinmimi"),
    "base" => "custom_button",
    "category" => 'constantinmimi',
    "description" => "Custom Button",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Text", "constantinmimi"),
            'admin_label' => true,
            "param_name" => "button_label",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Button align', 'constantinmimi' ),
            'param_name' => 'button_align',
            'value' => array(
                esc_html__( 'Align left', 'constantinmimi' ) => 'text-left',
                esc_html__( 'Align right', 'constantinmimi' ) => "text-right",
                esc_html__( 'Align center', 'constantinmimi' ) => 'text-center',
                esc_html__( 'Justify', 'constantinmimi' ) => 'text-justify'
            ),
            'description' => esc_html__( 'Select button align.', 'constantinmimi' )
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Url", 'constantinmimi'),
            "param_name" => "button_link",
        ),
    )
));

// Hero Video
vc_map( array(
    "name" => esc_html__("Hero Video", "constantinmimi"),
    "base" => "CTA",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Image with description!",
    "category" => 'Content',
    "params" => array(	
        array(
            "type" => "textarea",
            "heading" => esc_html__("Title", 'constantinmimi'),
            "param_name" => "cta_title",
            'admin_label' => true,
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'constantinmimi'),
            "param_name" => "cta_desc",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button label", "constantinmimi"),
            "param_name" => "cta_btn_label",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button URL", "constantinmimi"),
            "param_name" => "cta_btn_url",
        ),
    )
));

// Info block
vc_map( array(
    "name" => esc_html__("Info block", "constantinmimi"),
    "base" => "info_block",
    "description" => "Info block",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "params" => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Info block style', 'constantinmimi' ),
            'param_name' => 'info_block_style',
            'value' => array(
                esc_html__( 'Image on right', 'constantinmimi' ) => 'right',
                esc_html__( 'Image on left', 'constantinmimi' ) => 'left',
            ),
            'description' => esc_html__( 'Choose info block style.', 'constantinmimi' ),
        ),       
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "info_image",
        ),        
        array(
            "type" => "textarea",
            "heading" => esc_html__("Subtitle", "constantinmimi"),
            "param_name" => "info_subtitle",
            'admin_label' => true,
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Title", "constantinmimi"),
            "param_name" => "info_heading",
            'admin_label' => true,
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", "constantinmimi"),
            "param_name" => "info_desc",
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Url", 'constantinmimi'),
            "param_name" => "info_link",
        ),

    )
));

// Info block bubbles
vc_map( array(
    "name" => esc_html__("Info block bubbles", "constantinmimi"),
    "base" => "info_block_bubbles",
    "description" => "Info block bubbles",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "params" => array(   
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "info_bubbles_image",
        ),        
        array(
            "type" => "textarea",
            "heading" => esc_html__("Title", "constantinmimi"),
            "param_name" => "info_bubbles_heading",
            'admin_label' => true,
        ),
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("Description", "constantinmimi"),
            "param_name" => "content",
        ),
        array(
            "type" => "exploded_textarea",
            "heading" => esc_html__("Bubbles", "constantinmimi"),
            "param_name" => "info_bubbles_bubbles",
        ),

    )
));

// Image Gallery Carousel
vc_map( array(
    "name" => __("Image Gallery Carousel", "constantinmimi"),
    "base" => "logos_gallery",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Image gallery with title",
    "params" => array(
        array(
            'type' => 'attach_images',
            'heading' => __( 'Images', 'constantinmimi' ),
            'param_name' => 'logos_gallery_images',
            'description' => __( 'Select images from media library.', 'constantinmimi' )
        ),
    )
));

// Icon boxes
vc_map( array(
    "name" => esc_html__("Icon boxes", "constantinmimi"),
    "base" => "icon_box_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'icon_box'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Style', 'constantinmimi' ),
            'param_name' => 'icon_box_style',
            'value' => array(
                esc_html__( 'Style 1', 'constantinmimi' ) => 'style1',
                esc_html__( 'Style 2', 'constantinmimi' ) => "style2",
                esc_html__( 'Style 3', 'constantinmimi' ) => "style3"
            ),
            'description' => esc_html__( 'Select element style.', 'constantinmimi' )
        ),
    )
) );

vc_map( array(
    "name" => esc_html__("Icon box", "constantinmimi"),
    "base" => "icon_box",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'icon_box_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
        array(
            'type' => 'attach_images',
            'heading' => __( 'Icon', 'constantinmimi' ),
            'param_name' => 'icon_box_icon',            
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "constantinmimi"),
            "param_name" => "icon_box_heading",
			'admin_label' => true,
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", "constantinmimi"),
            "param_name" => "icon_box_desc",
        ),
    )
) );

// Menu Block
vc_map( array(
    "name" => esc_html__("Menu Block", "constantinmimi"),
    "base" => "black_box_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'black_box'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "js_view" => 'VcColumnView',
) );

vc_map( array(
    "name" => esc_html__("Menu Item", "constantinmimi"),
    "base" => "black_box",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'black_box_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(        
        array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "constantinmimi"),
            "param_name" => "black_box_heading",
			'admin_label' => true,
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", "constantinmimi"),
            "param_name" => "black_box_desc",
        ),   
        array(
            "type" => "textfield",
            "heading" => esc_html__("Price", "constantinmimi"),
            "param_name" => "black_box_price",			
        ),     
    )
) );

// Technologies Boxes List
vc_map( array(
    "name" => esc_html__("Technologies Boxes List", "constantinmimi"),
    "base" => "featured_categories_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'featured_categories'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
) );

vc_map( array(
    "name" => esc_html__("Technologies Box Item", "constantinmimi"),
    "base" => "featured_categories",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'featured_categories_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(   
        array(
            "type" => "textfield",
            "heading" => esc_html__("Technologies Item Title", "constantinmimi"),
            "param_name" => "featured_categories_name",
			'admin_label' => true,
        ),       
        array(
            "type" => "textfield",
            "heading" => esc_html__("Effect duration", 'constantinmimi'),
            "param_name" => "featured_categories_aos_duration",
            "value" => "600",
            "group" => "AOS",
        ),
    )
) );

// Partners logos carousel
vc_map( array(
    "name" => __("Partners logos carousel", "constantinmimi"),
    "base" => "partners_logos_carousel",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Partners logos carousel",
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Main heading", 'constantinmimi'),
            "param_name" => "partners_logos_main_heading",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'constantinmimi'),
            "param_name" => "partners_logos_desc",
        ),
        array(
            'type' => 'attach_images',
            'heading' => __( 'Images', 'constantinmimi' ),
            'param_name' => 'partners_logos_images',
            'description' => __( 'Select images from media library.', 'constantinmimi' )
        ),
    )
));

// Page CTA
vc_map( array(
    "name" => esc_html__("Page Bottom CTA", "constantinmimi"),
    "base" => "page_cta",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Page Bottom CTA",
    "params" => array(	
	    array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "page_cta_img",
        ),       
        array(
            "type" => "textarea",
            "heading" => esc_html__("Heading", "constantinmimi"),
            "param_name" => "page_cta_heading",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'constantinmimi'),
            "param_name" => "page_cta_desc",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button label", "constantinmimi"),
            "param_name" => "page_cta_btn_label",
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Button link", 'constantinmimi'),
            "param_name" => "page_cta_url",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button URL", "constantinmimi"),
            "param_name" => "page_cta_btn_url",
        ),
    )
));

// Menu Block
vc_map( array(
    "name" => esc_html__("Menu Block", "constantinmimi"),
    "base" => "menu_block",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Menu Block",
    "params" => array(		       
        array(
            "type" => "textarea",
            "heading" => esc_html__("Heading", "constantinmimi"),
            "param_name" => "menu_block_heading_1",
            "group" => "Description 1",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "menu_block_img_1",
            "group" => "Description 1",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("URL", "constantinmimi"),
            "param_name" => "menu_block_btn_url_1",
            "group" => "Description 1",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Heading", "constantinmimi"),
            "param_name" => "menu_block_heading_2",
            "group" => "Description 2",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "menu_block_img_2",
            "group" => "Description 2",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("URL", "constantinmimi"),
            "param_name" => "menu_block_btn_url_2",
            "group" => "Description 2",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Heading", "constantinmimi"),
            "param_name" => "menu_block_heading_3",
            "group" => "Description 3",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "menu_block_img_3",
            "group" => "Description 3",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("URL", "constantinmimi"),
            "param_name" => "menu_block_btn_url_3",
            "group" => "Description 3",
        ),
    )
));

// Team Members List
vc_map( array(
    "name" => esc_html__("Team Members List", "constantinmimi"),
    "base" => "wine_series_carousel_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'wine_series_carousel'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
) );

vc_map( array(
    "name" => esc_html__("Team Member Item", "constantinmimi"),
    "base" => "wine_series_carousel",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'wine_series_carousel_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
	    array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "wine_series_img",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Name", "constantinmimi"),
            "param_name" => "wine_series_heading",
            'admin_label' => true,	
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Position", "constantinmimi"),
            "param_name" => "wine_series_subheading",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", "constantinmimi"),
            "param_name" => "wine_series_desc",			
        ),      
        array(
            "type" => "textfield",
            "heading" => esc_html__("LinkedIn URL", "constantinmimi"),
            "param_name" => "wine_series_btn_url",
        ),
    )
) );

// Contact Details Block
vc_map( array(
    "name" => esc_html__("Contact Details Block", "constantinmimi"),
    "base" => "contact_block_inner",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Contact Details Block",
    "params" => array(	
        array(
            "type" => "textfield",
            "heading" => esc_html__("Address heading", "constantinmimi"),
            "param_name" => "contact_block_inner_address_heading",
            "group" => "Address",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Address content", 'constantinmimi'),
            "param_name" => "contact_block_inner_address_content",
            "group" => "Address",
        ),              
        array(
            "type" => "textfield",
            "heading" => esc_html__("Email heading", "constantinmimi"),
            "param_name" => "contact_block_inner_ask_heading2",
            "group" => "Email",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Email content", 'constantinmimi'),
            "param_name" => "contact_block_inner_ask_content2",
            "group" => "Email",
        ),        
        array(
            "type" => "textfield",
            "heading" => esc_html__("Phone heading", "constantinmimi"),
            "param_name" => "contact_block_inner_phone_heading",
            "group" => "Phone",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Phone content", 'constantinmimi'),
            "param_name" => "contact_block_inner_phone_content1",
            "group" => "Phone",
        ),       
    )
));

// Blockquote
vc_map( array(
    "name" => esc_html__("Blockquote", "constantinmimi"),
    "base" => "blockquote",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Blockquote",
    "params" => array(	
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Background image", "constantinmimi"),
            "param_name" => "blockquote_bg_img",
        ),
	    array(
            "type" => "textarea",
            "heading" => esc_html__("Description", "constantinmimi"),
            "param_name" => "blockquote_content",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Name", "constantinmimi"),
            "param_name" => "blockquote_name",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "blockquote_img",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Effect duration", 'constantinmimi'),
            "param_name" => "aos_duration",
            "value" => "1200",
            "group" => "AOS",
        ),
    )
));

// About Page Counter
vc_map( array(
    "name" => esc_html__("About Page Counter", "constantinmimi"),
    "base" => "legend_info_block",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "About Page Counter",
    "params" => array(		           
        array(
            "type" => "textarea",
            "heading" => esc_html__("Counter value", 'constantinmimi'),
            "param_name" => "legend_info_block_v1",
            "group" => "Counter 1",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Counter description", 'constantinmimi'),
            "param_name" => "legend_info_block_d1",
            "group" => "Counter 1",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Counter value", 'constantinmimi'),
            "param_name" => "legend_info_block_v2",
            "group" => "Counter 2",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Counter description", 'constantinmimi'),
            "param_name" => "legend_info_block_d2",
            "group" => "Counter 2",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Counter value", 'constantinmimi'),
            "param_name" => "legend_info_block_v3",
            "group" => "Counter 3",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Counter description", 'constantinmimi'),
            "param_name" => "legend_info_block_d3",
            "group" => "Counter 3",
        ),
    )
));

// Contact Phones Block
vc_map( array(
    "name" => esc_html__("Contact Phones Block", "constantinmimi"),
    "base" => "contact_phones_block",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Contact Phones Block",
    "params" => array(		           
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("First Column", 'constantinmimi'),
            "param_name" => "content",
        ),                  
    )
));

// Jobs Accordions Block
vc_map( array(
    "name" => esc_html__("Jobs Accordions Block", "constantinmimi"),
    "base" => "accordions_block_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'accordions_block'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
) );

vc_map( array(
    "name" => esc_html__("Job Position", "constantinmimi"),
    "base" => "accordions_block",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'accordions_block_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "constantinmimi"),
            "param_name" => "accordions_block_heading",
            'admin_label' => true,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Type", "constantinmimi"),
            "param_name" => "accordions_block_type",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Time", "constantinmimi"),
            "param_name" => "accordions_block_time",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Location", "constantinmimi"),
            "param_name" => "accordions_block_location",
        ),
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content", "constantinmimi"),
            "param_name" => "content",
        ),
    )
) );

// FAQ Toggle Block
vc_map( array(
    "name" => esc_html__("FAQ Toggle Block", "constantinmimi"),
    "base" => "toggle_block_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'toggle_block'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Main heading", "constantinmimi"),
            "param_name" => "toggle_block_main_heading",
        ),      
        array(
            "type" => "textfield",
            "heading" => esc_html__("ID", "constantinmimi"),
            "param_name" => "toggle_block_id",
        ),  
    )
) );

vc_map( array(
    "name" => esc_html__("FAQ Item", "constantinmimi"),
    "base" => "toggle_block",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'toggle_block_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Question", "constantinmimi"),
            "param_name" => "toggle_block_heading",
            'admin_label' => true,
        ),      
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content", "constantinmimi"),
            "param_name" => "content",
        ),
    )
) );

// Contact Phones Block
vc_map( array(
    "name" => esc_html__("Contact Phones", "constantinmimi"),
    "base" => "contact_phones_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'contact_phones'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
) );

vc_map( array(
    "name" => esc_html__("Contact Phones item", "constantinmimi"),
    "base" => "contact_phones",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'contact_phones_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("First Column", 'constantinmimi'),
            "param_name" => "content",
        ),
    )
) );

// Technologies Block
vc_map( array(
    "name" => esc_html__("Technologies block", "constantinmimi"),
    "base" => "technologies_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'technologies'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
    "params" => array(		           
        array(
            "type" => "textfield",
            "heading" => esc_html__("Main heading", 'constantinmimi'),
            "param_name" => "technologies_main_heading",
        ),                  
    )
) );

vc_map( array(
    "name" => esc_html__("Technologies item", "constantinmimi"),
    "base" => "technologies",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'technologies_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", 'constantinmimi'),
            "param_name" => "technologies_heading",
            'admin_label' => true,
        ), 
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content", 'constantinmimi'),
            "param_name" => "content",
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Url", 'constantinmimi'),
            "param_name" => "button_link",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Background image", "constantinmimi"),
            "param_name" => "technologies_bg_img",
            "group" => "Images",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Logo", "constantinmimi"),
            "param_name" => "technologies_logo_img",
            "group" => "Images",
        ),
        
    )
) );

// Customers slider
vc_map( array(
    "name" => esc_html__("Customers slider", "constantinmimi"),
    "base" => "customers_slider_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'customers_slider'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
) );

vc_map( array(
    "name" => esc_html__("Slider item", "constantinmimi"),
    "base" => "customers_slider",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'customers_slider_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Background image", "constantinmimi"),
            "param_name" => "customers_slider_img",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", 'constantinmimi'),
            "param_name" => "customers_slider_heading",
        ), 
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content", 'constantinmimi'),
            "param_name" => "content",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button label", "constantinmimi"),
            "param_name" => "customers_slider_btn_label",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button URL", "constantinmimi"),
            "param_name" => "customers_slider_btn_url",
        ),
    )
) );

// Video block
vc_map( array(
    "name" => esc_html__("Video block", "constantinmimi"),
    "base" => "video_block",
    "description" => "Video block",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "params" => array(
        array(
            "type" => "attach_images",
            "heading" => esc_html__("Video cover image", "constantinmimi"),
            "param_name" => "video_block_cover",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Video URL", "constantinmimi"),
            "param_name" => "video_block_video_url",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Title", "constantinmimi"),
            "param_name" => "video_block_title",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Text", "constantinmimi"),
            "param_name" => "video_block_text",
        ),      
    )
));

// Reviews block
vc_map( array(
    "name" => esc_html__("Reviews block", "constantinmimi"),
    "base" => "reviews_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'review_item'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textarea",
            "heading" => esc_html__("Main heading", "constantinmimi"),
            "param_name" => "reviews_wrapper_main_heading",
        ),   
    )
) );

vc_map( array(
    "name" => esc_html__("Review item", "constantinmimi"),
    "base" => "review_item",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'reviews_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Photo", "constantinmimi"),
            "param_name" => "review_item_img",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Client", 'constantinmimi'),
            "param_name" => "review_item_client",
        ), 
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("Review", 'constantinmimi'),
            "param_name" => "content",
        ),
    )
) );

// Services home list
vc_map( array(
    "name" => esc_html__("Services home list", "constantinmimi"),
    "base" => "services_home_list_wrapper",
    'category' => array( esc_html__( 'constantinmimi', 'constantinmimi' ) ),
    "as_parent" => array('only' => 'services_home_list_item'), // Use only|except attributes to limit child shortcodes (separate multiple values wiconstantinmimi comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,    
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textarea",
            "heading" => esc_html__("Main heading", "constantinmimi"),
            "param_name" => "services_home_list_main_heading",            
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", "constantinmimi"),
            "param_name" => "services_home_list_desc",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "services_home_list_img",
        ),
    )
) );

vc_map( array(
    "name" => esc_html__("Services home list item", "constantinmimi"),
    "base" => "services_home_list_item",
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "content_element" => true,
    "as_child" => array('only' => 'services_home_list_wrapper'), // Use only|except attributes to limit parent (separate multiple values wiconstantinmimi comma)
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "constantinmimi"),
            "param_name" => "services_list_img",
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Url", 'constantinmimi'),
            "param_name" => "services_list_link",            
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Service description", "constantinmimi"),
            "param_name" => "services_home_list_description",
            'admin_label' => true,
        ),
    )
) );

// FAQ navigation
vc_map( array(
    "name" => esc_html__("FAQ navigation", "constantinmimi"),
    "base" => "faq_navigation",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "FAQ navigation",
    "params" => array(		           
        array(
            "type" => "textfield",
            "heading" => esc_html__("Item title", 'constantinmimi'),
            "param_name" => "faq_navigation_n1",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Item title", 'constantinmimi'),
            "param_name" => "faq_navigation_n5",
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Item title", 'constantinmimi'),
            "param_name" => "faq_navigation_n2",
        ),     
        array(
            "type" => "textfield",
            "heading" => esc_html__("Item title", 'constantinmimi'),
            "param_name" => "faq_navigation_n3",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Item title", 'constantinmimi'),
            "param_name" => "faq_navigation_n4",
        ),
    )
));



// Contact Phones Block
vc_map( array(
    "name" => esc_html__("Contact Phones Block", "constantinmimi"),
    "base" => "contact_phones_block",
    "category" => 'constantinmimi',
    "icon" => get_template_directory_uri() . '/assets/images/favicon.jpg',
    "description" => "Contact Phones Block",
    "params" => array(		           
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("First Column", 'constantinmimi'),
            "param_name" => "content",
        ),                  
    )
));

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_wine_series_carousel_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_accordions_block_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_toggle_block_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_Icon_Box_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_Contact_Block_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_Featured_Categories_Wrapper extends WPBakeryShortCodesContainer {}    
    class WPBakeryShortCode_contact_phones_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_technologies_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_customers_slider_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_reviews_wrapper extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_services_home_list_wrapper extends WPBakeryShortCodesContainer {}

    class WPBakeryShortCode_black_box_wrapper extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_wine_series_carousel extends WPBakeryShortCode {}
    class WPBakeryShortCode_accordions_block extends WPBakeryShortCode {}
    class WPBakeryShortCode_toggle_block extends WPBakeryShortCode {}
    class WPBakeryShortCode_Icon_Box extends WPBakeryShortCode {}
    class WPBakeryShortCode_Contact_Block extends WPBakeryShortCode {}
    class WPBakeryShortCode_Featured_Categories extends WPBakeryShortCode {}    
    class WPBakeryShortCode_contact_phones extends WPBakeryShortCode {}
    class WPBakeryShortCode_technologies extends WPBakeryShortCode {}
    class WPBakeryShortCode_customers_slider extends WPBakeryShortCode {}
    class WPBakeryShortCode_review_item extends WPBakeryShortCode {}
    class WPBakeryShortCode_services_home_list_item extends WPBakeryShortCode {}

    class WPBakeryShortCode_black_box extends WPBakeryShortCode {}
}

// Blog grid
vc_map( array(
    "name"        => esc_html__("Blog grid", "constantinmimi"),
    "base"        => "blog_grid",
    "category"    => 'constantinmimi',
    "description" => "Blog grid",
    "icon"        => get_template_directory_uri() . '/assets/images/favicon.png',
    "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => esc_html__("Number of posts to display", "constantinmimi"),
            "param_name"  => "posts_number",
            "value"       => 3,
            'admin_label' => true,
        ),
    )
));
