<?php
/*
Template Name: Books
*/
?>

<?php get_header(); ?>

<?php $page_id = get_the_ID() ?>

<?php if ($field = get_field('book_1')): ?>
	<div class="bg-white">
		<section class="title-img-buy">
			<div class="content-width">

				<?php if ($title = get_field('title_1')): ?>
					<div class="title-wrap">
						<h2><?= $title ?></h2>
					</div>
				<?php endif ?>

				<?php if (has_post_thumbnail($field->ID)): ?>
					<figure>
						<?= get_the_post_thumbnail($field->ID, 'full') ?>
					</figure>
				<?php endif ?>

				<div class="text">

					<?php if ($label = get_field('label_1')): ?>
						<div class="label"><?= $label ?></div>
					<?php endif ?>

					<h1><?= get_the_title($field->ID) ?></h1>

					<?= get_the_content(null, false, $field->ID) ?>

					<div class="btn-wrap">

						<?php if ($url = get_field('amazon_link', $field->ID)): ?>
							<a href="<?= $url ?>" class="btn-img btn-black" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-3.svg" alt=""><?php _e('Buy on amazon', 'Campbell') ?></a>
						<?php endif ?>

						<a href="<?php the_permalink($field->ID) ?>" class="btn-default"><?php _e('More info', 'Campbell') ?></a>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php endif ?>

<?php get_template_part('parts/all', 'books', ['page_id' => $page_id]) ?>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>