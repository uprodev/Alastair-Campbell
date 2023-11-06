<?php if (has_post_thumbnail()): ?>
	<figure>
		<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail('full') ?>
		</a>
	</figure>
<?php endif ?>

<div class="text">
	<p class="h6">
		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
	</p>
	<?php the_excerpt() ?>

	<?php $terms = wp_get_object_terms(get_the_ID(), 'category') ?>

	<?php if ($terms): ?>
		<div class="btn-wrap">

			<?php foreach ($terms as $term): ?>
				<a href="<?= get_term_link($term->term_id) ?>" class="btn-color" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><?= $term->name ?></a>
			<?php endforeach ?>

		</div>
	<?php endif ?>
	
</div>