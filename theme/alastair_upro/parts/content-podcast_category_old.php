<div class="item">
	<h2><?= $args['term_name'] ?></h2>
	
	<?php 
	$feeds = get_posts(array('post_type' => 'wprss_feed', 'posts_per_page' => -1));

	foreach ($feeds as $feed) {
		if ($feed->post_title == $args['term_name']) $image_url = get_post_meta($feed->ID, 'wprss_feed_image', true);
	}

	$feed_items = new WP_Query(array('post_type' => 'wprss_feed_item', 'meta_query' => [['key' => 'wprss_item_source_name', 'value' => $args['term_name'],]], 'posts_per_page' => 1)); 
	?>

	<?php if ($feeds && $feed_items->have_posts()): ?>

		<?php while ($feed_items->have_posts()): $feed_items->the_post(); ?>
			<div class="iframe-wrap">

				<?php if ($image_url): ?>
					<figure>
						<img src="<?= $image_url ?>" alt="">
					</figure>
				<?php endif ?>

				<div class="text">
					<p class="episode_date"><?= get_the_date('j M Y') ?></p>
					<p class="episode_title"><?= get_the_title() ?></p>
					<?= get_first_paragraph(get_the_content()) ?>
				</div>

				<div class="player-wrap">

					<?php
					$src = get_post_meta(get_the_ID(), 'wprss_item_audio', true);
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
		<?php 
	endif;
	wp_reset_query(); 
	?>

	<div class="text">

		<?php if ($field = get_field('excerpt', 'term_' . $args['term_id'])): ?>
			<p><?= $field ?></p>
		<?php endif ?>

		<div class="btn-wrap">
			<a href="<?= get_term_link($args['term_id']) ?>" class="btn-default"><?php _e('View all episodes', 'Campbell') ?></a>
		</div>

	</div>
</div>