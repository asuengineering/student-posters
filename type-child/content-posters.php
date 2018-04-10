<?php
/**
 * Template part for displaying single posters.
 * Used by the Posters CPT.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Type
 * @since Type 1.0
 */

// Sidebar Options

$post_sidebar_position = get_theme_mod('post_sidebar_position', 'content-sidebar');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( get_theme_mod('post_style', 'fimg-classic') == 'fimg-classic' ) : ?>
		<header class="entry-header">
			<div class="entry-meta entry-category">
				<span class="cat-links"><?php the_category( ', ' ); ?></span>
			</div>
			<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<?php the_post_thumbnail('type-large');	?>
		</figure>
	<?php endif; // Featured Image ?>

	<div class="entry-content">
    <h2>Description:</h2>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<!-- The .entry-footer was here -->

</article><!-- #post-## -->

<!-- FOR THE AUTHOR BIOS: be sure to translate all of the inline CSS here into youre child theme's style.css :-) -->
<!-- This is just to show you whats possible! -->

<h2> Submitted By: </h2>
<div class="author-info">
    <div class="row">
        <div class="col-2 col-sm-2">
            <div class="author-avatar">
                <img src="https://print.asu.edu/sites/default/files/asu_fultonengineering_horiz_rgb_maroongold_600ppi.png" />
            </div>
        </div>
        <div class="col-10 col-sm-10">
            <div class="author-description">
                <h3 class="author-title">
                    <?php echo get_post_meta( get_the_ID(), 'student1name', true ); ?>
                </h3>
                <p class="author-bio">
                    <?php echo get_post_meta( get_the_ID(), 'student1bio', true ); ?>
                </p><!-- .author-bio -->


            </div><!-- .author-description -->
        </div>
    </div>
</div><!-- .author-info -->



<!-- ADD THE IF STATEMENT FOR BIO2 -->
