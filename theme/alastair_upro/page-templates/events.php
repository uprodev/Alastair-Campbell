<?php
/*
Template Name: Events
*/
?>

<?php get_header(); ?>

<?php 
$wp_query = new WP_Query(array('post_type' => 'post', 
	'posts_per_page' => 8, 
	'paged' => get_query_var('paged'),
	'meta_query' => [ [
		'key' => 'is_event',
		'value' => true,
	] ],
));
if($wp_query->have_posts()): 
	?>

	<section class="slider-4n-block">
		<div class="content-width">
			<h2><?php the_title() ?></h2>
			<div class="nav-wrap">
				<div class="swiper-button-next next-4n-1"><img src="<?= get_stylesheet_directory_uri() ?>/img/arrow-r.svg" alt=""></div>
				<div class="swiper-button-prev prev-4n-1"><img src="<?= get_stylesheet_directory_uri() ?>/img/arrow-l.svg" alt=""></div>
			</div>
			<div class="slider-wrap">
				<div class="swiper slider-4n slider-4n-1">
					<div class="swiper-wrapper">

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

							<div class="swiper-slide">
								
								<?php get_template_part('parts/content', 'post') ?>

							</div>

						<?php endwhile; ?>

						<?php get_template_part('parts/pagination') ?>


					</div>
				</div>
			</div>
		</div>
	</section>

	<?php 
endif; 
wp_reset_query(); 
?>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>