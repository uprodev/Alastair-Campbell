<section class="author">
	<div class="content-width">
		<div class="content">

			<?php if ($field = get_field('image_1', 'option')): ?>
				<figure>
					<?= wp_get_attachment_image($field['ID'], 'full') ?>
				</figure>
			<?php endif ?>
			
			<div class="text">

				<?php if ($field = get_field('text_1', 'option')): ?>
					<?= $field ?>
				<?php endif ?>
				
				<?php if ($field = get_field('link_1', 'option')): ?>
					<div class="btn-wrap">
						<a href="<?= $field['url'] ?>" class="btn-default btn-white"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
					</div>
				<?php endif ?>

			</div>
		</div>
	</div>
</section>
<div class="line">
	<div class="content-width"></div>
</div>