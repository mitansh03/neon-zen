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

			ticking = false;
		} );
	}

	window.addEventListener( 'scroll', onScroll, { passive: true } );

	// ---- Active Nav Highlight ----
	var sections = document.querySelectorAll( '.section[id]' );
	var navLinks = document.querySelectorAll( '.site-header__nav-list a[href^="#"]' );

	if ( sections.length && navLinks.length ) {
		var navObserver = new IntersectionObserver(
			function( entries ) {
				entries.forEach( function( entry ) {
					if ( entry.isIntersecting ) {
						var id = entry.target.getAttribute( 'id' );
						navLinks.forEach( function( link ) {
							link.classList.remove( 'is-active' );
							if ( link.getAttribute( 'href' ) === '#' + id ) {
								link.classList.add( 'is-active' );
							}
						} );
					}
				} );
			},
			{
				threshold: 0.3,
				rootMargin: '-80px 0px -50% 0px',
			}
		);

		sections.forEach( function( section ) {
			navObserver.observe( section );
		} );
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
