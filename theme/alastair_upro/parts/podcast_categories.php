<?php
$terms = get_field('items_4');
if($terms): ?>

	<section class="block-2n">
		<div class="content-width">

			<?php foreach($terms as $term): ?>
				<?php get_template_part('parts/content', 'podcast_category', ['term_id' => $term->term_id, 'term_name' => $term->name]) ?>
			<?php endforeach; ?>

		</div>
	</section>
	<div class="line">
		<div class="content-width"></div>
	</div>

	<?php wp_reset_postdata(); ?>
	<?php endif ?>