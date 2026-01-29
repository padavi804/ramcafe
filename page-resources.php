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

                <header class="entry-header" style="text-align: center; margin-bottom: var(--spacing-lg);">
                    <?php the_title( '<h1 class="entry-title screen-reader-text">', '</h1>' ); ?>

                    <?php if ( get_the_content() ) : ?>
                        <div style="max-width: var(--container-narrow); margin: 0 auto; font-size: 1.2rem; line-height: 1.8; color: var(--color-gray-dark);">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <!-- Helpline Banner -->
                <section class="resource-helpline" style="background-color: var(--color-slate-blue); padding: var(--spacing-md) var(--spacing-lg); border-radius: var(--radius-lg); margin-bottom: var(--spacing-xl); text-align: center;">
                    <h2 style="color: var(--color-beige); font-size: 1.5rem; margin: 0 0 var(--spacing-xs) 0;">
                        <?php esc_html_e( "Alzheimer's Association 24/7 Helpline", 'ramcafe' ); ?>
                    </h2>
                    <a href="tel:8002723900" style="font-size: 2rem; color: var(--color-white); font-weight: 700; text-decoration: none;">
                        800-272-3900
                    </a>
                    <p style="color: rgba(255, 255, 255, 0.85); margin: var(--spacing-xs) 0 0 0; font-size: 1rem;">
                        <?php esc_html_e( 'Free, confidential support available around the clock', 'ramcafe' ); ?>
                    </p>
                </section>

                <div class="entry-content">

                    <!-- Local & State Organizations -->
                    <section class="resource-category" style="margin-bottom: var(--spacing-xl);">
                        <h2 class="resource-category-title"><?php esc_html_e( 'Local & State Organizations', 'ramcafe' ); ?></h2>
                        <hr class="section-divider" style="margin: 0 0 var(--spacing-lg) 0;">

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
                    <section class="resource-category" style="margin-bottom: var(--spacing-xl);">
                        <h2 class="resource-category-title"><?php esc_html_e( 'Guides & Planning', 'ramcafe' ); ?></h2>
                        <hr class="section-divider" style="margin: 0 0 var(--spacing-lg) 0;">

                        <div class="resource-grid">

                            <a href="https://bolddementiacaregiving.org/pdfviewer/a-guide-on-advanced-care-planning/?auto_viewer=true&display=true#page=&zoom=page-fit&pagemode=none" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge badge-secondary resource-badge"><?php esc_html_e( 'Guide', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( 'Advanced Care Planning', 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'A guide on advanced care planning resources for people with dementia and their care partners.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'View Guide', 'ramcafe' ); ?>
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
                    <section class="resource-category" style="margin-bottom: var(--spacing-xl);">
                        <h2 class="resource-category-title"><?php esc_html_e( 'Podcasts & Media', 'ramcafe' ); ?></h2>
                        <hr class="section-divider" style="margin: 0 0 var(--spacing-lg) 0;">

                        <div class="resource-grid">

                            <a href="https://www.dementiadiscussions.net/" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge resource-badge" style="background-color: var(--color-olive-green); color: var(--color-white);"><?php esc_html_e( 'Podcast', 'ramcafe' ); ?></span>
                                <h3 class="resource-card-title"><?php esc_html_e( 'Dementia Discussions Podcast', 'ramcafe' ); ?></h3>
                                <p class="resource-card-description"><?php esc_html_e( 'Conversations and insights about living with dementia, featuring expert interviews and personal stories.', 'ramcafe' ); ?></p>
                                <span class="resource-card-link">
                                    <?php esc_html_e( 'Listen Now', 'ramcafe' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </span>
                            </a>

                            <a href="https://www.youtube.com/playlist?list=PLVl8vTLjje8E8wKXh4PlNeUa9A-9lc88Z" class="resource-card" target="_blank" rel="noopener noreferrer">
                                <span class="badge resource-badge" style="background-color: var(--color-olive-green); color: var(--color-white);"><?php esc_html_e( 'Video', 'ramcafe' ); ?></span>
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
                    <section class="get-involved" style="background-color: var(--color-beige); padding: var(--spacing-lg); border-radius: var(--radius-lg); text-align: center; margin-bottom: var(--spacing-lg);">
                        <h2 style="color: var(--color-terracotta); margin-top: 0;"><?php esc_html_e( 'Need More Help?', 'ramcafe' ); ?></h2>
                        <p style="font-size: 1.2rem; margin-bottom: var(--spacing-md); font-weight: 500; line-height: 1.8;">
                            <?php esc_html_e( "If you're looking for additional resources or have questions, please don't hesitate to reach out. We're here to help.", 'ramcafe' ); ?>
                        </p>
                        <div style="display: flex; gap: var(--spacing-sm); justify-content: center; flex-wrap: wrap;">
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
