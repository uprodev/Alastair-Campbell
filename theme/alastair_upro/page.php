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

				<?php if (is_page(10860) || is_page(10862) || is_page(11166)): ?>

				<div class="aside">

					<?php 
					switch (get_the_ID()) {
						case 10860:
						if (is_active_sidebar('about-sidebar')) dynamic_sidebar('about-sidebar');
						break;
						case 10862:
						if (is_active_sidebar('contact-sidebar')) dynamic_sidebar('contact-sidebar');
						break;
						case 11166:
						if (is_active_sidebar('charity-sidebar')) dynamic_sidebar('charity-sidebar');
						break;

						default:
						break;
					}
					?>

				</div>
				
			<?php endif ?>


		</div>
	</div>
</section>
</div>

<?php get_footer(); ?>