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

    <section class="donate-hero">
        <div class="container-narrow text-center">
            <h1 class="donate-heading"><?php esc_html_e( 'Support Our Community', 'ramcafe' ); ?></h1>
            <p class="donate-subheading">
                <?php esc_html_e( 'Your gift helps keep Rivers Area Memory Café free and accessible for every family we serve. Every contribution — large or small — makes a difference.', 'ramcafe' ); ?>
            </p>
        </div>
    </section>

    <section class="donate-form-section">
        <div class="container-narrow">
            <?php
            /*
             * BLOOMERANG INTEGRATION
             *
             * Replace the placeholder iframe src below with your Bloomerang hosted
             * donation form URL. To find it:
             *   1. Log into Bloomerang
             *   2. Go to Fundraising → Donation Forms
             *   3. Click your form → "Embed / Share"
             *   4. Copy the iframe src URL and paste it below
             *
             * Example URL format:
             *   https://crm.bloomerang.co/HostedDonation?ApiKey=YOUR_API_KEY&formId=YOUR_FORM_ID
             */
            $bloomerang_url = 'https://crm.bloomerang.co/HostedDonation?ApiKey=REPLACE_WITH_YOUR_KEY';
            ?>

            <div class="donate-form-wrapper">
                <iframe
                    id="bloomerang-donation-form"
                    src="<?php echo esc_url( $bloomerang_url ); ?>"
                    title="<?php esc_attr_e( 'Donation Form — Rivers Area Memory Café', 'ramcafe' ); ?>"
                    seamless
                    scrolling="no"
                    frameborder="0"
                    allowtransparency="true"
                    width="100%"
                    height="900"
                    style="border: none; display: block;"
                ></iframe>
            </div>

            <p class="donate-secure-note">
                <?php esc_html_e( 'Donations are processed securely through Bloomerang. Rivers Area Memory Café is a 501(c)(3) nonprofit organization.', 'ramcafe' ); ?>
            </p>
        </div>
    </section>

</main><!-- #primary -->

<?php
get_footer();
