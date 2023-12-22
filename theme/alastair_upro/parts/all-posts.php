<?php $terms = get_terms( [
	'taxonomy' => 'category',
	'hide_empty' => false,
	'parent' => 0,
	'orderby' => 'none',
] ) ?>

<?php if ($terms): ?>
	<section class="shop-tabs blog-tabs">
		<div class="content-width">
			<div class="tabs">
				<div>
					<ul class="tabs-menu">
						<li class="is-active"><a href="<?php the_permalink($args['page_id']) ?>"><?php _e('All', 'Campbell') ?></a></li>

						<?php foreach ($terms as $term): ?>
							<li>
								<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
							</li>
						<?php endforeach ?>

					</ul>

					<?php if (is_active_sidebar('post-sidebar') && $args['is_tags']) dynamic_sidebar('post-sidebar') ?>
					
				</div>

				<?php 
				$args_query = array(
					'post_type' => 'post', 
					'posts_per_page' => 8, 
					'paged' => get_query_var('paged'),
				);
				if($args['featured_post_id']) $args_query['post__not_in'] = array($args['featured_post_id']);
				$wp_query = new WP_Query($args_query);
				if($wp_query->have_posts()): 
					?>

					<div class="tab-content">
						<div class="tab-item">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

								<?php get_template_part('parts/content', 'post_blog', ['counter' => $wp_query->current_post, 'is_blog' => true]) ?>

								<?php 
							endwhile;
							?>

							<?php if (!$args['is_single']): ?>
								<?php get_template_part('parts/pagination') ?>
							<?php endif ?>

						</div>
					</div>

					<?php 
				endif; 
				wp_reset_query(); 
				?>

			</div>
		</div>
	</section>
	<?php endif ?>