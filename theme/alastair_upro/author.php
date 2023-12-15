<?php get_header(); ?>

<?php 
$wp_query = new WP_Query(array('post_type' => 'post', 'author' => get_queried_object_id(), 'posts_per_page' => 9, 'paged' => get_query_var('paged')));
if($wp_query->have_posts()): 
    ?>

<section class="shop-tabs blog-tabs">
	<div class="content-width">
		<div class="tabs">

				<div class="tab-content">
					<div class="tab-item">

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

							<?php get_template_part('parts/content', 'post_blog') ?>

						<?php endwhile; ?>

						<?php get_template_part('parts/pagination') ?>

					</div>
				</div>

		</div>
	</div>
</section>

<?php 
endif;
wp_reset_query(); 
?>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>