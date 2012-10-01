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

						<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'bijou' ); ?></p>
					<?php get_search_form(); ?>
			
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div> <!-- #content -->
</div><!-- end left column -->

