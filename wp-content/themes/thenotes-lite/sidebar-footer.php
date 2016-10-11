<?php if( is_active_sidebar('first-footer-sidebar') && is_active_sidebar('second-footer-sidebar') && is_active_sidebar('third-footer-sidebar') ) { ?>
	<ul class="col-md-4 col-sm-4 footer-sidebar first-footer-sidebar">
		<?php dynamic_sidebar( 'first-footer-sidebar' ); ?>
	</ul>
	<ul class="col-md-4 col-sm-4 footer-sidebar second-footer-sidebar">
		<?php dynamic_sidebar( 'second-footer-sidebar' ); ?>
	</ul>
	<ul class="col-md-4 col-sm-4 footer-sidebar third-footer-sidebar">
		<?php dynamic_sidebar( 'third-footer-sidebar' ); ?>
	</ul>
<?php } elseif ( is_active_sidebar('first-footer-sidebar') && is_active_sidebar('second-footer-sidebar') && !is_active_sidebar('third-footer-sidebar') ) { ?>
	<ul class="col-md-6 col-sm-6 footer-sidebar first-footer-sidebar">
		<?php dynamic_sidebar( 'first-footer-sidebar' ); ?>
	</ul>
	<ul class="col-md-6 col-sm-6 footer-sidebar second-footer-sidebar">
		<?php dynamic_sidebar( 'second-footer-sidebar' ); ?>
	</ul>
<?php } else { ?>
	<ul class="col-md-12 col-sm-12 footer-sidebar first-footer-sidebar">
		<?php dynamic_sidebar( 'first-footer-sidebar' ); ?>
	</ul>
<?php } ?>
