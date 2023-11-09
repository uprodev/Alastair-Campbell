<?php get_header(); ?>

<div class="bg-white ">

	<?php get_template_part('parts/breadcrumbs') ?>

	<section class="default-page">
		<div class="content-width">
			<div class="content">

				<div class="main">
					<h1><?php the_title() ?></h1>
					<div class="wrap">

						<?php if (has_post_thumbnail()): ?>
							<figure>
								<?php the_post_thumbnail('full') ?>
							</figure>
						<?php endif ?>
						
						<?php the_content() ?>

					</div>
				</div>

				<div class="aside">

					<?php if (is_active_sidebar('my-sidebar')) dynamic_sidebar('my-sidebar') ?>

				</div>

			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>