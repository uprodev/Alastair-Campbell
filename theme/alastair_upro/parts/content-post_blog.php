<?php 
$article_cat_id = 1291;
$in_article_cat = in_category($article_cat_id);
$wprss_item_permalink = get_post_meta(get_the_ID(), 'wprss_item_permalink')[0];

$podcast_cat_image = '';
if(in_category(1295)) $podcast_cat_image = 12895;
if(in_category(1296)) $podcast_cat_image = 7721;
?>

<div class="item-blog">

	<?php if ($field = get_field('_video_format_urls')): ?>
		<div class="video-block">
			<?= $field ?>
		</div>
	<?php else: ?>
		<figure>
			<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink() ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>>
				<?= in_category(1295) || in_category(1296) ? wp_get_attachment_image($podcast_cat_image, 'full') : get_the_post_thumbnail(get_the_ID(), 'full') ?>
			</a>
		</figure>
	<?php endif ?>

	<div class="text<?php if(has_category(1290)) echo ' text-event' ?>">
		<div class="wrap">

			<?php if (has_category(1290)): ?>
				<div class="date-block">
					<p class="big"><?= get_the_date('j') ?></p>
					<p><?= get_the_date('M Y') ?></p>
				</div>
				<div class="wrap-text">
					<p class="h6">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</p>

					<?php if (get_the_excerpt()): ?>
						<span class="excerpt">
							<?= get_excerpt(200) ?>
						</span>
						<a href="<?php the_permalink() ?>"><?php _e('Continue', 'Campbell') ?><i class="far fa-long-arrow-right"></i></a>
					<?php endif ?>

				</div>
			<?php else: ?>
				<p class="h6">
					<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink() ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>><?php the_title() ?></a>
				</p>

				<?php if (get_the_excerpt()): ?>
					<span class="excerpt">
						<?= get_excerpt(200) ?>
					</span>
					<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink() ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>>
						<?php _e('Continue', 'Campbell') ?>

						<?php if (in_category($article_cat_id, get_the_ID())): ?>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/web-1.svg" alt="">
						<?php else: ?>
							<i class="far fa-long-arrow-right"></i></a>
						<?php endif ?>
						
					</a>

				<?php endif ?>

				<p class="date"><?= get_the_date('j F Y') ?></p>
			<?php endif ?>
		</div>
		<div class="bottom">

			<?php if ($args['is_blog']): ?>

				<?php $terms = wp_get_object_terms(get_the_ID(), 'category') ?>

				<?php if ($terms): ?>

					<?php foreach ($terms as $term): ?>

						<?php if ($term->parent == 0): ?>
							<p class="tag" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><a href="<?= get_term_link($term->term_id) ?>"><?= get_field('singular_name', 'term_' . $term->term_id) ?: $term->name ?></a></p>
						<?php endif ?>

					<?php endforeach ?>

				<?php endif ?>

			<?php else: ?>

				<?php $terms = wp_list_pluck(wp_get_object_terms(get_the_ID(), 'category'), 'term_id') ?>

				<?php if (in_array($args['current_term']->term_id, $terms)): ?>
					<?php 
					$term_id = $args['current_term']->term_id == 1295 || $args['current_term']->term_id == 1296 ? 1292 : $args['current_term']->term_id;
					$term_name = $args['current_term']->term_id == 1295 || $args['current_term']->term_id == 1296 ? get_term(1292)->name : $args['current_term']->name;
					?>

					<p class="tag" style="<?php if($field = get_field('label', 'term_' . $term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term_id)['color']) echo 'color: ' . $field . ';'; ?>"><a href="<?= get_term_link($term_id) ?>"><?= get_field('singular_name', 'term_' . $term_id) ?: $term_name ?></a></p>
				<?php endif ?>

			<?php endif ?>
			
			<p class="info<?php if(has_category(1291)) echo ' article' ?>"><?= __('Posted by', 'Campbell') . ' ' ?><a href="<?= get_author_posts_url(get_post_field('post_author', get_the_ID())) ?>"><?= get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())); ?></a></p>
		</div>
	</div>
</div>