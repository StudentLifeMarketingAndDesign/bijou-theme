/Users/dustin/Library/Application Support/Coda/Plug-ins/saveall.codaplugin/Contents/Resources/EEF197AE-7C6C-41E3-9601-B429CD221EC0/Save All: line 1: syntax error near unexpected token `void'
/Users/dustin/Library/Application Support/Coda/Plug-ins/saveall.codaplugin/Contents/Resources/EEF197AE-7C6C-41E3-9601-B429CD221EC0/Save All: line 1: `- (void)saveAll;'
<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

				<h1 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'bijou' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
