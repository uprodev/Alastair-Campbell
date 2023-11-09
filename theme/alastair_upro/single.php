<?php get_header(); ?>

<div class="bg-white ">

	<?php get_template_part('parts/breadcrumbs') ?>

	<section class="default-page">
		<div class="content-width">
			<div class="content">
				<div class="main">
					<h1><?php the_title() ?></h1>
					<ul class="info">

						<?php $terms = wp_get_object_terms(get_the_ID(), 'category') ?>

						<?php if ($terms): ?>

							<?php foreach ($terms as $term): ?>
								<li>
									<p class="tag" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><?= $term->name ?></p>
								</li>
							<?php endforeach ?>

						<?php endif ?>

						<li>
							<p class="date"><?= get_the_date('j F Y') ?></p>
						</li>
						<li>
							<p class="author-p"><?php _e('Posted by', 'Campbell') ?> <?= get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())); ?></p>
						</li>
					</ul>

					<div class="wrap">

						<?php if (has_post_thumbnail()): ?>
							<figure>
								<?php the_post_thumbnail('full') ?>
							</figure>
						<?php endif ?>
						
						<?php the_content() ?>

					</div>
				</div>
				<?php $terms = wp_get_object_terms(get_the_ID(), 'category', 'fields=ids') ?>

				<div class="aside">
					<div class="progress-wrap">
						<div class="icon">
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt="">
							<p><span><?= reading_time() ?></span> <?php _e('minute(s) read', 'Campbell') ?></p>
						</div>
						<div class="progress">
							<span style="width: 0"></span>
						</div>
					</div>

					<?php 
					$wp_query = new WP_Query(array('post_type' => 'post', 'cat' => $terms, 'posts_per_page' => 4, 'post__not_in' => array(get_the_ID()), 'paged' => get_query_var('paged')));
					if($wp_query->have_posts()): 
						?>

						<p class="h6"><?php _e('Related Articles', 'Campbell') ?></p>

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

							<div class="item">
								<a href="<?php the_permalink() ?>">

									<?php if (has_post_thumbnail()): ?>
										<figure>
											<?php the_post_thumbnail('full') ?>
										</figure>
									<?php endif ?>

									<div class="text">
										<p class=""><?php the_title() ?></p>
										<p class="date"><?= get_the_date('j F Y') ?></p>
									</div>
								</a>
							</div>

						<?php endwhile; ?>
						<?php 
					endif;
					wp_reset_query(); 
					?>

				</div>
			</div>
			
			<?php comments_template() ?>

		</div>
	</section>
</div>

<?php get_template_part('parts/all', 'posts', ['is_single' => true]) ?>

<?php get_footer(); ?>