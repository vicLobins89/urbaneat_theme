<?php $options = get_option('rh_settings'); ?>

<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

	<div id="inner-footer" class="cf">
        
        <?php echo '<a class="footer-logo" href="'. home_url() .'">Logo</a>'; ?>

		<nav role="navigation" class="footer-nav">
			<?php wp_nav_menu(array(
			'container' => '',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
			'container_class' => '',         // class of container (should you choose to use it)
			'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
			'menu_class' => 'nav cf',            // adding custom nav class
			'theme_location' => 'footer-links',             // where it's located in the theme
			'before' => '',        // before the menu
			'after' => '',
			'depth' => 0,                                   // limit the depth of the nav
			'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
			)); ?>
		</nav>
        
        <?php echo do_shortcode( '[social_links]' ); ?>

	</div>

</footer>

</div>

<?php // all js scripts are loaded in library/rarehoney.php ?>
<?php wp_footer(); ?>

</body>

</html> <!-- end of site-->