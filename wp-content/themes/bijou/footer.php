<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>
    	<div class="clear"></div>
    	
    	<!--<ul id="navfoot">
            <li><a href="/">Home </a></li>
            <li><a href="/">Schedule</a></li>
            <li><a href="/">About  </a></li>
            <li><a href="/">Contact Us  </a></li>
                </ul>  -->
                
                <p class="bottomnav">Bijou Cinema, Iowa Memorial Union  |  Free admission for UI students, $7 for non-students</p>
               <p class="disability">Individuals with disabilities are encouraged to attend all University of Iowa - sponsored events. If you are a person with a disability who requires an accommodation in order to participate in this program, please contact the Center For Student Involvement and Leadership in advance at 319-335-3059</p></div><div class="clear"></div>
			
			<div id="site-generator">
				<?php do_action( 'bijou_credits' ); ?>
				<a href="<?php echo esc_url( __('http://wordpress.org/', 'bijou') ); ?>"
						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'bijou'); ?>" rel="generator">
					
				</a>
			</div><!-- #site-generator -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-426753-35']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</html>
