<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package Technical Blogging
 */

?>

<div class="content-page">
	<div class="page-content-area">
		<div class="entry-content">
			<?php
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'technical-blogging' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<footer class="entry-footer">
			<div class="container">
				<div class="row">
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'technical-blogging' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</div>
			</div>
		</footer><!-- .entry-footer -->
	</div>
</div>