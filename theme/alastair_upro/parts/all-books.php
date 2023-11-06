<?php $terms = get_terms( [
	'taxonomy' => 'book_cat',
	'hide_empty' => false,
] ) ?>

<?php if ($terms): ?>
	<section class="shop-tabs">
		<div class="content-width">
			<div class="tabs">
				<ul class="tabs-menu">
					<li class="is-active">
						<a href="<?php the_permalink($args['page_id']) ?>"><?php _e('All books', 'Campbell') ?></a>
					</li>

					<?php foreach ($terms as $term): ?>
						<li>
							<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
						</li>
					<?php endforeach ?>

				</ul>

				<?php 
				$wp_query = new WP_Query(array('post_type' => 'book', 
					'posts_per_page' => 12, 
					'paged' => get_query_var('paged'),
				));
				if($wp_query->have_posts()): 
					?>

					<div class="tab-content">
						<div class="tab-item">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

								<div class="item">
									<?php get_template_part('parts/content', 'book', ['page_id' => $args['page_id']]) ?>
								</div>

							<?php endwhile; ?>

							<?php get_template_part('parts/pagination') ?>

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