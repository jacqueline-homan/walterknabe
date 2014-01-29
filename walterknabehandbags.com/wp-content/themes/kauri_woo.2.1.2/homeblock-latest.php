<?php global $data; ?>

<?php

$margins = $data['latest_block_margins'];

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

<div id="homeblock-latest" <?php if ( $margins) { echo $style; };?> >


	<?php if ( !$data['hide_latest_title'] ) : // if "hide title" theme option is NOT ticked ?>

		<h2 class="newdesigns">
		
			<?php 
			if ( $data['latest_title'] ) :

				echo $data['latest_title']; 
				
			else :

				echo __('Latest Products','kauri');
				
			endif;
			?>
			
		</h2>

	<?php endif; ?>


	<div class="clear"></div>

	<?php 
	
	$latest_type = $data['latest_type'];

	if( isset($latest_type) && $latest_type == 'posts') { //- products or posts
			
			get_template_part('latest_posts' ); 
			
		}else{
		
			get_template_part('latest'); 
		}
	
	
	?>

</div><!-- #homeblock-latest-->