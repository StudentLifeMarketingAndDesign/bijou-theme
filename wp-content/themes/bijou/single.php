<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container"> 
			<div id="content" role="main">
            <div class="clear"></div>
			<div id="leftcolumn">
			<div id="filmfeature">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				

				<div class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
					<div id="schedule-container">
						<?php   echo ec3_get_schedule('<tr><td colspan="3">%s</td></tr>', '<tr><td class="ec3_start">%1$s</td>'
	  . '<td class="ec3_to">%3$s</td><td class="ec3_end">%2$s</td></tr>','<div class="schedule_container"><table class="ec3_schedule" cellpadding=10>%s</table></div>'); ?>
					
			<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  the_post_thumbnail( array(246, 246));
			  }

				?></div>
					
					<div class="entry-meta">
						<?php bijou_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">


						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bijou' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content  -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bijou_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'bijou' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'bijou' ), get_the_author() ); ?>
							</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

	<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4dadd88364f642a3"></script>
<!-- AddThis Button END -->

					<div class="entry-utility">
						<?php bijou_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'bijou' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				

							<?php comments_template( '', false ); ?>


<?php endwhile; // end of the loop. ?>

		</div>
		</div><!-- #container -->

<?php get_sidebar(); ?>
<div class="clear"></div>
<?php get_footer(); ?>
</div> <!-- #content -->
</div><!-- end left column -->