<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<section class="home-banner">
	<div class="bg">

		<?php if ($field = get_field('video_1')): ?>
			<video muted autoplay loop poster="" ><source src="<?= $field['url'] ?>" type="video/mp4">
				<?php _e("Your browser doesn't support HTML5 video tag.", 'Campbell') ?>
			</video>
		<?php endif ?>

		<?php if ($field = get_field('image_1')): ?>
			<?= wp_get_attachment_image($field['ID'], 'full') ?>
		<?php endif ?>

	</div>

	<?php if ($field = get_field('text_1')): ?>
		<div class="content-width">
			<h1><?= $field ?></h1>
		</div>
	<?php endif ?>

</section>

<?php get_template_part('parts/latest') ?>

<?php get_template_part('parts/socials') ?>	

<?php get_template_part('parts/podcast_categories') ?>

<?php 
$args = array(
    'post_type' => 'book', 
    'posts_per_page' => -1, 
    'paged' => get_query_var('paged')
);
$wp_query = new WP_Query($args);
if($wp_query->have_posts()): 
    ?>

	<section class="slider-4n-block slider-4-5n-block">
		<div class="content-width">

			<?php if ($field = get_field('title_5')): ?>
				<a href="<?php the_permalink(10856) ?>">
					<h2><?= $field ?></h2>
				</a>
			<?php endif ?>

			<div class="nav-wrap">
				<div class="swiper-button-next next-4-5n"><img src="<?= get_stylesheet_directory_uri() ?>/img/arrow-r.svg" alt=""></div>
				<div class="swiper-button-prev prev-4-5n"><img src="<?= get_stylesheet_directory_uri() ?>/img/arrow-l.svg" alt=""></div>
			</div>
			<div class="slider-wrap">
				<div class="swiper slider-4-5n">
					<div class="swiper-wrapper">

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

							<div class="swiper-slide">

								<?php get_template_part('parts/content', 'book') ?>

							</div>
							
						<?php endwhile; ?>

					</div>
				</div>
			</div>

			<?php if ($field = get_field('link_text_5')): ?>
				<div class="btn-wrap">
					<a href="<?php the_permalink(10856) ?>" class="btn-default"><?= $field ?></a>
				</div>
			<?php endif ?>

		</div>
	</section>

<?php 
endif;
wp_reset_query(); 
?>

<div class="line">
	<div class="content-width"></div>
</div>

<?php if ($field = get_field('shortcode_6')): ?>
	<section class="slider-4n-block instagram-slider-block">
		<div class="content-width">

			<?php if ($title = get_field('title_6')): ?>
				<h2><?= $title ?></h2>
			<?php endif ?>

			<?= $field ?>

		</div>
	</section>
<?php endif ?>


<div class="line">
	<div class="content-width"></div>
</div>

<?php get_footer(); ?>