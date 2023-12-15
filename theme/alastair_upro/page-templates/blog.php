<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<?php $page_id = get_queried_object_id() ?>

<?php if ($post = get_field('post_1', $page_id)): ?>

	<?php 
	$article_cat_id = 1291;
	$in_article_cat = in_category($article_cat_id, $post->ID);
	$wprss_item_permalink = get_post_meta($post->ID, 'wprss_item_permalink')[0];
	?>

	<div class="bg-white">
		<section class="blog-banner">
			<div class="content-width">
				<div class="content">

					<?php if ($field = get_field('title_1', $page_id)): ?>
						<div class="title">
							<h2><?= $field ?></h2>
						</div>
					<?php endif ?>

					<div class="right">

						<?php if (has_post_thumbnail($post->ID)): ?>
							<figure>
								<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink($post->ID) ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>>
									<?= get_the_post_thumbnail($post->ID, 'full') ?>
								</a>
							</figure>
						<?php endif ?>

						<div class="text">
							<h1>
								<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink($post->ID) ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>><?= get_the_title($post->ID) ?></a>
							</h1>
							<ul>

								<?php $terms = wp_get_object_terms($post->ID, 'category') ?>

								<?php if ($terms): ?>

									<?php foreach ($terms as $term): ?>
										<li>
											<p class="tag" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><a href="<?= get_term_link($term->term_id) ?>"><?= get_field('singular_name', 'term_' . $term->term_id) ?: $term->name ?></a></p>
										</li>
									<?php endforeach ?>

								<?php endif ?>

								<li>
									<p class="date"><?= get_the_date('j F Y', $post->ID) ?></p>
								</li>
								<li>
									<p><?= __('Posted by', 'Campbell') . ' ' ?><a href="<?= get_author_posts_url(get_post_field('post_author', $post->ID)) ?>"><?= get_the_author_meta('display_name', get_post_field('post_author', $post->ID)); ?></a></p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php endif ?>

<?php get_template_part('parts/all', 'posts', ['page_id' => $page_id]) ?>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>