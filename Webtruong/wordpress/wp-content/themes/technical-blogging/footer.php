<?php
/**
 * The template for displaying the footer.
 *
 * @package Technical Blogging
 */

?>
	</div>
	<!-- Begin Footer Section -->
	<footer id="footer" class="technical-blogging-footer" itemscope itemtype="https://schema.org/WPFooter">
		<div class="container footer-widgets">
			<div class="row">
				<div class="footer-widgets-wrapper">
	                <?php get_sidebar( 'footer' ); ?>
	            </div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container copyrights">
				<div class="row">
					<div class="footer-copyrights-wrapper">
						<?php
							/**
							 * Hook - technical_blogging_action_footer.
							 *
							 * @hooked technical_blogging_footer_copyrights - 10
							 */
							do_action( 'technical_blogging_action_footer' );
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="scrl-to-top">
			<?php if(get_theme_mod('technical_blogging_enable_scrolltop',false)=="1"){ ?>
	   			<a id="scrolltop" class="btntoTop"><i class="bi bi-arrow-up-short"></i></a>
	  		<?php } ?>
		</div>
    </footer>
	<?php wp_footer(); ?>
</body>