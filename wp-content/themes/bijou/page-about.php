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
<?php if (is_page('about')){echo '<div id="headerabout_sm"><h1>Bijou Cinema About</h1></div>';} ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			

				<div class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!--<h1 class="entry-title"><?php the_title(); ?></h1>-->

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

					
						<?php bijou_posted_in(); ?>
						
                       


<div class="entry-utility">

 <div id="directors">
    	<ul class="bijou">
    	<?php 
    	
    		$args = array('post_type' => 'staff_member', 'order' => 'ASC', 'posts_per_page' => -1);
    		$staff_loop = new WP_Query($args);
    		
    		while ( $staff_loop->have_posts()) : $staff_loop->the_post();
    			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 

    		?>
    		    	
        <li><img src="<?php echo $image[0] ?>" alt="<?php the_title() ?>" /><p><span class="director"><?php the_title(); ?> </span></p><p><?php the_field('staff_position') ?></p></li>
    		
    		<?php


			endwhile;?>
    	

        
        
        
           </ul>
    </div>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

			

				

<?php endwhile; // end of the loop. ?>

			
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div> <!-- #content -->
</div><!-- end left column -->