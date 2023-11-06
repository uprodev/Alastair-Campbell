<?php get_header(); ?>

<?php $page_id = 10852 ?>

<?php if ($post = get_field('post_1', $page_id)): ?>
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
								<a href="<?php the_permalink($post->ID) ?>">
									<?= get_the_post_thumbnail($post->ID, 'full') ?>
								</a>
							</figure>
						<?php endif ?>

						<div class="text">
							<h1>
								<a href="<?php the_permalink($post->ID) ?>"><?= get_the_title($post->ID) ?></a>
							</h1>
							<ul>

								<?php $terms = wp_get_object_terms($post->ID, 'category') ?>

								<?php if ($terms): ?>

									<?php foreach ($terms as $term): ?>
										<li>
											<p class="tag" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a></p>
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

<?php $terms = get_terms( [
	'taxonomy' => 'category',
	'hide_empty' => false,
] ) ?>

<?php if ($terms): ?>
	<section class="shop-tabs blog-tabs">
		<div class="content-width">
			<div class="tabs">
				<ul class="tabs-menu">
					<li><a href="<?php the_permalink($page_id) ?>"><?php _e('All', 'Campbell') ?></a></li>

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

								<?php get_template_part('parts/content', 'post_blog', /*['counter' => $wp_query->current_post]*/) ?>

							<?php endwhile; ?>

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