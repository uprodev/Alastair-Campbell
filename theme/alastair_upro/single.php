<?php get_header() ?>

<div class="bg-white ">

	<?php get_template_part('parts/breadcrumbs') ?>

	<section class="default-page">
		<div class="content-width">
			<div class="content">
				<div class="main">
					<h1><?php the_title() ?></h1>
					<ul class="info">

						<?php $terms = wp_get_object_terms(get_the_ID(), 'category') ?>

						<?php if ($terms): ?>

							<?php foreach ($terms as $term): ?>

								<?php if ($term->parent == 0): ?>
									<li>
										<p class="tag" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><?= get_field('singular_name', 'term_' . $term->term_id) ?: $term->name ?></p>
									</li>
								<?php endif ?>
								
							<?php endforeach ?>

						<?php endif ?>

						<li>
							<p class="date"><?= get_the_date('j F Y') ?></p>
						</li>
						<li>
							<p class="author-p"><?php _e('Posted by', 'Campbell') ?> <?= get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())); ?></p>
						</li>

						<li>
							<p class="author-p"><?= '<i class="far fa-comment"></i><span>' . get_comment_count(get_the_ID())['approved'] . '</span>' /*. ' ' . __('comments', 'Campbell')*/ ?></p>
						</li>
					</ul>

					<div class="wrap">
						
						<?php if ($field = get_field('_video_format_urls')): ?>
							<div class="video-block-single">
								<?= $field ?>
							</div>
						<?php elseif (has_post_thumbnail() && !in_category(1291)): ?>
						<figure>
							<?php the_post_thumbnail('full') ?>
						</figure>
					<?php endif ?>

					<?php if ($src = get_post_meta(get_the_ID(), 'wprss_item_permalink', true)): ?>
						<div class="player-wrap">

							<?php
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
					<?php endif ?>

					<?= get_the_content() ?>

				</div>
			</div>

			<?php $terms_ids = wp_get_object_terms(get_the_ID(), 'category', 'fields=ids') ?>

			<div class="aside">
				<div class="progress-wrap">
					<div class="icon">
						<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt="">
						<p><span><?= reading_time() ?></span> <?php _e('minute(s) read', 'Campbell') ?></p>
					</div>
					<div class="progress">
						<span style="width: 0"></span>
					</div>
				</div>

				<?php 
				$wp_query = new WP_Query(array('post_type' => 'post', 'cat' => $terms_ids, 'posts_per_page' => 4, 'post__not_in' => array(get_the_ID()), 'paged' => get_query_var('paged')));
				if($wp_query->have_posts()): 
					?>

					<?php 
					$term_name = '';
					if($terms) {
						foreach($terms as $term){
							if($term->parent == 0) $term_name = $term->name;
						}
					}
					?>

					<p class="h6"><?= __('Recent', 'Campbell') . ' ' . $term_name ?></p>

					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

						<?php 
						$podcast_cat_image = '';
						if(in_category(1295)) $podcast_cat_image = 12895;
						if(in_category(1296)) $podcast_cat_image = 13328; 
						?>

						<div class="item">
							<a href="<?php the_permalink() ?>">

								<?php if ($podcast_cat_image): ?>
									<figure>
										<?= wp_get_attachment_image($podcast_cat_image, 'full') ?>
									</figure>
								<?php elseif(has_post_thumbnail()): ?>
									<figure>
										<?php the_post_thumbnail('full') ?>
									</figure>
								<?php endif ?>

								<div class="text">
									<p class=""><?php the_title() ?></p>
									<p class="date"><?= get_the_date('j F Y') ?></p>
								</div>
							</a>
						</div>

					<?php endwhile; ?>
					<?php 
				endif;
				wp_reset_query(); 
				?>

			</div>
		</div>

		<?php comments_template() ?>

	</div>
</section>
</div>

<?php get_template_part('parts/all', 'posts', ['is_single' => true]) ?>

<?php get_footer(); ?>