/**
 * Animation system — Neon Zen
 *
 * 21st.dev-style interactive components (vanilla JS):
 * - Scroll reveal (IntersectionObserver) with stagger
 * - Hero parallax + active nav (scroll-position based)
 * - Spotlight cursor glow on cards
 * - Word rotation in hero heading
 * - Testimonial auto-slider
 * - Magnetic cursor on CTA buttons
 * - Animated counters
 *
 * @package Zen_Yoga
 */
( function() {
	'use strict';

	var isTouch = 'ontouchstart' in window;
	var prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

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

	// ---- Hero Parallax + Header + Active Nav ----
	var heroBg = document.querySelector( '.hero__bg-img' );
	var header = document.getElementById( 'site-header' );
	var ticking = false;

	var navLinks = document.querySelectorAll( '.site-header__nav-list a[href^="#"]' );
	var navSections = [];
	var headerOffset = 100;

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

		for ( var i = 0; i < navSections.length; i++ ) {
			if ( navSections[ i ].el.offsetTop <= scrollY ) {
				activeId = navSections[ i ].id;
			}
		}

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

	function onScroll() {
		if ( ticking ) {
			return;
		}
		ticking = true;
		window.requestAnimationFrame( function() {
			var scrollY = window.pageYOffset;

			if ( heroBg && scrollY < window.innerHeight && ! prefersReducedMotion ) {
				heroBg.style.transform = 'translateY(' + ( scrollY * 0.3 ) + 'px) scale(1.05)';
			}

			if ( header ) {
				if ( scrollY > 50 ) {
					header.classList.add( 'is-scrolled' );
				} else {
					header.classList.remove( 'is-scrolled' );
				}
			}

			updateActiveNav();
			ticking = false;
		} );
	}

	window.addEventListener( 'scroll', onScroll, { passive: true } );

	// ==================================================================
	// 21st.dev-style: SPOTLIGHT CURSOR GLOW ON CARDS
	// Tracks mouse position and paints a radial neon glow on the card
	// ==================================================================
	var spotlightCards = document.querySelectorAll( '.spotlight-card' );

	if ( ! isTouch && spotlightCards.length && ! prefersReducedMotion ) {
		spotlightCards.forEach( function( card ) {
			card.addEventListener( 'mousemove', function( e ) {
				var rect = card.getBoundingClientRect();
				var x = e.clientX - rect.left;
				var y = e.clientY - rect.top;
				card.style.setProperty( '--spot-x', x + 'px' );
				card.style.setProperty( '--spot-y', y + 'px' );
			} );

			card.addEventListener( 'mouseleave', function() {
				card.style.removeProperty( '--spot-x' );
				card.style.removeProperty( '--spot-y' );
			} );
		} );
	}

	// ==================================================================
	// 21st.dev-style: WORD ROTATION IN HERO
	// Cycles through an array of words with a smooth flip animation
	// ==================================================================
	var wordRotator = document.querySelector( '.word-rotate' );

	if ( wordRotator && ! prefersReducedMotion ) {
		var words = wordRotator.getAttribute( 'data-words' ).split( '|' );
		var currentWord = 0;
		var intervalMs = parseInt( wordRotator.getAttribute( 'data-interval' ) || '2500', 10 );

		// Set first word
		wordRotator.textContent = words[ 0 ];

		setInterval( function() {
			// Animate out
			wordRotator.classList.add( 'word-rotate--exit' );

			setTimeout( function() {
				currentWord = ( currentWord + 1 ) % words.length;
				wordRotator.textContent = words[ currentWord ];
				wordRotator.classList.remove( 'word-rotate--exit' );
				wordRotator.classList.add( 'word-rotate--enter' );

				setTimeout( function() {
					wordRotator.classList.remove( 'word-rotate--enter' );
				}, 400 );
			}, 350 );
		}, intervalMs );
	}

	// ==================================================================
	// 21st.dev-style: TESTIMONIAL AUTO-SLIDER
	// Auto-cycles through testimonials on mobile, shows all on desktop
	// ==================================================================
	var slider = document.querySelector( '.testimonials__slider' );
	var slides = slider ? slider.querySelectorAll( '.testimonials__card' ) : [];

	if ( slides.length > 1 && ! prefersReducedMotion ) {
		var currentSlide = 0;
		var slideInterval = null;
		var dots = document.querySelectorAll( '.slider-dot' );

		function goToSlide( index ) {
			currentSlide = index;
			slider.style.transform = 'translateX(-' + ( currentSlide * 100 ) + '%)';
			dots.forEach( function( dot, i ) {
				dot.classList.toggle( 'slider-dot--active', i === currentSlide );
			} );
		}

		function nextSlide() {
			goToSlide( ( currentSlide + 1 ) % slides.length );
		}

		function startAutoSlide() {
			stopAutoSlide();
			slideInterval = setInterval( nextSlide, 4000 );
		}

		function stopAutoSlide() {
			if ( slideInterval ) {
				clearInterval( slideInterval );
			}
		}

		// Dot click navigation
		dots.forEach( function( dot, i ) {
			dot.addEventListener( 'click', function() {
				goToSlide( i );
				startAutoSlide(); // Reset timer
			} );
		} );

		// Touch swipe support
		var touchStartX = 0;
		slider.addEventListener( 'touchstart', function( e ) {
			touchStartX = e.touches[ 0 ].clientX;
			stopAutoSlide();
		}, { passive: true } );

		slider.addEventListener( 'touchend', function( e ) {
			var diff = touchStartX - e.changedTouches[ 0 ].clientX;
			if ( Math.abs( diff ) > 50 ) {
				if ( diff > 0 && currentSlide < slides.length - 1 ) {
					goToSlide( currentSlide + 1 );
				} else if ( diff < 0 && currentSlide > 0 ) {
					goToSlide( currentSlide - 1 );
				}
			}
			startAutoSlide();
		}, { passive: true } );

		// Only auto-slide on mobile/tablet
		function checkAutoSlide() {
			if ( window.innerWidth < 1024 ) {
				startAutoSlide();
			} else {
				stopAutoSlide();
			}
		}

		checkAutoSlide();
		window.addEventListener( 'resize', checkAutoSlide );
	}

	// ==================================================================
	// MAGNETIC HOVER ON CTA BUTTONS
	// ==================================================================
	var magneticBtns = document.querySelectorAll( '.btn--primary' );

	if ( ! isTouch && magneticBtns.length && ! prefersReducedMotion ) {
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

	// ==================================================================
	// ANIMATED COUNTERS (data-count)
	// ==================================================================
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
		var duration = 1800;
		var startTime = null;

		function step( timestamp ) {
			if ( ! startTime ) {
				startTime = timestamp;
			}
			var progress = Math.min( ( timestamp - startTime ) / duration, 1 );
			// Spring-like easing for that 21st.dev feel
			var eased = 1 - Math.pow( 1 - progress, 4 );
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
