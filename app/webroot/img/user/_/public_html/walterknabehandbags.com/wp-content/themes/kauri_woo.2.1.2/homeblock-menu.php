<?php global $data; ?>

<?php

$margins = $data['menu_block_margins'];

if( isset( $margins ) ){

	if ( $margins['Margin top'] == null ) {
		$margin_top = '';
	}else{
		$margin_top = 'margin-top:' . $margins['Margin top'] . 'px;';
	}

	if ( $margins['Margin bottom'] == null ) {
		$margin_bottom = '';
	}else{
		$margin_bottom = 'margin-bottom:' . $margins['Margin bottom'] . 'px;';
	}

	if ( $margin_top ||  $margin_bottom ) {
		$style = 'style="' . $margin_top . $margin_bottom . '" ';
	}else{
		$style = '';
	}

}// if isset

?>
<div id="home-menu-dropdown" role="navigation" <?php if ( $margins) { echo $style; };?> >

	<?php
	wp_nav_menu(array(
	  'menu' => 'Home menu',
	  //theme_location' => 'primary', // your theme location here
	  'walker'         => new Walker_Nav_Menu_Dropdown(),
	  'items_wrap'     => '<select id="home-menu-select" name="home-menu-select">%3$s</select>',
	));
	?>
	<script type="text/javascript">
	/* <![CDATA[ */
		var ddown = document.getElementById("home-menu-select");
		function onMenuChange() {
			if ( ddown.options[ddown.selectedIndex].value != '' ) {
				location.href = ddown.options[ddown.selectedIndex].value;
			}
		}
		ddown.onchange = onMenuChange;
	/* ]]> */
	</script>
	
</div><!-- .menu-pages-dropdown -->
<div id="home-menu" <?php if ( $margins) { echo $style; };?> >

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
		