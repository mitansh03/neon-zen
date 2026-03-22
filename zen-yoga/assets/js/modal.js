/**
 * Contact form modal — open/close logic.
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
	const firstInput = modal.querySelector( 'input, select, button' );

	function openModal( e ) {
		e.preventDefault();
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
	}

	openers.forEach( function( btn ) {
		btn.addEventListener( 'click', openModal );
	} );

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
} )();
