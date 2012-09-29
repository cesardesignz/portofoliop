<?php

define("kContactEmail","contacto@cesarzdesignz.com");


?>

<!DOCTYPE html>
<html>
    <head>
        
        <link href="http://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <section id="info">
            
            <aside>
                <p>Quotes: <a href="http://butdoesitfloat.com/" target="_blank">butdoesitfloat.com</a></p>
            </aside>
        </section>
        <section class="quotes"></section>
        <script src="js/jquery.min.js"></script>
        <script src="js/foldscroll.js"></script>
        <script src="js/quotes.js"></script>
        <script type="text/javascript">

            $(function() {

                var limit = 15;
                var $container = $( '.quotes' );

                // Populate
                for ( var i = 0, n = Math.min( limit, quotes.length ); i < n; i++ ) {

                    $container.append(
                        '<article>' +
                            '<p>' + quotes[i].quote + '</p>' +
                            '<em>' + quotes[i].author + '</em>' +
                        '</article>');
                }

                // Call the foldscroll plugin
                $container.foldscroll({
                    perspective: 700,
                    margin: '220px'
                });
            });

        </script>
    </body>
</html>

	
	
</head>

<body>


<script language="text/javascript">


(function($) {

    $.fn.foldscroll = function( options ) {

        // Constants
        var PI = Math.PI;
        var HALF_PI = PI / 2;

        // Merge options & defaults
        var opts = $.extend( {}, $.fn.foldscroll.defaults, options );

        // Transformation template
        var rot = 'perspective(' + opts.perspective + 'px) rotateX(θrad)';

        // Main plugin loop
        return this.each( function () {

            var $this = $( this );
            var $kids = $this.children();
            var $item;
            var $shading;

            if ( opts.shading ) {

                // Create an overlay for shading
                $shading = $( '<span class="shading"/>' ).css({
                    background: opts.shading,
                    position: 'absolute',
                    opacity: 0.0,
                    height: '100%',
                    width: '100%',
                    left: 0,
                    top: 0
                });

                // Add shading to each child
                $kids.each( function() {

                    $item = $(this);
                    $item.css( prefix({
                        'backface-visibility': 'hidden',
                        'transform-style': 'preserve-3d' // Fixes perspective in FF 10+
                    }));

                    // Make sure shading isn't already applied
                    if ( !$item.data( '_shading' ) ) {

                        $shading = $shading.clone();

                        // Prepare element
                        $item.css( 'position', 'relative' );
                        $item.data( '_shading', $shading );
                        $item.append( $shading );
                    }
                });
            }

            // Prepare container
            $this.css( prefix({ 'backface-visibility': 'hidden' }));
            $this.css({ overflow: 'scroll' });

            $this.on( 'scroll', function() {

                // Store scroll amount
                var st = $this.scrollTop();

                // Store viewport properties
                var vt = $this.offset().top - st;
                var vh = $this.outerHeight();
                var vb = vt + vh;

                // Compute margin
                var m = parseFloat( opts.margin );
                m = m <= 1.0 ? Math.min( m, 0.5 ) : m / vh;

                // Update children
                $kids.each( function( index, el ) {

                    $item = $(this);

                    // Remove current transform
                    $item.css( prefix({ transform: 'none' }) );

                    // Cache shading element if it exists
                    $shading = $item.find( '.shading' ).hide();

                    // Store element properties
                    var et = $item.offset().top - st;
                    var eh = Math.max( m * vh, $item.outerHeight() );
                    var eb = et + eh;

                    // Highest start value
                    var a = Math.max( vt, et );

                    // Lowest end value
                    var b = Math.min( vb, eb );

                    // Do line segments overlap?
                    var show = a < b;

                    // If there's overlap
                    if ( show ) {

                        // compute overlap
                        var o = b - a;
                        var p = o / vh;

                        if ( p < m ) {

                            // normalise
                            p = p / m;

                            // direction
                            var d = et < vt ? 1 : -1;

                            // rotation
                            var t = ( 1 - p ) * HALF_PI * d;

                            // Contrain rotation
                            if ( Math.abs(t) <= HALF_PI ) {

                                // Apply rotation
                                $item.css( prefix({
                                    'transform-origin': '50%' + ( et < vt ? '100%' : '0%' ),
                                    'transform': rot.replace( 'θ', t )
                                }));

                                // Update shading overlay
                                if ( opts.shading )
                                    $shading.css( 'opacity', 1.0 - p ).show();

                            } else {

                                show = false;
                            }
                        }
                    }

                    // Hide items outside of the viewport
                    $item.css( 'visibility', show ? 'visible' : 'hidden' );
                });
            });

            // Set initial state
            $this.trigger( 'scroll' );
        });
    };

    // CSS3 vendor prefix helper
    function prefix( obj ) {

        var key, val;

        for ( key in obj ) {

            val = obj[ key ];

            obj[ '-webkit-' + key ] = val;
            obj[ '-moz-' + key ] = val;
            obj[ '-ms-' + key ] = val;
            obj[ '-o-' + key ] = val;
        }

        return obj;
    }

    // Default options
    $.fn.foldscroll.defaults = {

        // Perspective to apply to rotating elements
        perspective: 600,

        // Default shading to apply (null => no shading)
        shading: 'rgba(0,0,0,0.2)',

        // Area of rotation (fraction or pixel value)
        margin: 0.2
    };

})( jQuery );

