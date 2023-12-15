<?php get_header(); ?>

<?php 
$terms = get_terms( [
	'taxonomy' => 'category',
	'hide_empty' => false,
	'child_of' => get_queried_object_id(),
] );

if($terms): 
	?>

	<section class="block-2n">
		<div class="content-width">

			<?php foreach ($terms as $index => $term): ?>

				<?php if ($term->term_id == 1295 || $term->term_id == 1296): ?>
					<?php get_template_part('parts/content', 'podcast_category', ['term_id' => $term->term_id, 'term_name' => $term->name]) ?>
				<?php endif ?>

			<?php endforeach ?>

		</div>
	</section>
	<div class="line">
		<div class="content-width"></div>
	</div>

	<?php get_template_part('parts/socials') ?>

<?php endif ?>

<?php get_template_part('parts/latest') ?>

<?php get_footer(); ?>