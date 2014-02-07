<? get_header(); ?>

	<div id="content" role="main">

		<? if(is_search()) { ?>
	       	<h1>Search results for <em><?php the_search_query(); ?></em></h1>
		<? } ?>
		
		<? if(is_category()) { ?>
			<h1>Filed under <em><? single_cat_title(''); ?></em></h1>
		<? } ?>
		
		<? if(is_tag()) { ?>
			<h1>Tagged as <em><? single_tag_title(''); ?></em></h1>
		<? } ?>
		

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <h4 class="archivetitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
				<?php the_excerpt(); ?><div class="clear"></div>
			</div>

		<?php endwhile; ?>

		<?php if(function_exists('wp_paginate')) {
			wp_paginate();
		} else {
			?><p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p><?
		} ?>

		<? /*
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		*/ ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<? get_footer(); ?>
