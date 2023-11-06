<?php get_header(); ?>

<?php $term_id = get_queried_object_id() ?>

<div class="bg-white">

	<?php get_template_part('parts/breadcrumbs') ?>

	<section class="title-img-text">
		<div class="content-width">
			<div class="title-wrap">
				<h1><?= single_term_title() ?></h1>
			</div>

			<?php if ($field = get_field('image', 'term_' . $term_id)): ?>
				<figure>
					<?= wp_get_attachment_image($field['ID'], 'full') ?>
				</figure>
			<?php endif ?>
			
			<div class="text">
				<?= term_description() ?>

				<?php if ($field = get_field('url', 'term_' . $term_id)): ?>
					<div class="btn-wrap">
						<a href="<?= $field ?>" class="btn-img btn-black" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2.svg" alt=""><?php _e('View on apple podcasts', 'Campbell') ?></a>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>
</div>

<?php 
$wp_query = new WP_Query(array(
	'post_type' => 'wprss_feed_item', 
	'meta_query' => [ [
		'key' => 'wprss_item_source_name',
		'value' => get_queried_object()->name,
	] ],
	'paged' => get_query_var('paged')));
if($wp_query->have_posts()): 
	?>

	<section class="episode">
		<div class="content-width">
			<div class="title-wrap">
				<p class="h3"><?php _e('All Episodes', 'Campbell') ?></p>
			</div>
			<div class="content">

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

					<?php if ($field = get_field('iframe')): ?>
						<!-- <div class="item">
							<?= $field ?>
						</div> -->
					<?php endif ?>

					<div class="item">
						<p class="episode_date"><?= get_the_date('j M Y') ?></p>
						<p class="episode_title"><?php the_title() ?></p>
						<?= get_first_paragraph(get_the_content()) ?>

						<?php
						$src = get_post_meta(get_the_id(), 'wprss_item_audio', true);
						$src = is_tax('podcast_cat', 1270) ? $src : explode('?', $src)[0];
						echo wp_audio_shortcode(
							[
								'src'      => $src,
								'loop'     => false,
								'autoplay' => false,
								'preload'  => 'none',
								'class'    => 'wp-audio-shortcode',
								'style'    => 'width: 100%; visibility: hidden;'
							]
						) ?>
					</div>

				<?php endwhile; ?>

				<?php get_template_part('parts/pagination') ?>

			</div>
		</div>
	</section>

	<?php 
endif;
wp_reset_query(); 
?>

<?php get_template_part('parts/socials') ?>	

<?php get_template_part('parts/latest') ?>

<?php get_footer(); ?>