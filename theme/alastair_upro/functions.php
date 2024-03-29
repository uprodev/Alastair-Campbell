<?php 

// show_admin_bar( false );

add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('my-normalize', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('my-font', get_template_directory_uri() . '/css/font.css');
	wp_enqueue_style('my-fonts', get_template_directory_uri() . '/fonts/FA5PRO-master/css/all.css');
	wp_enqueue_style('my-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
	wp_enqueue_style('my-nice-select', get_template_directory_uri() . '/css/nice-select.css');
	wp_enqueue_style('my-swiper', get_template_directory_uri() . '/css/swiper.min.css');
	wp_enqueue_style('my-styles', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style('my-responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style('my-style-main', get_template_directory_uri() . '/style.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('my-swiper', get_template_directory_uri() . '/js/swiper.js', array(), false, true);
	wp_enqueue_script('my-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), false, true);
	wp_enqueue_script('my-cuttr', get_template_directory_uri() . '/js/cuttr.min.js', array(), false, true);
	wp_enqueue_script('my-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), false, true);
	wp_enqueue_script('my-fixto', get_template_directory_uri() . '/js/fixto.js', array(), false, true);
	wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), false, true);
	if(is_single()) wp_enqueue_script('comment-reply');
}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Header menu',
		'footer' => 'Footer menu',
		'sidebar' => 'Left Sidebar menu',
		'sidebar-right-1' => 'Right Sidebar menu (About)',
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'chat', 'audio') );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
	if(in_array('home', $type))
	{
		$title = __('Home', 'Campbell');
	}
	return $title;
}


function reading_time() {
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);

	return $readingtime;
}


function get_first_paragraph(){
	global $post;
	$str = wpautop( get_the_content() );
	$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
	$str = strip_tags($str, '<a><strong><em>');
	return '<p>' . $str . '</p>';
}

add_action('init', function(){
	if ($_GET['test']) {
		print_r(get_metadata('post',11052 ));

		die();
	}
});


add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name' => 'Sidebar (About)',
		'id' => 'about-sidebar',
		'description' => 'Sidebar (About Page)',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );
	register_sidebar( array(
		'name' => 'Sidebar (Contact)',
		'id' => 'contact-sidebar',
		'description' => 'Sidebar (Contact Page)',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );
	register_sidebar( array(
		'name' => 'Sidebar (Charity)',
		'id' => 'charity-sidebar',
		'description' => 'Sidebar (Charity Page)',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );
	register_sidebar( array(
		'name' => 'Sidebar (Post)',
		'id' => 'post-sidebar',
		'description' => 'Sidebar (Post)',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );
}


include_once(get_stylesheet_directory() . '/inc/widget_links.php');


add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

	if( function_exists('acf_register_block_type') ) {

		acf_register_block_type(array(
			'name'              => 'my_slider',
			'title'             => __('Slider (Custom)'),
			'description'       => __('Add Slider (Custom)'),
			'render_template'   => 'parts/blocks/slider.php',
			'category'          => 'common',
			'post_types'        => array('post', 'page'),
		));
	}
}




add_action( 'template_redirect', function ()
{

	if (!$_GET['run'])
		return;
    // Get all our posts
	$args = [
		'posts_per_page' => -1,
        'fields'         => 'ids', // Make the query lean
        // Add any additional query args here
    ];
    $q = new WP_Query( $args );

    if ( !$q->have_posts() )
    	return;

    while ( $q->have_posts() ) {
    	$q->the_post();

        // Get all the categories attached to the post
    	$categories = get_the_category();
    	if ( !$categories )
    		continue;

        // Get the names from the categories into an array
    	$names = wp_list_pluck( $categories, 'name' );
        // Loop through the names and make sure that the post does not already has the tag attached
    	foreach ( $names as $key=>$name ) {
    		if ( has_tag( $name ) )
    			unset ( $names[$key] );
    	}
        // Make sure we still have a valid $names array
    	if ( !$names )
    		continue;

        // Finally, attach our tags to the posts
    	wp_set_post_terms(
            get_the_ID(), // Post ID
            $names, // Array of tag names to attach
            'post_tag',
            true // Only add the tags, do not override
        );
    }
    wp_reset_postdata();
});


/*add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
	global $post;
	return '...<a href="'. get_permalink($post) . '">' . __('Continue', 'Campbell') . '<i class="far fa-long-arrow-right"></i></a>';
}*/


function get_excerpt($count, $post_id=''){
	$post_id_ = $post_id ?: $post->ID;
	$permalink = get_permalink($post_id_);
	$excerpt = get_the_content(null, null, $post_id_);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = $excerpt.'...';
	return $excerpt;
}