$( '.quotes' ).foldscroll({
  perspective: 900,
  margin: '220px'
});
</script>
<section class="quotes">
    <article>
        <p>Technique is just a means of arriving at a statement</p>
        <em>Jackson Pollock</em>
    </article>
    <article>
        <p>Perhaps a human language is possible in which the intent of meaning is actually beheld in three-dimensional space</p>
        <em>Terence Mckenna</em>
    </article>
    <article>
        <p>All the virgin eyes in the world are made of glass</p>
        <em>Mina Loy</em>
    </article>
    <article>
        <p>We are intensely aware of man as a machine and the body as a mechanism</p>
        <em>Oskar Schlemmer</em>
    </article>
    <article>
        <p>It is already too late, and it will go on being even later</p>
        <em>Alison Lurie</em>
    </article>
    <article>
        <p>Science cannot be stopped. Man will gather knowledge no matter what the consequences - and we cannot predict what they will be</p>
        <em>Linus Pauling</em>
    </article>
    <article>
        <p>No one can witness the fall of the ice palace. It takes place at night, after all the children are in bed.</p>
        <em>Tarjei Vesaas</em>
    </article>
    <article>
        <p>The biological object is made of time as much as it is made of space and matter</p>
        <em>Terence McKenna</em>
    </article>
    <article>
        <p>The union of the mathematician with the poet, fervor with measure, passion with correctness, this surely is the ideal</p>
        <em>William James</em>
    </article>
    <article>
        <p>Mind is a captive of the body</p>
        <em>Camille Paglia</em>
    </article>
    <article>
        <p>Your order is meaningless, my chaos is significant</p>
        <em>Nathaniel West via Amos Vogel</em>
    </article>
    <article>
        <p>Every thing existing on the physical plane is an exteriorization of thought, which must be balanced through the one who issued the thought, and in accordance with that one's responsibility, at the conjunction of time, condition, and place</p>
        <em>Harold W</em>
    </article>
    <article>
        <p>I wanted to be alone in quite an unusual, new way. The very opposite of what you are thinking: namely, without myselfâ€¦</p>
        <em>Pirandello</em>
    </article>
    <article>
        <p>I love forms beyond my own, and regret the borders between us</p>
        <em>Loren Eiseley</em>
    </article>
    <article>
        <p>The bedrock basic stratum of reality is irreality; the universe is irrational because it is built not on mere shifting sand - but on that which is not</p>
        <em>Philip K Dick</em>
    </article>
</section>  
</body>
</html>