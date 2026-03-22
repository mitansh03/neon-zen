/**
 * Contact form modal — auto-open on page load + manual open/close.
 *
 * Auto-opens after a short delay for Meta ad landing page conversions.
 * Dismissed state is stored in sessionStorage so it only shows once per visit.
 *
 * @package Zen_Yoga
 */
( function() {
	'use strict';

	const modal = document.getElementById( 'contact-modal' );

	if ( ! modal ) {
		return;
	}

	const openers = document.querySelectorAll( '[data-modal-open]' );
	const closers = modal.querySelectorAll( '[data-modal-close]' );
	const content = modal.querySelector( '.modal__content' );
	const firstInput = modal.querySelector( 'input' );
	const DISMISSED_KEY = 'neonzen_modal_dismissed';

	function openModal( e ) {
		if ( e ) {
			e.preventDefault();
		}
		modal.setAttribute( 'aria-hidden', 'false' );
		modal.classList.add( 'is-open' );
		document.body.style.overflow = 'hidden';

		if ( firstInput ) {
			firstInput.focus();
		}
	}

	function closeModal() {
		modal.setAttribute( 'aria-hidden', 'true' );
		modal.classList.remove( 'is-open' );
		document.body.style.overflow = '';
		sessionStorage.setItem( DISMISSED_KEY, 'true' );
	}

	// Manual open buttons (Book Now, Start Your Journey).
	openers.forEach( function( btn ) {
		btn.addEventListener( 'click', openModal );
	} );

	// Close buttons and backdrop.
	closers.forEach( function( btn ) {
		btn.addEventListener( 'click', closeModal );
	} );

	// Close on Escape key.
	document.addEventListener( 'keydown', function( e ) {
		if ( e.key === 'Escape' && modal.classList.contains( 'is-open' ) ) {
			closeModal();
		}
	} );

	// Prevent clicks inside modal content from closing.
	content.addEventListener( 'click', function( e ) {
		e.stopPropagation();
	} );

	// Auto-open on page load (only once per session).
	if ( ! sessionStorage.getItem( DISMISSED_KEY ) ) {
		setTimeout( function() {
			openModal( null );
		}, 1500 );
	}
} )();
