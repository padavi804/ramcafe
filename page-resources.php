<?php
/**
 * Template Name: Resources Page
 *
 * Displays helpful resources organized as categorized cards
 * for people with memory loss, care partners, and community members.
 *
 * @package RAMCafe
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">

        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header resources-header">
                    <?php the_title( '<h1 class="entry-title screen-reader-text">', '</h1>' ); ?>

                    <?php if ( get_the_content() ) : ?>
                        <div class="resources-intro">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <!-- Helpline Banner -->
                <section class="resource-helpline">
                    <h2 class="resource-helpline-title">
                        <?php esc_html_e( "Alzheimer's Association 24/7 Helpline", 'ramcafe' ); ?>
                    </h2>
                    <a href="tel:8002723900" class="resource-helpline-phone">
                        800-272-3900
                    </a>
                    <p class="resource-helpline-note">
                        <?php esc_html_e( 'Free, confidential support available around the clock', 'ramcafe' ); ?>
                    </p>
                </section>

                <div class="entry-content">

                    <!-- Local & State Organizations -->
                    <section class="resource-category">
                        <h2 class="resource-category-title"><?php esc_html_e( 'Local & State Organizations', 'ramcafe' ); ?></h2>
                        <hr class="section-divider">

                        <div class="resource-grid">

                            <a href="https://www.alz.org/mnnd" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-primary resource-badge"><?php esc_html_e( 'Local Support', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( "Alzheimer's Association", 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'Minnesota/North Dakota chapter providing education, support groups, and advocacy for those affected by dementia.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Visit Website', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                            <a href="https://mn.gov/adresources/" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-primary resource-badge"><?php esc_html_e( 'State Resource', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( 'Minnesota Aging & Disability Resources', 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'State-run resource connecting Minnesotans with aging and disability services, programs, and community support.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Visit Website', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                            <a href="https://www.mncaregiving.org/" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-primary resource-badge"><?php esc_html_e( 'Caregiving', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( 'Minnesota Caregiving Portal', 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'Comprehensive caregiving information, tools, and connections for Minnesota family caregivers.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Visit Website', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                            <a href="https://www.lssmn.org/services/older-adults" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-primary resource-badge"><?php esc_html_e( 'Services', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( 'Lutheran Social Service of Minnesota', 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'Older adult services including caregiver support, companionship, and community programs across Minnesota.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Visit Website', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                        </div>
                    </section>

                    <!-- Guides & Planning -->
                    <section class="resource-category">
                        <h2 class="resource-category-title"><?php esc_html_e( 'Guides & Planning', 'ramcafe' ); ?></h2>
                        <hr class="section-divider">

                        <div class="resource-grid">

                            <a href="<?php echo esc_url( home_url( '/wp-content/uploads/2026/07/9072-Rivers-Area-Memory-Cafe-Check-List-PRINT.pdf' ) ); ?>" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-secondary resource-badge"><?php esc_html_e( 'Checklist', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( 'Memory Changes? The Early Steps', 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'A printable checklist of tests, screenings, and next steps to discuss with your provider when you notice memory changes in a loved one.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Download PDF', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                            <a href="https://order.nia.nih.gov/sites/default/files/2025-08/next-steps-alzheimers-disease-diagnosis.pdf" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-secondary resource-badge"><?php esc_html_e( 'Guide', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( "Next Steps After an Alzheimer's Diagnosis", 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'National Institute on Aging guide to help you understand what to expect and plan after receiving a diagnosis.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Download PDF', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                            <a href="https://order.nia.nih.gov/sites/default/files/2023-03/caregivers-handbook-nia_0.pdf" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-secondary resource-badge"><?php esc_html_e( 'Handbook', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( "The Caregiver's Handbook", 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'National Institute on Aging comprehensive handbook covering the essentials of caregiving for someone with dementia.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Download PDF', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                        </div>
                    </section>

                    <!-- Podcasts & Media -->
                    <section class="resource-category">
                        <h2 class="resource-category-title"><?php esc_html_e( 'Podcasts & Media', 'ramcafe' ); ?></h2>
                        <hr class="section-divider">

                        <div class="resource-grid">

                            <a href="https://www.dementiadiscussions.net/" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-secondary resource-badge"><?php esc_html_e( 'Podcast', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( 'Dementia Discussions Podcast', 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'Conversations and insights about living with dementia, featuring expert interviews and personal stories.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Listen Now', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                            <a href="https://www.youtube.com/playlist?list=PLVl8vTLjje8E8wKXh4PlNeUa9A-9lc88Z" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-secondary resource-badge"><?php esc_html_e( 'Video', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( 'Dementia Care Partner Podcast', 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'Video series dedicated to supporting dementia care partners with practical advice and encouragement.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Watch on YouTube', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                        </div>
                    </section>

                    <!-- CTA Section -->
                    <section class="cta-box">
                        <h2 class="cta-box-title"><?php esc_html_e( 'Need More Help?', 'ramcafe' ); ?></h2>
                        <p class="cta-box-text">
                            <?php esc_html_e( "If you're looking for additional resources or have questions, please don't hesitate to reach out. We're here to help.", 'ramcafe' ); ?>
                        </p>
                        <div class="cta-box-buttons">
                            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="button"><?php esc_html_e( 'Contact Us', 'ramcafe' ); ?></a>
                            <a href="<?php echo esc_url( home_url( '/events' ) ); ?>" class="button button-secondary"><?php esc_html_e( 'View Events', 'ramcafe' ); ?></a>
                        </div>
                    </section>

                </div>

            </article>

            <?php
        endwhile;
        ?>

    </div>
</main>

<?php
get_footer();
