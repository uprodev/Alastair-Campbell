<?php if (has_post_thumbnail()): ?>
	<figure>
		<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail('full') ?>
		</a>
	</figure>
<?php endif ?>

<div class="text">
	<p class="h6">
		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
	</p>
	<?php the_excerpt() ?>

	<?php if ($args['page_id'] && $args['page_id'] = 10856): ?>
		<div class="btn-wrap">
			<a href="<?php the_permalink() ?>" class="btn-default"><?php _e('More info', 'Campbell') ?></a>
		</div>
	<?php endif ?>

</div>