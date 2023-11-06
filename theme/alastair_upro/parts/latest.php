<?php 
$frontpage_id = 10850;
$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page'=> get_field('posts_per_page_2', $frontpage_id), 'paged' => get_query_var('paged')));
if($wp_query->have_posts()): 
	?>

	<section class="slider-4n-block">
		<div class="content-width">

			<?php if ($field = get_field('title_2', $frontpage_id)): ?>
				<h2><?= $field ?></h2>
			<?php endif ?>

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

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php 
endif;
wp_reset_query(); 
?>