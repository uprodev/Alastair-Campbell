<?php
/*
Template Name: Podcasts
*/
?>

<?php get_header(); ?>

<?php 
$terms = get_terms( [
	'taxonomy' => 'podcast_cat',
	'hide_empty' => false,
] );
if($terms): 
	?>

	<?php foreach ($terms as $index => $term): ?>

		<?php if ($index % 2 == 0): ?>
			<section class="block-2n<?php if($index == count($terms) - 1) echo ' follow-50' ?>">
				<div class="content-width">
				<?php endif ?>

				<?php get_template_part('parts/content', 'podcast_category', ['term_id' => $term->term_id, 'term_name' => $term->name]) ?>

				<?php if ($index == count($terms) - 1): ?>

					<?php if(have_rows('social_media', 'option')): ?>

						<div class="item item-follow">
							<div class="wrap">

								<?php if ($field = get_field('title_3', 10850)): ?>
									<p class="title"><?= $field ?></p>
								<?php endif ?>

								<ul class="soc">

									<?php while(have_rows('social_media', 'option')): the_row() ?>

										<li>
											<a href="<?php the_sub_field('url') ?>" target="_blank" >
												<i class="<?php the_sub_field('icon') ?>"></i>
												<span><?php the_sub_field('text_2') ?></span>
											</a>
										</li>

									<?php endwhile ?>

								</ul>
							</div>
						</div>

					<?php endif ?>		

				<?php endif ?>

				<?php if ($index % 2 == 1 || $index == count($terms) - 1): ?>
				</div>
			</section>

			<?php if ($index % 2 == 1): ?>
				<div class="line">
					<div class="content-width"></div>
				</div>
			<?php endif ?>

		<?php endif ?>
		
	<?php endforeach ?>

<?php endif ?>

<?php get_template_part('parts/latest') ?>

<?php get_footer(); ?>