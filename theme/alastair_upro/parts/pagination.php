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
					<!-- <ul class="pagination">
						<li class="arrow arrow-left"><a href="#"><img src="img/arrow-l.svg" alt=""></a></li>
						<li><p>1</p></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">..</a></li>
						<li class="arrow arrow-right"><a href="#"><img src="img/arrow-r.svg" alt=""></a></li>
					</ul> -->
				</div>