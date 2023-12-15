<div class="pagination-wrap">

	<?php 
	$args = array(
		'show_all'     => false, 
		'end_size'     => 1,    
		'mid_size'     => 1,     
		'prev_next'    => true,  
		'prev_text'    => '<img src="' . get_stylesheet_directory_uri() . '/img/arrow-l.svg">',
		'next_text'    => '<img src="' . get_stylesheet_directory_uri() . '/img/arrow-r.svg">',
		'add_args'     => false, 
		'add_fragment' => '',    
		'screen_reader_text' => __( 'Posts navigation' ),
		'type' => 'list',
	);
	the_posts_pagination($args);
	?>
	
</div>