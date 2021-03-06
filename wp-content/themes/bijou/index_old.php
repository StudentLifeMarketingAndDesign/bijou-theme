<?php
/**
 * The main template file!
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header();

 ?>
 
	  <div id="header"><h1>Bijou Cinema Now Showing</h1></div>
<div id="content">   

<div id="leftcolumn">

			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			// get_template_part( 'loop', 'index' );
			?>
			
	<div id="filmfeature">	
	<ul>
<?php if (have_posts()) : ?>		
	<?php while (have_posts()) : the_post(); ?>
		<li>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		
			
			<?php
			
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail( array(246, 246));
  
  echo ec3_get_schedule();

} 
?>
			
			<!--<h4>Directed by Francis Ford Coppola</h4>
			<h5>Starring Marlon Brando, Al Pacino, James Caan, Richard Castellano, and Robert Duvall</h5> -->
			<p><?php the_content('Read the rest of this entry &raquo;'); ?></p>
		</li>
	<?php endwhile; ?>

	<?php next_posts_link('&laquo; Older Entries') ?>
    <?php previous_posts_link('Newer Entries &raquo;') ?>

<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	        	<?php endif; ?>
</ul>		
   	

         </div>
  	 </div><!-- closes left column -->
         
             
	<?php get_sidebar(); ?>             
	<?php get_footer(); ?>
	
</div> <!-- closes content div-->   