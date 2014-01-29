

<?php if ( is_active_sidebar( 'homewidgets-1' ) ) : ?>

	<div class="homewidgets" style="margin-bottom:20px;" >

		<ul>
		
		<?php dynamic_sidebar( 'homewidgets-1' ); ?>
		
		</ul>
		
	</div>

<?php endif; ?>