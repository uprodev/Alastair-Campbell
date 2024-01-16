<?php get_header(); ?>

<?php 
$page_id = 10852;
$current_term = get_queried_object();

$article_cat_id = 1291;
$event_cat_id = 1290;
$podcast_cat_id = 1292;
$leading_cat_id = 1295;
$politics_cat_id = 1296;
$in_article_cat = in_category($article_cat_id, $featured_post->ID);

$sticky_posts = get_posts(['post__in' => get_option('sticky_posts'), is_tag() ? 'tag_id' : 'cat' => $current_term->term_id, 'posts_per_page' => 1]); 
$featured_post = $sticky_posts[0] ?: get_posts(['cat' => $current_term->term_id, 'posts_per_page' => 1])[0];

$podcast_cat_image = '';
if(in_category($leading_cat_id, $featured_post->ID)) $podcast_cat_image = 12895;
if(in_category($politics_cat_id, $featured_post->ID)) $podcast_cat_image = 13328;
?>

<?php if ($featured_post): ?>
	<div class="bg-white">

		<?php get_template_part('parts/breadcrumbs') ?>

		<?php if ($current_term->parent == $podcast_cat_id): ?>
			<section class="title-img-text">
				<div class="content-width">
					<div class="title-wrap">
						<h1><?= $current_term->name ?></h1>
					</div>
					<figure>
						<?= in_category($leading_cat_id, $featured_post->ID) || in_category($politics_cat_id, $featured_post->ID) ? wp_get_attachment_image($podcast_cat_image, 'full') : get_the_post_thumbnail($featured_post->ID, 'full') ?>
					</figure>
					<div class="text">

						<?= term_description($current_term->term_id) ?>

						<?php if ($field = get_field('apple_podcast_link', 'term_' . $current_term->term_id)): ?>
							<div class="btn-wrap">
								<a href="<?= $field ?>" class="btn-img btn-black" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2.svg" alt=""><?php _e('View on apple podcasts', 'Campbell') ?></a>
							</div>
						<?php endif ?>

					</div>
				</div>
			</section>
		<?php else: ?>

			<?php $wprss_item_permalink = get_post_meta($featured_post->ID, 'wprss_item_permalink')[0] ?>

			<section class="blog-banner<?php if($current_term->parent == $podcast_cat_id) echo ' podcast_subcategory' ?>">
				<div class="content-width">
					<div class="content">
						<div class="title">
							<h2><?php _e('Featured', 'Campbell') ?></h2>
						</div>
						<div class="right">

							<?php if (has_post_thumbnail($featured_post->ID)): ?>
								<figure>
									<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink($featured_post->ID) ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>>
										<?= get_the_post_thumbnail($featured_post->ID, 'full') ?>
									</a>
								</figure>
							<?php elseif ($field = get_field('_video_format_urls', $featured_post->ID)): ?>
								<div class="video-block">
									<?= $field ?>
								</div>
							<?php endif ?>

							<div class="text">

								<?php if ($current_term->term_id == $event_cat_id): ?>
									<div class="date-block">
										<p class="big"><?= get_the_date('j') ?></p>
										<p><?= get_the_date('M Y') ?></p>
									</div>
								<?php endif ?>
								
								<h1>
									<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink($featured_post->ID) ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>>
										<?= get_the_title($featured_post->ID) ?>

										<?php if ($in_article_cat): ?>
											<img src="<?= get_stylesheet_directory_uri() ?>/img/web-1.svg" alt="">
										<?php endif ?>

									</a>
								</h1>

								<?php if (get_the_excerpt($featured_post->ID)): ?>
									<span class="excerpt">
										<?= get_excerpt(200, $featured_post->ID) ?>
									</span>
									<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink() ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>><?php _e('Continue', 'Campbell') ?>

									<?php if (in_category($article_cat_id, get_the_ID())): ?>
										<img src="<?= get_stylesheet_directory_uri() ?>/img/web-1.svg" alt="">
									<?php else: ?>
										<i class="far fa-long-arrow-right"></i></a>
									<?php endif ?>

								</a>
							<?php endif ?>

							<ul>

								<?php $terms = wp_get_object_terms($featured_post->ID, 'category') ?>

								<?php if ($terms): ?>

									<?php foreach ($terms as $term): ?>

										<?php if ($term->parent == 0): ?>
											<li>
												<p class="tag" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><a href="<?= get_term_link($term->term_id) ?>"><?= get_field('singular_name', 'term_' . $term->term_id) ?: $term->name ?></a></p>
											</li>
										<?php endif ?>

									<?php endforeach ?>

								<?php endif ?>

								<?php if ($current_term->term_id != $event_cat_id): ?>
									<li>
										<p class="date"><?= get_the_date('j F Y', $featured_post->ID) ?></p>
									</li>
								<?php endif ?>

								<li>
									<p><?= __('Posted by', 'Campbell') . ' ' ?><a href="<?= get_author_posts_url(get_post_field('post_author', $featured_post->ID)) ?>"><?= get_the_author_meta('display_name', get_post_field('post_author', $featured_post->ID)); ?></a></p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif ?>
</div>
<?php wp_reset_query() ?>
<?php endif ?>

<?php 
$parent_term = $current_term->parent == $podcast_cat_id ? $podcast_cat_id : 0;
$terms = get_terms( [
	'taxonomy' => 'category',
	'hide_empty' => false,
	'parent' => $parent_term,
	'orderby' => 'none',
] )
?>

<?php if ($terms): ?>
	<section class="shop-tabs blog-tabs">
		<div class="content-width">
			<div class="tabs">
				<div>
					<ul class="tabs-menu">
						<li><a href="<?php the_permalink($page_id) ?>"><?php _e('All', 'Campbell') ?></a></li>

						<?php foreach ($terms as $term): ?>

							<?php if ($term->term_id != 1294): ?>
								<li<?php if($term->term_id == get_queried_object_id()) echo ' class="is-active"' ?>>
									<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
								</li>
							<?php endif ?>

						<?php endforeach ?>

					</ul>

					<?php if (is_active_sidebar('post-sidebar') && is_category(1)) dynamic_sidebar('post-sidebar') ?>
					
				</div>

				<?php 
				$args = array(
					is_tag() ? 'tag_id' : 'cat' => $current_term->term_id, 
					'posts_per_page' => 8,
					'paged' => get_query_var('paged')
				);
				if($parent_term != $podcast_cat_id) $args['post__not_in'] = [$featured_post->ID];
				$wp_query = new WP_Query($args);
				if($wp_query->have_posts()): 
					?>

					<div class="tab-content">
						<div class="tab-item">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

								<?php get_template_part('parts/content', 'post_blog', ['current_term' => $current_term]) ?>

							<?php endwhile; ?>

							<?php get_template_part('parts/pagination') ?>

						</div>
					</div>

				<?php endif ?>

			</div>
		</div>
	</section>

	<?php 
endif;
wp_reset_query(); 
?>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>