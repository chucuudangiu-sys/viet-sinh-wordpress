<?php
/**
 * Footer Template for Viet Sinh Mechanical Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-brand">
                <div class="logo" style="margin-bottom: 16px;">
                    <div class="logo-icon">VS</div>
                    <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 18px; font-weight: 700; color: var(--white); letter-spacing: 1px;">
                        <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                    </span>
                </div>
                <p><?php echo wp_kses_post( get_theme_mod( 'viet_sinh_footer_description', get_bloginfo( 'description' ) ) ); ?></p>
                <div class="footer-cert">
                    <span class="cert-badge">TOP 1 VIETNAM</span>
                    <span class="cert-badge">NIPPON SHARYO</span>
                    <span class="cert-badge">JAPAN EXPORTER</span>
                </div>
            </div>

            <!-- Products Column -->
            <div>
                <div class="footer-col-title"><?php echo esc_html__( 'Products', 'viet-sinh' ); ?></div>
                <ul class="footer-links-list">
                    <li><a href="<?php echo esc_url( home_url( '/products' ) ); ?>"><?php echo esc_html__( 'Rotation Head', 'viet-sinh' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/products' ) ); ?>"><?php echo esc_html__( 'Kelly Bar', 'viet-sinh' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/products' ) ); ?>"><?php echo esc_html__( 'CDM Rotation Head', 'viet-sinh' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/products' ) ); ?>"><?php echo esc_html__( 'Crawler Crane', 'viet-sinh' ); ?></a></li>
                </ul>
            </div>

            <!-- Services Column -->
            <div>
                <div class="footer-col-title"><?php echo esc_html__( 'Services', 'viet-sinh' ); ?></div>
                <ul class="footer-links-list">
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php echo esc_html__( 'Maintenance & Repair', 'viet-sinh' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php echo esc_html__( 'Equipment Rental', 'viet-sinh' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php echo esc_html__( 'Spare Parts Supply', 'viet-sinh' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php echo esc_html__( 'Operator Training', 'viet-sinh' ); ?></a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div>
                <div class="footer-col-title"><?php echo esc_html__( 'Contact', 'viet-sinh' ); ?></div>
                <ul class="footer-links-list">
                    <li><a href="#"><?php echo wp_kses_post( get_theme_mod( 'viet_sinh_company_address', 'Dong Tho IZ, Tu Son, Bac Ninh' ) ); ?></a></li>
                    <li><a href="tel:<?php echo esc_attr( get_theme_mod( 'viet_sinh_company_phone', '+84243765888' ) ); ?>"><?php echo esc_html( get_theme_mod( 'viet_sinh_company_phone', '+84243765888' ) ); ?></a></li>
                    <li><a href="mailto:<?php echo esc_attr( get_theme_mod( 'viet_sinh_company_email', 'info@vietsinhmechanical.vn' ) ); ?>"><?php echo esc_html( get_theme_mod( 'viet_sinh_company_email', 'info@vietsinhmechanical.vn' ) ); ?></a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-copy">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. 
                <?php echo esc_html__( 'All rights reserved.', 'viet-sinh' ); ?>
            </div>
            <div>
                <a href="#" style="font-size: 12px; color: var(--steel);"><?php echo esc_html__( 'Privacy Policy', 'viet-sinh' ); ?></a>
                <a href="#" style="font-size: 12px; color: var(--steel); margin-left: 20px;"><?php echo esc_html__( 'Terms of Use', 'viet-sinh' ); ?></a>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>