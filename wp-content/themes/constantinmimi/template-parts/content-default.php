<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constantinmimi
 */
global $post;
$cat = get_the_category($post->ID);
?>

<div class="site-col-4">
    <div class="post-item">
        <div class="post-details-holder">
            <div class="post-image">
                <figure>
                    <a href="<?php the_permalink()?>">
                        <?php the_post_thumbnail('constantinmimi-blog-grid', array('class' => 'img-fluid')); ?>
                    </a>
                </figure>
            </div>
            <div class="post-details">
                <div class="post-date">
                    <?php echo get_the_date(); ?>
                </div>
                <div class="post-title">
                    <h4><?php echo get_the_title(); ?></h4>
                </div>
                <div class="post-excerpt">
                    <p><?php echo constantinmimi_string_limit_words( get_the_excerpt(), 20); ?>...</p>
                </div>  
            </div>      
        </div>   

        <div class="post-link-holder">
            <div class="post-link">
                <a href="<?php the_permalink()?>"><?php esc_html_e('mai multe detalii', 'constantinmimi'); ?><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 56 56"><g clip-path="url(#Frame__a)"><path fill="#242963" d="M28 55.125c14.98 0 27.125-12.144 27.125-27.125C55.125 13.02 42.981.875 28 .875 13.02.875.875 13.019.875 28 .875 42.98 13.019 55.125 28 55.125Z"/><path fill="#fff" d="M30.887 29.312H20.125a1.27 1.27 0 0 1-.936-.378 1.265 1.265 0 0 1-.377-.934c0-.372.127-.684.378-.936.252-.252.564-.378.935-.377h10.762l-3.806-3.806c-.24-.24-.36-.547-.36-.919s.12-.678.36-.918c.24-.241.547-.361.919-.361s.678.12.919.36l6.037 6.038c.263.263.394.569.394.919 0 .35-.131.656-.394.919l-6.037 6.037c-.24.24-.547.361-.919.361s-.678-.12-.919-.36c-.24-.242-.36-.548-.36-.92 0-.371.12-.678.36-.918l3.806-3.807Z"/></g><defs><clipPath id="Frame__a"><path fill="#fff" d="M0 0h56v56H0z"/></clipPath></defs></svg></a>
            </div>
        </div>     
    </div>
</div>
