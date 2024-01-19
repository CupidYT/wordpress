<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constantinmimi
 */

$constantinmimi_blog_style = constantinmimi_theme_data('constantinmimi_blog_style');

if($constantinmimi_blog_style == 'chess'){ ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-archieve col-sm-12'); ?>>

        <div class="article-body">
            <div class="ws-separator-dark"></div>
            <div class="ws-posted-on">
                <?php echo get_the_date(); ?>
            </div>

            <?php
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

            if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php
                    $categories_list = get_the_category_list( esc_html__( ' / ', 'constantinmimi' ) );
                    if ( $categories_list ) {
                        printf( '<span class="cat-links">' . esc_html__( '%1$s', 'constantinmimi' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                    } ?>
                </div><!-- .entry-meta -->
            <?php
            endif; ?>

            <div class="custom-button ws-button-dark">
                <a class="ws-readmore-btn btn" href="<?php the_permalink()?>"><?php esc_html_e('Vezi articolul', 'constantinmimi'); ?></a>
            </div>

        </div><!-- .entry-header -->

        <div class="article-thumbnail">

            <?php constantinmimi_post_thumbnail(); ?>

        </div>

    </article><?php
}elseif($constantinmimi_blog_style == 'grid'){ ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-xs-12 ws-blog-grid-items'); ?>>
      <div class="thumbnail">
        <!-- Image -->
        <?php constantinmimi_post_thumbnail(); ?>

        <div class="caption">
          <!-- Date -->
          <div class="blog-date">
            <?php printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
            esc_html_x( '', 'Used before publish date.', 'constantinmimi' ),
            esc_url( get_permalink() ),
            get_the_date()
            ); ?>
          </div>

          <!-- Title -->
          <div class="blog-title">
            <?php the_title( sprintf( '<a href="%s" rel="bookmark"><h3>', esc_url( get_permalink() ) ), '</h3></a>' ); ?>
          </div>

          <div class="ws-separator"></div>

            <?php
            if ( 'post' === get_post_type() ) : ?>
            <div class="blog-category">
                <?php
                $categories_list = get_the_category_list( esc_html__( ' / ', 'constantinmimi' ) );
                if ( $categories_list ) {
                    printf( '<span>' . esc_html__( '%1$s', 'constantinmimi' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                } ?>
            </div><!-- .entry-meta -->
            <?php
            endif; ?>

            <div class="blog-button">
              <div class="custom-button text-center ws-button-dark">
                  <a class="ws-readmore-btn btn" href="<?php the_permalink()?>"><?php esc_html_e('Vezi articolul', 'constantinmimi'); ?></a>
              </div>
            </div>
        </div>

      </div>
    </article>

<?php
}else{ ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-xs-12 ws-blog-grid-items'); ?>>
        <div class="thumbnail">
            <!-- Image -->
            <?php constantinmimi_post_thumbnail(); ?>

            <div class="caption">
                <?php
                if ( 'post' === get_post_type() ) : ?>
                    <div class="blog-category">
                        <?php
                        $categories_list = get_the_category_list( esc_html__( ' / ', 'constantinmimi' ) );
                        if ( $categories_list ) {
                            printf( '<span>' . esc_html__( '%1$s', 'constantinmimi' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                        } ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>

                <!-- Title -->
                <div class="blog-title">
                    <?php the_title( sprintf( '<a href="%s" rel="bookmark"><h3>', esc_url( get_permalink() ) ), '</h3></a>' ); ?>
                </div>

                <div class="ws-separator"></div>

                <!-- Date -->
                <div class="blog-date">
                    <?php printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
                        esc_html_x( '', 'Used before publish date.', 'constantinmimi' ),
                        esc_url( get_permalink() ),
                        get_the_date()
                    ); ?>
                </div>

                <div class="blog-content col-sm-8 offset-md-2">
                    <?php $constantinmimi_excerpt_length=constantinmimi_theme_data('excerpt_length'); if (!$constantinmimi_excerpt_length) { $constantinmimi_excerpt_length = 35; }
                    echo constantinmimi_string_limit_words(get_the_excerpt(), absint($constantinmimi_excerpt_length)); ?>&hellip;
                </div>

                <div class="blog-button">
                    <div class="custom-button text-center ws-button-dark">
                        <a class="ws-readmore-btn btn" href="<?php the_permalink()?>"><?php esc_html_e('Vezi Articolul', 'constantinmimi'); ?></a>
                    </div>
                </div>

            </div>

        </div>
    </article>
<?php
}
