<?php if(have_rows('social_media', 'option')): ?>

	<section class="follow">
		<div class="content-width">

			<?php if ($field = get_field('title_3')): ?>
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
	</section>

<?php endif ?>