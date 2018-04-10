<?php
/**
  * Template Name: Home Page w/second loop
  *
  * @package Type
  * @since Type 1.0
  */


  get_header(); ?>

  <?php if ( have_posts() ) : ?>

  	<?php if ( get_theme_mod('page_style', 'fimg-classic') == 'fimg-fullwidth' ) : ?>
  		<div class="featured-image">
  			<div class="entry-header">
  				<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
  			</div>
  			<?php if ( has_post_thumbnail() && get_theme_mod('page_has_featured_image', 1) ) : ?>
  				<figure class="entry-thumbnail">
  					<?php the_post_thumbnail('type-fullwidth'); ?>
  				</figure>
  			<?php endif; // Featured Image ?>
  		</div>
  	<?php endif; ?>

  	<div id="primary" class="content-area">
  		<main id="main" class="site-main" role="main">

  			<?php
  			while ( have_posts() ) : the_post();

  				get_template_part( 'template-parts/page/content', 'page' );

  				// If comments are open or we have at least one comment, load up the comment template.
  				if ( comments_open() || get_comments_number() ) :
  					comments_template();
  				endif;

  			endwhile; // End of the loop.

        endif;

        wp_reset_postdata();

   /*
    * The secondary query. Note that you can use any category name here. In our example,
    * we use "example-category".
    */
   $secondary_query = new WP_Query( array( 'post_type' => 'posters', 'posts_per_page' => 3 ));

   // The second loop.
   if ( $secondary_query->have_posts() )

   while ( $secondary_query->have_posts() ) :

       $secondary_query->the_post();
       //get_template_part( 'content', 'posters' );
       ?>

         <div class="poster-container">
           <div class="poster-title">
                 <?php echo the_title(); ?>
           <div class="poster-thumbnail">
                 <?php echo the_post_thumbnail(); ?>
               </div>
             </div>
          </div>

<?
   endwhile;

   //endif;
wp_reset_postdata();

  			?>

  		</main><!-- #main -->
  	</div><!-- #primary -->


  <?php get_sidebar(); ?>
  <?php get_footer(); ?>
