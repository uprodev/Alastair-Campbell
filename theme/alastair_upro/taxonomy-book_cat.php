<?php get_header(); ?>

<?php $page_id = 10856 ?>

<?php if ($field = get_field('book_1', $page_id)): ?>
	<div class="bg-white">
		<section class="title-img-buy">
			<div class="content-width">

				<?php if ($title = get_field('title_1', $page_id)): ?>
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

					<?php if ($label = get_field('label_1', $page_id)): ?>
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

<?php $terms = get_terms( [
	'taxonomy' => 'book_cat',
	'hide_empty' => false,
] ) ?>

<?php if ($terms): ?>
	<section class="shop-tabs">
		<div class="content-width">
			<div class="tabs">
				<ul class="tabs-menu">
					<li>
						<a href="<?php the_permalink($page_id) ?>"><?php _e('All books', 'Campbell') ?></a>
					</li>

					<?php foreach ($terms as $term): ?>
						<li<?php if($term->term_id == get_queried_object_id()) echo ' class="is-active"' ?>>
							<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
						</li>
					<?php endforeach ?>

				</ul>

				<?php if ( have_posts() ) : ?> 

					<div class="tab-content">
						<div class="tab-item">

							<?php while ( have_posts() ) : the_post(); ?>

								<div class="item">
									<?php get_template_part('parts/content', 'book', ['page_id' => $page_id]) ?>
								</div>

							<?php endwhile ?>

							<?php get_template_part('parts/pagination') ?>

						</div>
					</div>

				<?php endif ?>

			</div>
		</div>
	</section>
<?php endif ?>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>