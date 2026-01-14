<?php
/**
 * Custom search form
 *
 * @package RAMCafe
 * @since 1.0.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="search-field">
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'ramcafe' ); ?></span>
    </label>
    <div class="search-field-wrapper" style="display: flex; gap: var(--spacing-xs);">
        <input type="search"
               id="search-field"
               class="search-field"
               placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'ramcafe' ); ?>"
               value="<?php echo get_search_query(); ?>"
               name="s"
               style="flex: 1;" />
        <button type="submit" class="search-submit button">
            <?php echo esc_html_x( 'Search', 'submit button', 'ramcafe' ); ?>
        </button>
    </div>
</form>
