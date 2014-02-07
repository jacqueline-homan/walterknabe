<?php global $data; ?>

<?php

$margins = $data['widgets2_block_margins'];

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

} // if isset

 ?>

<?php if ( is_active_sidebar( 'homewidgets-2' ) ) : ?>

	<div class="homewidgets2" <?php if ( $margins) { echo $style; };?> >

		<ul>
		
		<?php dynamic_sidebar( 'homewidgets-2' ); ?>
		
		</ul>
		
	</div>

<?php endif; ?>