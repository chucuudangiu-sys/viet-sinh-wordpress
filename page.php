<?php
/**
 * Page Template for Viet Sinh Mechanical Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="page-hero">
    <div class="page-hero-inner">
        <div class="section-tag" style="color: var(--accent-light);"><?php echo esc_html__( 'Page', 'viet-sinh' ); ?></div>
        <div class="page-hero-title"><?php the_title(); ?></div>
        <div class="breadcrumb">
            <a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html__( 'Home', 'viet-sinh' ); ?></a>
            <span>/ <?php the_title(); ?></span>
        </div>
    </div>
</div>

<main class="main-content" role="main">
    <section style="background: var(--white); padding: 72px 4%;">
        <div class="container">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article <?php post_class(); ?>>
                        <?php
                        if ( has_post_thumbnail() ) :
                            ?>
                            <div class="page-thumbnail" style="margin-bottom: 32px;">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                            <?php
                        endif;
                        ?>

                        <div class="page-content">
                            <?php
                            the_content();
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
            endif;
            ?>
        </div>
    </section>
</main>

<?php
get_footer();