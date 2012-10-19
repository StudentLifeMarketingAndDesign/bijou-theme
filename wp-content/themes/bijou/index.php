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
<div id="content" class="home">   

<div id="leftcolumn">


			
	<div id="filmfeature">

	<ul>
			<?php
				$dataQuery = new WP_Query( array(
					'post_type' => 'post',
					'category_name' => 'now-showing',
					'posts_per_page' => 5, // get 5 posts
					 'paged' => get_query_var( 'paged' ), 
					/*'orderby_field' => 'film_start_date', // name of field*/
					'orderby_type' => 'string', // 'int' or 'string' (defaults to 'string')
					'order'	=>	'ASC'
				));
			?>
		 
	
	<?php if ($dataQuery->have_posts() ) : while ( $dataQuery->have_posts() ) : $dataQuery->the_post(); ?>

		<li>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		
<div class="schedule_container">
			<?php
			 
			 echo ec3_get_schedule('<tr><td colspan="3">%s</td></tr>', '<tr><td class="ec3_start">%1$s</td>'
			  . '<td class="ec3_to">%3$s</td><td class="ec3_end">%2$s</td></tr>','<table class="ec3_schedule" cellpadding=10>%s</table>');
			
			
			?>
</div>			
	<div class="content_container">
	<?php	
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		the_post_thumbnail( array(246, 246));
	}
	?>
	<?php the_content() ?>
	</div>
		
	<?php endwhile; ?>

	
	<div style="clear: left;"></div>
	</li>
	<div style="clear: left;"></div>
<?
global $wp_rewrite;
$dataQuery->query_vars['paged'] > 1 ? $current = $dataQuery->query_vars['paged'] : $current = 1;
 
$pagination = array(
	'base' => @add_query_arg('page','%#%'),
	'format' => '',
	'total' => $dataQuery->max_num_pages,
	'current' => $current,
	'show_all' => true,
	'type' => 'plain',
	/*'prev_text' => '', */
	'next_text' => '&nbsp; &nbsp; Future Shows &raquo;'
	);
	
if( $wp_rewrite->using_permalinks() )
	$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

if( !empty($dataQuery->query_vars['s']) )
	$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

print paginate_links( $pagination ) ?>

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
