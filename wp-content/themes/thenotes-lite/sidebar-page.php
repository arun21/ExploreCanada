<?php
/**
 * The sidebar containing the secondary widget area, displays on posts.
 * If no active widgets in this sidebar, it will be hidden completely.
 */
?>

<ul id="sktwed-main-sidebar" class="sktwed-sidebar-widget">
	<?php if ( is_active_sidebar('page-sidebar') ) {
		dynamic_sidebar( 'page-sidebar' );
	} ?>
</ul>
