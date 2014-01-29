<?php 
//theme options
global$data;
$category_slug =  $data['blog_category'];
$margins = $data['blog_block_margins'];

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

// WP query
$ann = new WP_Query('category_name='. $category_slug .'&posts_per_page=3');


?>

<?php if( $ann->have_posts() ) : ?>

<div id="home-annoucements" <?php if ( $margins) { echo $style; };?>>

			
  <ul>
	
	<?php while ( $ann->have_posts() ) : $ann->the_post(); ?>
	
	<?php $post_format = get_post_format();
	if ( !( $post_format == 'aside' || $post_format == 'link' ) ) :
	?>
	
	<li>
	
		<h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	
		<div class="annoucement">
		
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
				
				<div class="featured-image">				
				
				<a href="<?php echo $image[0]; ?>" class="fancybox">
					<?php the_post_thumbnail('thumbnail'); ?>
				
				</a>
				
				</div>
				
			<?php endif; ?>
			
			
			<p><?php custom_excerpt(300) ?></p>
			
			<p class="read-more">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo __('Read more','kauri');?>
			</a>
			</p>
		
		</div>
	
	</li>

	<?php endif; // $post_format = 'aside' ... ?>
	
	<?php endwhile; ?>
	
  </ul>
  
</div><!-- #home-annoucements -->


<?php endif; // $ann->have_posts()  ... ?>