<?php
/**
 * Template part for displaying posts
 *
 * Used in index.php and archive pages
 *
 * @package RAMCafe
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php ramcafe_post_thumbnail(); ?>

    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
        ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php
                ramcafe_posted_on();
                ramcafe_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        if ( is_singular() ) {
            the_content(
                sprintf(
                    wp_kses(
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ramcafe' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ramcafe' ),
                    'after'  => '</div>',
                )
            );
        } else {
            the_excerpt();
        }
        ?>
    </div><!-- .entry-content -->

    <?php if ( ! is_singular() ) : ?>
        <div class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e( 'Read More', 'ramcafe' ); ?> &rarr;
            </a>
        </div>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
