<?php get_header(); ?>

<section class="shop-tabs blog-tabs">
	<div class="content-width">
		<div class="tabs">

			<?php if ( have_posts() ) : ?> 

				<div class="tab-content">
					<div class="tab-item">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part('parts/content', 'post_blog') ?>

						<?php endwhile; ?>

						<?php get_template_part('parts/pagination') ?>

					</div>
				</div>

			<?php endif ?>

		</div>
	</div>
</section>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>