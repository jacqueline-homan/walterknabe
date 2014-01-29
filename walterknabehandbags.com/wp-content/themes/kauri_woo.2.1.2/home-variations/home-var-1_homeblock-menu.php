


<div id="home-menu" style="margin:0;" >

	<?php 
	$walker = new My_Walker;
	$homemenu_args = array( 
					'menu' => 'Home_menu',
					'walker' => $walker,
					'link_before' => '<div class="title">' ,
					'link_after' => '</div>',
					'menu_class' => 'menu',
					'container' => false 
					);
	wp_nav_menu( $homemenu_args );
	?>
	
</div>	