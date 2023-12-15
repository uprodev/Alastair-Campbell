<?php get_header(); ?>

<section class="slider-4n-block">
	<div class="content-width">
		<h2><?php _e('You were looking for') ?>: <?= get_search_query() ?></h2>
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

		<?php get_template_part('parts/pagination') ?>
		
	</div>
</section>

<?php get_footer(); ?>