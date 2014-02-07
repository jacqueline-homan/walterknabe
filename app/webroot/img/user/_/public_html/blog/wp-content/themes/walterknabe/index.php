<? get_header(); ?>
	
		<div id="content" role="main">
	
		<? if (have_posts()) : ?>
	
			<? while (have_posts()) : the_post(); ?>
	
				<div <? post_class() ?> id="post-<? the_ID(); ?>">
					<h2><a href="<? the_permalink() ?>" rel="bookmark" title="Permanent Link to <? the_title_attribute(); ?>"><? the_title(); ?></a></h2>
					<div class="poststamp"><? the_time('F jS, Y') ?> <!-- by <? the_author() ?> --></div>
	
					<div class="entry">
						<? the_content('Read the rest of this entry &raquo;'); ?>
					</div>
	
					<p class="postmetadata"><? the_tags('Tags: ', ', ', '<br />'); ?> Posted in <? the_category(', ') ?> | <? edit_post_link('Edit', '', ' | '); ?>  <? comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				</div>
	
			<? endwhile; ?>
			
            <?php
			/*
			<div class="navigation">
				<div class="alignleft"><? next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><? previous_posts_link('Newer Entries &raquo;') ?></div>
			</div>
			*/
			wp_paginate();
			?>
	
		<? else : ?>
	
			<h2 class="center">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<? get_search_form(); ?>
	
		<? endif; ?>
	
		</div>

		<? get_sidebar(); ?>

<? get_footer(); ?>
