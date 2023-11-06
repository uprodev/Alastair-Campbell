<?php get_header(); ?>

<div class="bg-white">

	<?php get_template_part('parts/breadcrumbs') ?>

	<section class="info-text">
		<div class="content-width">
			<div class="content">
				<div class="img-wrap">

					<?php if (has_post_thumbnail()): ?>
						<figure>
							<?php the_post_thumbnail('full') ?>
						</figure>
					<?php endif ?>
					
					<?php if(have_rows('items')): ?>

						<ul>

							<?php while(have_rows('items')): the_row() ?>

								<li>

									<?php if ($field = get_sub_field('title')): ?>
										<p><?= $field ?></p>
									<?php endif ?>

									<?php if ($field = get_sub_field('text')): ?>
										<p><?= $field ?></p>
									<?php endif ?>

								</li>

							<?php endwhile ?>

						</ul>

					<?php endif ?>

				</div>
				<div class="text">
					<div class="wrap">
						<h1><?php the_title() ?></h1>

						<?php if ($field = get_field('short_description')): ?>
							<h6><?= $field ?></h6>
						<?php endif ?>
						
						<div class="btn-wrap">

							<?php if ($field = get_field('amazon_link')): ?>
								<a href="<?= $field ?>" class="btn-img btn-black"><img src="<?= get_stylesheet_directory_uri() ?>img/icon-3.svg" alt=""><?php _e('Buy on amazon', 'Campbell') ?></a>
							<?php endif ?>

							<?php if(have_rows('purchase_options')): ?>

								<div class="nice-select" tabindex="0">
									<span class="current"><?php _e('Other purchase options', 'Campbell') ?></span>
									<ul class="list">
										<li data-value="0" class="option selected"><?php _e('Other purchase options', 'Campbell') ?></li>

										<?php while(have_rows('purchase_options')): the_row() ?>

											<?php if ($field = get_sub_field('link')): ?>
												<li data-value="<?= get_row_index() ?>" class="option"><a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a></li>
											<?php endif ?>

										<?php endwhile ?>

									</ul>
								</div>

							<?php endif ?>

						</div>

						<?php if ($field = get_field('description')): ?>
							<?= $field ?>
						<?php endif ?>

						<?php if ($field = get_field('quote')['text']): ?>
							<blockquote>“<span><?= $field ?></span>”</blockquote>
						<?php endif ?>

						<?php if ($field = get_field('quote')['name']): ?>
							<p class="name"><?= $field ?></p>
						<?php endif ?>

					</div>

				</div>
			</div>
		</div>
	</section>
</div>

<?php get_template_part('parts/all', 'books', ['page_id' => 10856]) ?>

<?php get_template_part('parts/author') ?>

<?php get_footer(); ?>