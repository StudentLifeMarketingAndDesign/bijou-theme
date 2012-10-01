<div id="rightcolumn">
        
<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="primary" class="widget-area" role="complementary">
		
		<h3 class="widget-title">Showings By Date</h3>
			<ul class="xoxo">
			
			<li> <?php
ec3_get_events(
   10,                                      // limit
   '<a href="%LINK%">%TITLE% (%TIME%)</a>', // template_event
   '%DATE%',                                     // template_day
   'l, F j',                                    // date_format
   ''                              // template_month
);
?></li>

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'bijou' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'bijou' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
<h3 class="connect">Connect with Us</h3> 
        <ul id="connect"> 
            

            <li><a href="http://twitter.com/bijoutheater" id="tweet">Twitter</a></li> 
            <li><a href="http://www.facebook.com/pages/The-Bijou-Cinema/178595398854287" id="fb">Facebook</a></li> 
           <li> <a href="mailto:bijou@uiowa.edu" id="email">Email</a></li> 
           </ul> <!-- closes connect div --> 
           <h3><a href="https://list.uiowa.edu/scripts/wa.exe?SUBED1=BIJOUGOERSGUIDE&A=1">Sign up for our newsletter!</a></h3>
            <h4 class="bijou">Bijou Cinema</h4> 
                     <address>The University of Iowa <br /> 
                     166-B Iowa Memorial Union <br /> 
                     Iowa City, IA 52242 </address> 
                     <p class="bijou">319-335-3258<br /><span class="bijou">bijou@uiowa.edu</span></p> 
			 			
