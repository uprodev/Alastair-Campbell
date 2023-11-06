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
}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Header menu',
		'footer' => 'Footer menu'
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