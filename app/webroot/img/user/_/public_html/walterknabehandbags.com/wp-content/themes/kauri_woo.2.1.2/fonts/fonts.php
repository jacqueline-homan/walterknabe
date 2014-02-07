<?php
global $data;

$overrides = $data['styles_overrides'];



if ( isset($overrides['body_font']) ) {
	$customize_body_font = true;
}else{
	$customize_body_font = false;
}

if ( isset($overrides['headings']) ) {
	$customize_headings = true;
}else{
	$customize_headings = false;
}

$alt_stylesheet = $data['alt_stylesheet'];


$headers_font = $data['headers_font']['face-heading'];


if( $customize_headings ) :

	echo '<link href="http://fonts.googleapis.com/css?family='; 

	if( $headers_font == 'Open Sans' ) :
		echo 'Open+Sans:300italic,400italic,700italic,400,300,700';
	elseif ( $headers_font == 'Open Sans Condensed' ) :
		echo 'Open+Sans+Condensed:300,700';
	elseif ( $headers_font == 'Droid Sans' ) :
		echo 'Droid+Sans:400,400italic,700,900';
	elseif ( $headers_font == 'Droid Serif' ) :
		echo 'Droid+Serif:400,700,400italic,700italic';
	elseif ( $headers_font == 'Cabin' ) :
		echo 'Cabin:400,700';
	elseif ( $headers_font == 'News Cycle' ) :
		echo 'News+Cycle';
	elseif ( $headers_font == 'Istok Web' ) :
		echo 'Istok+Web:400,700,400italic';
	elseif ( $headers_font == 'Ubuntu' ) :
		echo 'Ubuntu:400,400italic,700,700italic';
	elseif ( $headers_font == 'Terminal Dosis' ) :
		echo 'Terminal+Dosis';
	elseif ( $headers_font == 'Marmelad' ) :
		echo 'Marmelad';
	elseif ( $headers_font == 'Jockey One' ) :
		echo 'Jockey+One';
	elseif ( $headers_font == 'PT Sans' ) :
		echo 'PT+Sans:400,700,400italic';
	elseif ( $headers_font == 'PT Sans Narrow' ) :
		echo 'PT+Sans+Narrow:400,700';
	elseif ( $headers_font == 'Cabin Condensed' ) :
		echo 'Cabin+Condensed:400,700';
	elseif ( $headers_font == 'Rationale' ) :
		echo 'Rationale';
	elseif ( $headers_font == 'Ubuntu Condensed' ) :
		echo 'Ubuntu+Condensed';
	elseif ( $headers_font == 'Medula One' ) :
		echo 'Medula+One';
	elseif ( $headers_font == 'Yanone Kaffeesatz' ) :
		echo 'Yanone+Kaffeesatz:400,700';
	elseif ( $headers_font == 'Francois One' ) :
		echo 'Francois+One';
	elseif ( $headers_font == 'Cuprum' ) :
		echo 'Cuprum';
	elseif ( $headers_font == 'Philosopher' ) :
		echo 'Philosopher';
	elseif ( $headers_font == 'Muli' ) :
		echo 'Muli:400,400italic';
	elseif ( $headers_font == 'Oxygen' ) :
		echo 'Oxygen';
	elseif ( $headers_font == 'Pontano Sans' ) :
		echo 'Pontano+Sans';
	elseif ( $headers_font == 'Maven Pro' ) :
		echo 'Maven+Pro:400,700';
	elseif ( $headers_font == 'Lustria' ) :
		echo 'Lustria';
	elseif ( $headers_font == 'Macondo Swash Caps' ) :
		echo 'Macondo+Swash+Caps';	
	elseif ( $headers_font == 'Simonetta' ) :
		echo 'Simonetta';
	elseif ( $headers_font == 'Bitter' ) :
		echo 'Bitter';
	elseif ( $headers_font == 'PT Serif' ) :
		echo 'PT+Serif:400,700,400italic,700italic';
	elseif ( $headers_font == 'Lobster' ) :
		echo 'Lobster';
	elseif ( $headers_font == 'Sevillana' ) :
		echo 'Sevillana';	
	elseif ( $headers_font == 'Gloria Hallelujah' ) :
		echo 'Gloria+Hallelujah';
	
	elseif ( $headers_font == 'Goudy Bookletter 1911' ) :
		echo 'Goudy+Bookletter+1911';
	elseif ( $headers_font == 'IM Fell English' ) :
		echo 'IM+Fell+English:400,400italic';
	elseif ( $headers_font == 'IM Fell English SC' ) :
		echo 'IM+Fell+English+SC';
	elseif ( $headers_font == 'Brawler' ) :
		echo 'Brawler';
	elseif ( $headers_font == 'Playfair Display' ) :
		echo 'Playfair+Display:400,400italic';
	elseif ( $headers_font == 'Sorts Mill Goudy' ) :
		echo 'Sorts+Mill+Goudy:400,400italic';
	elseif ( $headers_font == 'Lora' ) :
		echo 'Lora:400,700,400italic,700italic';
	elseif ( $headers_font == 'Tinos' ) :
		echo 'Tinos:400,700,400italic,700italic';
	elseif ( $headers_font == 'Oranienbaum' ) :
		echo 'Oranienbaum';
	elseif ( $headers_font == 'Esteban' ) :
		echo 'Esteban';
	elseif ( $headers_font == 'Quattrocento' ) :
		echo 'Quattrocento:400,700';
	elseif ( $headers_font == 'Junge' ) :
		echo 'Junge';
	elseif ( $headers_font == 'Balthazar' ) :
		echo 'Balthazar';
	elseif ( $headers_font == 'Dosis' ) :
		echo 'Dosis:200,300,400,500,600,700,800';
	elseif ( $headers_font == 'Lato' ) :
		echo 'Lato:300,400,700,300italic,400italic,700italic';
	elseif ( $headers_font == 'Federo' ) :
		echo 'Federo';
	elseif ( $headers_font == 'Voltaire' ) :
		echo 'Voltaire';
	elseif ( $headers_font == 'Amaranth' ) :
		echo 'Amaranth:400,400italic,700,700italic';
	elseif ( $headers_font == 'Oswald' ) :
		echo 'Oswald';
	elseif ( $headers_font == 'Nunito' ) :
		echo 'Nunito:400,700,300';
	elseif ( $headers_font == 'Shanti' ) :
		echo 'Shanti';
	
	endif;
	
	echo '&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';

