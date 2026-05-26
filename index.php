<?php
/**
 * Main Template File for Viet Sinh Mechanical Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main class="main-content" role="main">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                        <?php endif; ?>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content(
                            sprintf(
                                wp_kses(
                                    /* translators: %s: Name of current post. */
                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'viet-sinh' ),
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
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'viet-sinh' ),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Nothing here', 'viet-sinh' ); ?></h1>
                </header>
                <div class="page-content">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'viet-sinh' ); ?></p>
                </div>
            </section>
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();