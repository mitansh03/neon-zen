/**
 * Animation system — Neon Zen
 *
 * Features:
 * - Scroll reveal (IntersectionObserver) with stagger support
 * - Hero parallax background shift
 * - Active nav section highlighting
 * - Header shrink on scroll
 * - Magnetic cursor effect on CTA buttons
 *
 * Add class "reveal" to any element for default fade-up.
 * Variants: "reveal--left", "reveal--right", "reveal--scale", "reveal--fade"
 *
 * @package Zen_Yoga
 */
( function() {
	'use strict';

	// ---- Scroll Reveal ----
	var reveals = document.querySelectorAll( '.reveal' );

	if ( reveals.length ) {
		var revealObserver = new IntersectionObserver(
			function( entries ) {
				entries.forEach( function( entry ) {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'is-visible' );
						revealObserver.unobserve( entry.target );
					}
				} );
			},
			{
				threshold: 0.12,
				rootMargin: '0px 0px -60px 0px',
			}
		);

		reveals.forEach( function( el ) {
			revealObserver.observe( el );
		} );
	}

	// ---- Hero Parallax ----
	var heroBg = document.querySelector( '.hero__bg-img' );
	var header = document.getElementById( 'site-header' );
	var ticking = false;

	function onScroll() {
		if ( ticking ) {
			return;
		}
		ticking = true;
		window.requestAnimationFrame( function() {
			var scrollY = window.pageYOffset;

			// Parallax on hero image.
			if ( heroBg && scrollY < window.innerHeight ) {
				heroBg.style.transform = 'translateY(' + ( scrollY * 0.3 ) + 'px) scale(1.05)';
			}

			// Header background solidify on scroll.
			if ( header ) {
				if ( scrollY > 50 ) {
					header.classList.add( 'is-scrolled' );
				} else {
					header.classList.remove( 'is-scrolled' );
				}
			}

			// Active nav highlight.
			updateActiveNav();

			ticking = false;
		} );
	}

	window.addEventListener( 'scroll', onScroll, { passive: true } );

	// ---- Active Nav Highlight (scroll-position based) ----
	var navLinks = document.querySelectorAll( '.site-header__nav-list a[href^="#"]' );
	var navSections = [];
	var headerOffset = 100; // Account for fixed header height.

	// Build ordered list of sections that have matching nav links.
	navLinks.forEach( function( link ) {
		var id = link.getAttribute( 'href' ).substring( 1 );
		var section = document.getElementById( id );
		if ( section ) {
			navSections.push( { id: id, el: section, link: link } );
		}
	} );

	var currentActiveId = '';

	function updateActiveNav() {
		var scrollY = window.pageYOffset + headerOffset;
		var activeId = '';

		// Walk through sections top-to-bottom; the last one whose top
		// is above our scroll position wins (= the one we're currently in).
		for ( var i = 0; i < navSections.length; i++ ) {
			if ( navSections[ i ].el.offsetTop <= scrollY ) {
				activeId = navSections[ i ].id;
			}
		}

		// If scrolled to the very bottom, activate the last nav section.
		if ( window.innerHeight + window.pageYOffset >= document.body.scrollHeight - 50 ) {
			activeId = navSections[ navSections.length - 1 ].id;
		}

		if ( activeId !== currentActiveId ) {
			currentActiveId = activeId;
			navLinks.forEach( function( link ) {
				link.classList.remove( 'is-active' );
			} );
			navSections.forEach( function( item ) {
				if ( item.id === activeId ) {
					item.link.classList.add( 'is-active' );
				}
			} );
		}
	}

	// ---- Magnetic Hover on CTA Buttons ----
	var magneticBtns = document.querySelectorAll( '.btn--primary' );
	var isTouch = 'ontouchstart' in window;

	if ( ! isTouch && magneticBtns.length ) {
		magneticBtns.forEach( function( btn ) {
			btn.addEventListener( 'mousemove', function( e ) {
				var rect = btn.getBoundingClientRect();
				var x = e.clientX - rect.left - rect.width / 2;
				var y = e.clientY - rect.top - rect.height / 2;
				btn.style.transform = 'translate(' + ( x * 0.15 ) + 'px, ' + ( y * 0.15 ) + 'px)';
			} );

			btn.addEventListener( 'mouseleave', function() {
				btn.style.transform = '';
			} );
		} );
	}

	// ---- Counter Animation for Stats (if any) ----
	var counters = document.querySelectorAll( '[data-count]' );

	if ( counters.length ) {
		var countObserver = new IntersectionObserver(
			function( entries ) {
				entries.forEach( function( entry ) {
					if ( entry.isIntersecting ) {
						animateCounter( entry.target );
						countObserver.unobserve( entry.target );
					}
				} );
			},
			{ threshold: 0.5 }
		);

		counters.forEach( function( el ) {
			countObserver.observe( el );
		} );
	}

	function animateCounter( el ) {
		var target = parseInt( el.getAttribute( 'data-count' ), 10 );
		var duration = 1500;
		var start = 0;
		var startTime = null;

		function step( timestamp ) {
			if ( ! startTime ) {
				startTime = timestamp;
			}
			var progress = Math.min( ( timestamp - startTime ) / duration, 1 );
			var eased = 1 - Math.pow( 1 - progress, 3 );
			el.textContent = Math.floor( eased * target );
			if ( progress < 1 ) {
				window.requestAnimationFrame( step );
			} else {
				el.textContent = target;
			}
		}

		window.requestAnimationFrame( step );
	}
} )();
