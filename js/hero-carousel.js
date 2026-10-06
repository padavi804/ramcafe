/**
 * Hero Photo Carousel
 * Crossfades between homepage photos with arrows, dots, and an 8-second autoplay
 */

( function() {
    const carousel = document.querySelector( '.hero-carousel' );

    if ( ! carousel ) {
        return;
    }

    const slides = carousel.querySelectorAll( '.hero-carousel-slide' );
    const dots = carousel.querySelectorAll( '.hero-carousel-dot' );
    const prevButton = carousel.querySelector( '.hero-carousel-prev' );
    const nextButton = carousel.querySelector( '.hero-carousel-next' );

    // Return early if there's only one photo
    if ( slides.length < 2 ) {
        return;
    }

    const AUTOPLAY_DELAY = 8000;
    const reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' );

    let current = 0;
    let timer = null;
    let isHovered = false;
    let hasFocus = false;

    function goTo( index ) {
        current = ( index + slides.length ) % slides.length;

        slides.forEach( function( slide, i ) {
            const active = i === current;
            slide.classList.toggle( 'is-active', active );

            if ( active ) {
                slide.removeAttribute( 'aria-hidden' );
            } else {
                slide.setAttribute( 'aria-hidden', 'true' );
            }
        } );

        dots.forEach( function( dot, i ) {
            if ( i === current ) {
                dot.setAttribute( 'aria-current', 'true' );
            } else {
                dot.removeAttribute( 'aria-current' );
            }
        } );
    }

    function stop() {
        clearInterval( timer );
        timer = null;
    }

    // (Re)start the countdown so a manual change always gets a full 8 seconds
    function start() {
        stop();

        if ( isHovered || hasFocus || document.hidden || reducedMotion.matches ) {
            return;
        }

        timer = setInterval( function() {
            goTo( current + 1 );
        }, AUTOPLAY_DELAY );
    }

    prevButton.addEventListener( 'click', function() {
        goTo( current - 1 );
        start();
    } );

    nextButton.addEventListener( 'click', function() {
        goTo( current + 1 );
        start();
    } );

    dots.forEach( function( dot, i ) {
        dot.addEventListener( 'click', function() {
            goTo( i );
            start();
        } );
    } );

    // Left/right arrow keys while the carousel has focus
    carousel.addEventListener( 'keydown', function( event ) {
        if ( event.key === 'ArrowLeft' ) {
            event.preventDefault();
            goTo( current - 1 );
        } else if ( event.key === 'ArrowRight' ) {
            event.preventDefault();
            goTo( current + 1 );
        }
    } );

    // Pause while a mouse hovers over the carousel (touch taps don't count)
    carousel.addEventListener( 'pointerenter', function( event ) {
        if ( event.pointerType === 'mouse' ) {
            isHovered = true;
            stop();
        }
    } );

    carousel.addEventListener( 'pointerleave', function( event ) {
        if ( event.pointerType === 'mouse' ) {
            isHovered = false;
            start();
        }
    } );

    // Pause while a keyboard user is inside the carousel. Mouse clicks also
    // focus the buttons, so only count focus that the browser would outline.
    carousel.addEventListener( 'focusin', function( event ) {
        if ( event.target.matches( ':focus-visible' ) ) {
            hasFocus = true;
            stop();
        }
    } );

    carousel.addEventListener( 'focusout', function( event ) {
        if ( ! carousel.contains( event.relatedTarget ) ) {
            hasFocus = false;
            start();
        }
    } );

    // Don't advance while the tab is in the background
    document.addEventListener( 'visibilitychange', start );
    reducedMotion.addEventListener( 'change', start );

    start();
} )();
