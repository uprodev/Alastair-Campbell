<div class="search-form-wrap">
	<div class="content-width">
		<form role="search" method="get" action="<?php echo home_url( '/' ) ?>" class="form-search">
			<label for="s"></label>
			<input type="hidden" name="post_type" value="post" />
			<input type="search" id="s" name="s" placeholder="<?php _e('Search', 'Campbell') ?>">
			<button type="submit"><img src="<?= get_stylesheet_directory_uri() ?>/img/search.svg" alt=""></button>
		</form>
		<div class="close-search">
			<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-menu.png" alt=""></a>
		</div>
	</div>
</div>