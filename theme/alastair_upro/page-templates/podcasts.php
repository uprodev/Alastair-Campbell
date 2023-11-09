<?php
/*
Template Name: Podcasts
*/
?>

<?php get_header(); ?>

<?php 
$terms = get_field('categories');
if($terms): 
	?>

	<section class="block-2n">
		<div class="content-width">

			<?php foreach ($terms as $index => $term): ?>

				<?php get_template_part('parts/content', 'podcast_category', ['term_id' => $term->term_id, 'term_name' => $term->name]) ?>

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