<?php
/**
 * Template Name: Donation Page
 *
 * Embeds the Bloomerang hosted donation form.
 *
 * @package RAMCafe
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="donate-form-section">
        <div class="container-narrow">

            <div style="background-color: var(--color-beige); border: 2px solid var(--color-slate-blue); border-radius: var(--radius-lg); padding: var(--spacing-lg); text-align: center; margin-bottom: var(--spacing-lg);">
                <h1 style="color: var(--color-terracotta); margin-top: 0;"><?php esc_html_e( 'Support Our Community', 'ramcafe' ); ?></h1>
                <p style="font-size: 1.2rem; line-height: 1.8; font-weight: 500; color: var(--color-slate-blue); max-width: 580px; margin: 0 auto;">
                    <?php esc_html_e( 'Your gift helps keep Rivers Area Memory Café free and accessible for every family we serve. Every contribution — large or small — makes a difference.', 'ramcafe' ); ?>
                </p>
                <p style="font-size: 1.2rem; line-height: 1.8; font-weight: 500; color: var(--color-slate-blue); max-width: 580px; margin: 1rem auto 0;">
                    <?php esc_html_e( 'To donate by mail, please make checks payable to Rivers Area Memory Café and mail to:', 'ramcafe' ); ?>
                    <br>
                    <strong>
                        <?php esc_html_e( 'PO Box 103', 'ramcafe' ); ?>
                        <br>
                        <?php esc_html_e( 'Fergus Falls, MN 56538', 'ramcafe' ); ?>
                    </strong>
                    <br>
                    <?php esc_html_e( 'Or you may also make a secure online donation using the option below.', 'ramcafe' ); ?>
                </p>
            </div>

            <div class="donate-form-wrapper">
                <?php get_template_part( 'template-parts/bloomerang-donation-form' ); ?>
            </div>

            <p class="donate-secure-note">
                <?php esc_html_e( 'Donations are processed securely through Bloomerang. Rivers Area Memory Café is a 501(c)(3) nonprofit organization.', 'ramcafe' ); ?>
            </p>
        </div>
    </section>

</main><!-- #primary -->

<?php
get_footer();
