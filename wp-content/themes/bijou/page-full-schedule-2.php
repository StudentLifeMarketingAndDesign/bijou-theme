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
	<h1>Full Schedule</h1>
	<ul id="full-schedule">
	<?php
$dataQuery = new ACF_WP_Query( array(
	'post_type' => 'post',
	'posts_per_page' => -1, // get all posts
	'orderby_field' => 'film_start_date', // name of field
	'orderby_type' => 'int', // 'int' or 'string' (defaults to 'string')
	'order'	=>	'ASC'
));
 

 //print_r($dataQuery);
?>
 
	
	<?php if ($dataQuery->have_posts() ) : while ( $dataQuery->have_posts() ) : $dataQuery->the_post(); ?>

<?php global $more;
$more = 0;

?>

		<li>
			<strong><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong> - 
			<?php
				$datestamp = strtotime(get_field('film_start_date'));
				echo "Starts on ".strftime("%A %B %e, %G", $datestamp);
		/* $date = date_create_from_format ('Y_m_d', get_field('film_start_date'));
echo $date->format("F j, Y");*/
				?>
				<a href="<?php the_permalink() ?>">(showtimes)</a>
		</li>
	<?php endwhile; ?>
	<div style="clear: left;"></div>
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
