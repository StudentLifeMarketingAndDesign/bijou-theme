<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

				<div id="leftcolumn">
<div id="filmfeature">

	<ul>
			<?php
			
			
			$agenda = get_posts(
			
					array('post_type' => 'post',
					'category_name' => 'coming-soon',
					'posts_per_page' => 30, // get 20 posts
					'paged' => get_query_var( 'page' )
					)		
			
			
			);

// an empty array
$date_order = '';
if( $agenda ) : ?> <?php  foreach( $agenda as $post ) : setup_postdata( $post ); ?> 

<?php 	$custom_date = get_post_custom_values('EventStartDate (YYYY/MM/DD)');
	if (isset($custom_date[0])) {
	
		$evento = strtotime($custom_date[0].$post->ID);
		
	} else {
   $evento = strtotime($post->post_date_gmt);
			}
	$date_order[$evento] = $post->ID;

// now the array contain key as date and post ID as value
	 ?>

	<?php endforeach;  ?>
 	<?php endif; ?>
<?php		
ksort($date_order);

//print_r($date_order);

foreach ($date_order as $key => $val) {
	query_posts('p='.$val);
	global $more;
	$more = 0; 
	
	// the second Loop
	while (have_posts()) : the_post(); ?>
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


 <?php	} 
	 
	 print paginate_links( $pagination ) ?>
	 
 	
			
			<?php /*
								$start_date = get_post_meta($post->ID, 'EventStartdate (YYYY/MM/DD)', true);
					$fixed_date = strtotime($start_date);
			
				$dataQuery = new WP_Query( array( 
					'post_type' => 'post',
					'category_name' => 'coming-soon',
					'meta_key' => 'EventStartDate (YYYY/MM/DD)',
					'orderby' => $fixed_date,
					'order'	=>	'ASC',
					'posts_per_page' => 20, // get 20 posts
					'paged' => get_query_var( 'page' )
				));
				
				//print_r($dataQuery);
			?>
			

	
	<?php /* if ($dataQuery->have_posts() ) : while ( $dataQuery->have_posts() ) : $dataQuery->the_post(); ?>

		<li>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		
<div class="schedule_container">
			<?php
			 
			 echo ec3_get_schedule('<tr><td colspan="3">%s</td></tr>', '<tr><td class="ec3_start">%1$s</td>'
			  . '<td class="ec3_to">%3$s</td><td class="ec3_end">%2$s</td></tr>','<table class="ec3_schedule" cellpadding=10>%s</table>');
			
			
			

<?php
/*
global $wp_rewrite;
$dataQuery->query_vars['paged'] > 1 ? $current = $dataQuery->query_vars['paged'] : $current = 1;
 
$pagination = array(
	'base' => @add_query_arg('page','%#%'),
	'format' => '',
	'total' => $dataQuery->max_num_pages,
	'current' => $current,
	'show_all' => true,
	'type' => 'plain',
	//'prev_text' => '', 
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

<?php endif; ?> */
?>
</ul>		

</div>
  	 </div><!-- closes left column -->
         
             
	<?php get_sidebar(); ?>             
	<?php get_footer(); ?>
	
</div> <!-- closes content div-->   
