<div class="item-blog">

	<?php if (has_post_thumbnail()): ?>
		<figure>
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('full') ?>
			</a>
		</figure>
	<?php endif ?>

	<div class="text<?php if(get_field('is_event')) echo ' text-event' ?>">
		<div class="wrap">

			<?php if (get_field('is_event')): ?>
				<div class="date-block">
					<p class="big"><?= get_the_date('j') ?></p>
					<p><?= get_the_date('M Y') ?></p>
				</div>
				<div class="wrap-text">
					<p class="h6">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</p>

					<?php if ($excerpt = get_the_excerpt()): ?>
						<p><?= $excerpt ?></p>
					<?php endif ?>

				</div>
			<?php else: ?>
				<p class="h6">
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</p>
				<p class="date"><?= get_the_date('j F Y') ?></p>
			<?php endif ?>
		</div>
		<div class="bottom">
			<p class="info"><?= __('Posted by', 'Campbell') . ' ' ?><a href="<?= get_author_posts_url(get_post_field('post_author', get_the_ID())) ?>"><?= get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())); ?></a></p>

			<?php $terms = wp_get_object_terms(get_the_ID(), 'category') ?>

			<?php if ($terms): ?>

				<?php foreach ($terms as $term): ?>
					<p class="tag" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a></p>
				<?php endforeach ?>

			<?php endif ?>

		</div>
	</div>
</div>