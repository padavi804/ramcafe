/**
 * Navigation Menu Toggle
 * Handles mobile menu functionality
 */

( function() {
    const menuToggle = document.querySelector( '.menu-toggle' );
    const navigation = document.querySelector( '.main-navigation' );

    // Return early if menu toggle doesn't exist
    if ( ! menuToggle ) {
        return;
    }

    // Toggle menu on button click
    menuToggle.addEventListener( 'click', function() {
        navigation.classList.toggle( 'toggled' );

        // Update aria-expanded for accessibility
        const expanded = menuToggle.getAttribute( 'aria-expanded' ) === 'true' || false;
        menuToggle.setAttribute( 'aria-expanded', ! expanded );
    } );

    // Close menu when clicking outside
    document.addEventListener( 'click', function( event ) {
        const isClickInside = navigation.contains( event.target ) || menuToggle.contains( event.target );

        if ( ! isClickInside && navigation.classList.contains( 'toggled' ) ) {
            navigation.classList.remove( 'toggled' );
            menuToggle.setAttribute( 'aria-expanded', 'false' );
        }
    } );

    // Close menu on escape key
    document.addEventListener( 'keydown', function( event ) {
        if ( event.key === 'Escape' && navigation.classList.contains( 'toggled' ) ) {
            navigation.classList.remove( 'toggled' );
            menuToggle.setAttribute( 'aria-expanded', 'false' );
            menuToggle.focus();
        }
    } );
} )();

