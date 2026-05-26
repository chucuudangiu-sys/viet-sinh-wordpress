<?php
/**
 * Header Template for Viet Sinh Mechanical Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> id="html-root">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Navigation -->
    <nav class="navbar" role="navigation" aria-label="Main Navigation">
        <div class="nav-inner">
            <!-- Logo -->
            <div class="logo" onclick="showPage('home')" style="cursor: pointer;">
                <div class="logo-icon">VS</div>
                <span>
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo esc_html( get_bloginfo( 'name' ) );
                    }
                    ?>
                </span>
            </div>

            <!-- Navigation Links -->
            <div class="nav-links" role="menubar">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => 'wp_page_menu',
                    'depth'          => 2,
                    'items_wrap'     => '%3\$s',
                ) );
                ?>
            </div>

            <!-- Right Navigation Items -->
            <div class="nav-right">
                <!-- Search -->
                <div class="nav-search">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input type="text" placeholder="Search..." id="search-input" onkeyup="handleSearch(event)"/>
                </div>

                <!-- Language Switch -->
                <div class="lang-switch">
                    <div class="lang-btn active" id="lang-vi" onclick="setLang('vi')">VI</div>
                    <div class="lang-btn" id="lang-en" onclick="setLang('en')">EN</div>
                </div>

                <!-- CTA Button -->
                <button class="nav-cta" onclick="showPage('contact')">
                    <?php echo esc_html( get_theme_mod( 'viet_sinh_cta_text', 'Báo giá' ) ); ?>
                </button>
            </div>
        </div>
    </nav>