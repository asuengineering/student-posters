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

	<footer class="entry-footer">
		<?php type_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<!-- FOR THE AUTHOR BIOS: be sure to translate all of the inline CSS here into youre child theme's style.css :-) -->
<!-- This is just to show you whats possible! -->
<div class="author-info">
    <div class="row">
        <div class="col-2 col-sm-2">
            <div class="author-avatar">
                <img src="https://picsum.photos/60" />
            </div>
        </div>
        <div class="col-10 col-sm-10">
            <div class="author-description">
                <h3 class="author-title">
                    <?php echo carbon_get_post_meta( get_the_ID(), 'crb_student1name' ); ?>
                </h3>
                <p class="author-bio">
                    <?php echo carbon_get_post_meta( get_the_ID(), 'crb_student1bio' ); ?>
                </p><!-- .author-bio -->
            </div><!-- .author-description -->
        </div>
    </div>
</div><!-- .author-info -->
