<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
			<div id="content" role="main">
			<div id="leftcolumn">
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'bijou' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'bijou' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'bijou' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Show Archives', 'bijou' ); ?>
<?php endif; ?>
			</h1>

<div id="filmfeature">

	<ul>
			<?php
				$dataQuery = new WP_Query( array(
					'post_type' => 'post',
					//'category_name' => 'coming-soon',
					'posts_per_page' => 20, // get 10 posts
					'paged' => get_query_var( 'page' ), 
					'orderby' => 'meta_value_num',
					'meta_key' => 'film_start_date',
					'order'	=>	'DESC'
				));
				
				//print_r($dataQuery);
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
	'next_text' => '&nbsp; &nbsp; Past Shows &raquo;'
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
			</div><!-- #content -->
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>
