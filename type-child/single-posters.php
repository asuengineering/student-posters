<?php

/*
=========================================================================
Single Post Template
=========================================================================
*/


// Sidebar Options

$post_sidebar_position = get_theme_mod('post_sidebar_position', 'content-sidebar');
get_header(); ?>
<?php $terms = get_the_terms ( $post -> ID, 'topics');
?>

<?php if ( have_posts() ) : ?>

		<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
					<?php
								while ( have_posts() ) : the_post();

										get_template_part( 'content', 'posters' );

										the_post_navigation();

								endwhile; // End of the loop.
		?>

					</main><!-- #main -->
		</div><!-- #primary -->

<?php endif; ?>

<?php

	// Sidebar

	if ( 'content-sidebar' == $post_sidebar_position || 'sidebar-content' == $post_sidebar_position ) {
		get_sidebar();

	}
?>

<?php get_footer(); ?>
