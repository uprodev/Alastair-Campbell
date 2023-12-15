<?php get_header(); ?>

<?php if (have_posts()): ?>

	<section class="slider-4n-block">
		<div class="content-width">
			<h2><?php single_cat_title() ?></h2>
			<div class="nav-wrap">
				<div class="swiper-button-next next-4n-1"><img src="<?= get_stylesheet_directory_uri() ?>/img/arrow-r.svg" alt=""></div>
				<div class="swiper-button-prev prev-4n-1"><img src="<?= get_stylesheet_directory_uri() ?>/img/arrow-l.svg" alt=""></div>
			</div>
			<div class="slider-wrap">
				<div class="swiper slider-4n slider-4n-1">
					<div class="swiper-wrapper">

						<?php while (have_posts()) : the_post(); ?>

							<div class="swiper-slide">
								
								<?php get_template_part('parts/content', 'post') ?>

							</div>

						<?php endwhile; ?>
						
					</div>

					<?php get_template_part('parts/pagination') ?>

				</div>
			</div>
		</div>
	</section>

<?php endif ?>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>