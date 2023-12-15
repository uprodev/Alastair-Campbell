<?php get_header(); ?>

<section class="shop-tabs blog-tabs">
	<div class="content-width">

		<?php 
		$wp_query = new WP_Query(array('post_type' => 'post', 's' => get_search_query(), 'posts_per_page' => 12, 'paged' => get_query_var('paged')));
		if($wp_query->have_posts()): 
			?>

			<h2><?php _e('You were looking for') ?>: <?= get_search_query() ?></h2>

			<div class="tab-content">
				<div class="tab-item">

					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

						<?php get_template_part('parts/content', 'post_blog') ?>

					<?php endwhile; ?>

				</div>

				<?php get_template_part('parts/pagination') ?>
				
			</div>

		<?php else: ?>
			<h2><?php _e('Nothing found') ?></h2>
		<?php endif ?>

	</div>
</section>

<?php get_footer(); ?>