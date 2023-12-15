<?php 
$podcast_cat_image = '';
if($args['term_id'] == 1295) $podcast_cat_image = 12895;
if($args['term_id'] == 1296) $podcast_cat_image = 13328;

$last_post = new WP_Query(array('post_type' => 'post', 'cat' => $args['term_id'], 'posts_per_page' => 1));
if ($last_post->have_posts()): 
	?>

	<div class="item">
		<a href="<?= get_term_link($args['term_id']) ?>">
			<h2><?= $args['term_name'] ?></h2>
		</a>

		<?php while ($last_post->have_posts()): $last_post->the_post(); ?>
			<div class="iframe-wrap">
				<figure>
					<?= wp_get_attachment_image($podcast_cat_image, 'full') ?>
				</figure>
				<div class="text">
					<p class="episode_date"><?= get_the_date('j M Y') ?></p>
					<a href="<?php the_permalink() ?>" class="episode_title"><?= get_the_title() ?></a>
					<?= get_first_paragraph(get_the_content()) ?>
				</div>

				<div class="player-wrap">

					<?php
					$src = get_post_meta(get_the_ID(), 'wprss_item_permalink', true);
					$src = $args['term_id'] == 1270 ? $src : explode('?', $src)[0];
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
			</div>

		<?php endwhile; ?>

		<div class="text">
			<?= term_description($args['term_id']) ?>
			<div class="btn-wrap">
				<a href="<?= get_term_link($args['term_id']) ?>" class="btn-default"><?php _e('View all episodes', 'Campbell') ?></a>
			</div>

		</div>
	</div>

	<?php 
endif;
wp_reset_query(); 
?>