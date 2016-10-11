<?php
/**
 * The template for displaying search forms in SketchThemes
 * @package WordPress
 * @SketchThemes
 */
?>
<div class="search-box">
	<form id="searchform" class="sktwed-search-form searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input id="s" class="sktwed-search field" type="text" name="s" placeholder="<?php esc_attr_e('Search', 'thenotes-lite' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" />
		<div class="sktwed-sub-button search-icon"><i class="fa fa-search"></i><input id="searchsubmit" class="sktwed-sub-btn submit" type="submit" name="submit" value="<?php esc_attr_e('Submit', 'thenotes-lite' ); ?>" /></div>
	</form>
</div>
