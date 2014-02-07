<?php global $data; ?>

<?php 

$featured_type = $data['featured_type'];

$margins = $data['feat_block_margins'];

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

<div id="homeblock-featured" <?php if ( $margins) { echo $style; };?> >

	<?php if ( !$data['hide_featured_title'] ) : // if "hide title" theme option is NOT ticked ?>

		<h2 class="featured">

			<?php 
			
			if ( $data['featured_title'] ) : 
			
				echo $data['featured_title']; 
			
			else :
				
				echo __('Featured Products','kauri'); 
			
			endif; // $data featured_title

			?>

		</h2>

	<?php endif; // end if $data hide_featured_title ?>


	<div class="clear"></div>


	<?php 
	$carousel_template = $data['carousel_template'];


	if ( $carousel_template == 'carousel_kauri') : // first - is it kauri or classic carousel

		get_template_part('header','image');
		
		if( isset($featured_type) && $featured_type == 'posts') { //second - products or posts
			
			get_template_part('featured_posts' ); 
			
		}else{
		
			get_template_part('featured' ); 
		}
	
	elseif ( $carousel_template == 'carousel_classic' ) :

		if( isset($featured_type) && $featured_type == 'posts') { // products or posts
			
			get_template_part('featured_posts2' ); 
			
		}else{
		
			get_template_part('featured_2' ); 
		}
		
	else :

		get_template_part('header','image');

		if( isset($featured_type) && $featured_type == 'posts') { //second - products or posts
			
			get_template_part('featured_posts' ); 
			
		}else{
			get_template_part('featured' ); 
		}
		
	endif;

	?>

</div><!-- #homeblock-featured-->