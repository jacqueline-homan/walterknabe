<?php
/*
Template Name: Contact
*/
 
get_header(); ?>

	<?php global $data; ?>
	
	<div class="random_overlay"></div>
	<div class="random_post_header_image">	

		<?php get_template_part('header','image'); ?>

	</div>	


	<div id="primary">
		<div id="content" role="main">
			
			<article id="contact-form" class="contact">
			
			<?php if ( have_posts() ) :  ?>
			
			
				<div class="entry-back">
					<div class="entry-content">		

					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
					
					<header class="page-header">

						<h1 class="page-title">
							<?php the_title(); ?>
						</h1>
					
					</header><!-- .entry-header -->					
						
						<?php while ( have_posts() ) : the_post(); ?>
							
							<?php the_content();?>
						
						<?php endwhile; ?>
					
						<p id="success" class="successmsg" style="display:none;">Your email has been sent! Thank you!</p>

						<p id="bademail" class="errormsg" style="display:none;">Please enter your name, a message and a valid email address.</p>
						<p id="badserver" class="errormsg" style="display:none;">Your email failed. Try again later.</p>

						
					<form id="contact" action="<?php echo get_template_directory_uri(); ?>/sendmail.php" method="post">
					
						<p class="name">
						<label for="name">Your name: *</label>
							<input type="text" id="nameinput" name="name" value=""/>
						</p>
						
						<p class="email">
						<label for="email">Your email: *</label>
							<input type="text" id="emailinput" name="email" value=""/>
						</p>
						
						<p class="message">
						<label for="comment">Your message: *</label>
							<textarea cols="20" rows="7" id="commentinput" name="comment"></textarea><br />
						</p>
						
						<p class="submit">
						<input type="submit" id="submitinput" name="submit" class="submit" value="SEND MESSAGE"/>
						</p>
						
						<input type="hidden" id="receiver" name="receiver" value="<?php echo strhex( $data['contact_email'] ); ?>"/>
						
					</form>
					
					</div><!-- .entry-content -->
				</div><!-- .entry-back -->			
				
				<?php endif; ?>
				
				</article>
		
		
		</div><!-- #content -->
	</div><!-- #primary -->
		


<?php get_sidebar(); ?>	

<?php get_footer(); ?>


