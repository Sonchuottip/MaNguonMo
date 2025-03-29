<?php
/**
 * @package Technical Blogging
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$technical_blogging_widget_num = esc_html(get_theme_mod('technical_blogging_footer_widgets', '4'));
	
	if ($technical_blogging_widget_num == '4') :
		$technical_blogging_col1 ='col-md-3';
		$technical_blogging_col2 ='col-md-3';
		$technical_blogging_col3 ='col-md-3';
		$technical_blogging_col4 ='col-md-3';
	elseif ($technical_blogging_widget_num == '3') :
		$technical_blogging_col1 ='col-md-4';
		$technical_blogging_col2 ='col-md-4';
		$technical_blogging_col3 ='col-md-4';
		
	elseif ($technical_blogging_widget_num == '2') :
		 $technical_blogging_col1 ='col-md-6';
		 $technical_blogging_col2 ='col-md-6';
	else :
		$technical_blogging_col1 ='col-md-12';
	endif;
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) && ( $technical_blogging_widget_num == '4' || $technical_blogging_widget_num == '3' || $technical_blogging_widget_num == '2' || $technical_blogging_widget_num == '1')) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($technical_blogging_col1); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-2' ) && ( $technical_blogging_widget_num == '4' || $technical_blogging_widget_num == '3' || $technical_blogging_widget_num == '2')) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($technical_blogging_col2); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-3' ) && ( $technical_blogging_widget_num == '4' || $technical_blogging_widget_num == '3' )) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($technical_blogging_col3); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-4' ) && ( $technical_blogging_widget_num == '4' )) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($technical_blogging_col4); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	endif;
?>