elseif ( !$customize_headings &&  $alt_stylesheet == 'default.css' ): // if no $headers_font

	echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';

elseif ( !$customize_headings &&  $alt_stylesheet == 'dark.css' ): // if no $headers_font

	echo '<link href="http://fonts.googleapis.com/css?family=Cuprum&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';

elseif ( !$customize_headings &&  $alt_stylesheet == 'dark_blue.css' ): // if no $headers_font

	echo '<link href="http://fonts.googleapis.com/css?family=Rationale&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';
	
elseif ( !$customize_headings &&  $alt_stylesheet == 'light_brown.css' ): // if no $headers_font

	echo '<link href="http://fonts.googleapis.com/css?family=Macondo+Swash+Caps&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';
	
endif; // if $headers_font

?>
<?php 

$body_font = $data['body_font']['face'];

if( $customize_body_font ) :

	echo '<link href="http://fonts.googleapis.com/css?family='; 

	if( $body_font == 'Open Sans' ) :
		echo 'Open+Sans:300italic,400italic,700italic,400,300,700';
	elseif ( $body_font == 'Open Sans Condensed' ) :
		echo 'Open+Sans+Condensed:300,700';
	elseif ( $body_font == 'Droid Sans' ) :
		echo 'Droid+Sans:400,400italic,700,900';
	elseif ( $body_font == 'Droid Serif' ) :
		echo 'Droid+Serif:400,700,400italic,700italic';
	elseif ( $body_font == 'Cabin' ) :
		echo 'Cabin:400,700';
	elseif ( $body_font == 'News Cycle' ) :
		echo 'News+Cycle';
	elseif ( $body_font == 'Istok Web' ) :
		echo 'Istok+Web:400,700,400italic';
	elseif ( $body_font == 'Ubuntu' ) :
		echo 'Ubuntu:400,400italic,700,700italic';
	elseif ( $body_font == 'Terminal Dosis' ) :
		echo 'Terminal+Dosis';
	elseif ( $body_font == 'Marmelad' ) :
		echo 'Marmelad';
	elseif ( $body_font == 'Jockey One' ) :
		echo 'Jockey+One';
	elseif ( $body_font == 'PT Sans' ) :
		echo 'PT+Sans:400,700,400italic';
	elseif ( $body_font == 'PT Sans Narrow' ) :
		echo 'PT+Sans+Narrow:400,700';
	elseif ( $body_font == 'Cabin Condensed' ) :
		echo 'Cabin+Condensed:400,700';
	elseif ( $body_font == 'Rationale' ) :
		echo 'Rationale';
	elseif ( $body_font == 'Ubuntu Condensed' ) :
		echo 'Ubuntu+Condensed';
	elseif ( $body_font == 'Medula One' ) :
		echo 'Medula+One';
	elseif ( $body_font == 'Yanone Kaffeesatz' ) :
		echo 'Yanone+Kaffeesatz:400,700';
	elseif ( $body_font == 'Francois One' ) :
		echo 'Francois+One';
	elseif ( $body_font == 'Cuprum' ) :
		echo 'Cuprum';
	elseif ( $body_font == 'Philosopher' ) :
		echo 'Philosopher';
	elseif ( $body_font == 'Muli' ) :
		echo 'Muli:400,400italic';
	elseif ( $body_font == 'Oxygen' ) :
		echo 'Oxygen';
	elseif ( $body_font == 'Pontano Sans' ) :
		echo 'Pontano+Sans';
	elseif ( $body_font == 'Maven Pro' ) :
		echo 'Maven+Pro:400,700';
	elseif ( $body_font == 'Lustria' ) :
		echo 'Lustria';
	elseif ( $body_font == 'Macondo Swash Caps' ) :
		echo 'Macondo+Swash+Caps';
	elseif ( $body_font == 'Simonetta' ) :
		echo 'Simonetta';
	elseif ( $body_font == 'Bitter' ) :
		echo 'Bitter';
	elseif ( $body_font == 'PT Serif' ) :
		echo 'PT+Serif:400,700,400italic,700italic';
	elseif ( $body_font == 'Lobster') :
		echo 'Lobster';
	elseif ( $body_font == 'Sevillana') :
		echo 'Sevillana';	
	elseif ( $body_font == 'Gloria Hallelujah') :
		echo 'Gloria+Hallelujah';

	elseif ( $body_font == 'Goudy Bookletter 1911' ) :
		echo 'Goudy+Bookletter+1911';
	elseif ( $body_font == 'IM Fell English' ) :
		echo 'IM+Fell+English:400,400italic';
	elseif ( $body_font == 'IM Fell English SC' ) :
		echo 'IM+Fell+English+SC';
	elseif ( $body_font == 'Brawler' ) :
		echo 'Brawler';
	elseif ( $body_font == 'Playfair Display' ) :
		echo 'Playfair+Display:400,400italic';
	elseif ( $body_font == 'Sorts Mill Goudy' ) :
		echo 'Sorts+Mill+Goudy:400,400italic';
	elseif ( $body_font == 'Lora' ) :
		echo 'Lora:400,700,400italic,700italic';
	elseif ( $body_font == 'Tinos' ) :
		echo 'Tinos:400,700,400italic,700italic';
	elseif ( $body_font == 'Oranienbaum' ) :
		echo 'Oranienbaum';
	elseif ( $body_font == 'Esteban' ) :
		echo 'Esteban';
	elseif ( $body_font == 'Quattrocento' ) :
		echo 'Quattrocento:400,700';
	elseif ( $body_font == 'Junge' ) :
		echo 'Junge';
	elseif ( $body_font == 'Balthazar' ) :
		echo 'Balthazar';
	elseif ( $body_font == 'Dosis' ) :
		echo 'Dosis:200,300,400,500,600,700,800';
	elseif ( $body_font == 'Lato' ) :
		echo 'Lato:300,400,700,300italic,400italic,700italic';
	elseif ( $body_font == 'Federo' ) :
		echo 'Federo';
	elseif ( $body_font == 'Voltaire' ) :
		echo 'Voltaire';
	elseif ( $body_font == 'Amaranth' ) :
		echo 'Amaranth:400,400italic,700,700italic';
	elseif ( $body_font == 'Oswald' ) :
		echo 'Oswald';
	elseif ( $body_font == 'Nunito' ) :
		echo 'Nunito:400,700,300';
	elseif ( $body_font == 'Shanti' ) :
		echo 'Shanti';
		
	endif;
		echo '&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';

		
elseif ( !$customize_body_font &&  $alt_stylesheet == 'default.css' ):
	
	echo '<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,400italic,700,900&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';
			
elseif ( !$customize_body_font &&  $alt_stylesheet == 'dark.css' ):
	
	echo '<link href="http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';
			
elseif ( !$customize_body_font &&  $alt_stylesheet == 'dark_blue.css' ):
	
	echo '<link href="http://fonts.googleapis.com/css?family=Cabin:400,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';
			
elseif ( !$customize_body_font &&  $alt_stylesheet == 'light_brown.css' ):
	
	echo '<link href="http://fonts.googleapis.com/css?family=Muli&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';
	
endif; // end if $body_font

?>