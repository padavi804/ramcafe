/**
 * Donation notice modal.
 *
 * Temporary: while the online donation portal is under construction,
 * clicking any "Donate" / "Make a Donation" link shows a mailing-address
 * notice instead of navigating. Remove this file (and its enqueue in
 * functions.php) when the portal goes live.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		var modal = document.getElementById( 'donation-notice-modal' );
		if ( ! modal ) {
			return;
		}

		var closeButton = modal.querySelector( '.donation-notice-close' );
		var backdrop = modal.querySelector( '.donation-notice-backdrop' );
		var lastFocused = null;

		function openModal() {
			lastFocused = document.activeElement;
			modal.hidden = false;
			document.body.classList.add( 'donation-notice-open' );
			closeButton.focus();
		}

		function closeModal() {
			modal.hidden = true;
			document.body.classList.remove( 'donation-notice-open' );
			if ( lastFocused ) {
				lastFocused.focus();
			}
		}

		var triggers = document.querySelectorAll(
			'.donate-banner-button, .menu-item-donate a, .donate-callout .button'
		);

		triggers.forEach( function ( trigger ) {
			trigger.addEventListener( 'click', function ( event ) {
				event.preventDefault();
				openModal();
			} );
		} );

		closeButton.addEventListener( 'click', closeModal );
		backdrop.addEventListener( 'click', closeModal );

		document.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Escape' && ! modal.hidden ) {
				closeModal();
			}
		} );
	} );
} )();
