<?php $images = get_field('gallery');
if($images): ?>

	<div class="swiper slider-img">
		<div class="swiper-wrapper">

			<?php foreach($images as $image): ?>

				<div class="swiper-slide">
					<a href="<?= $image['url'] ?>" data-fancybox="gallery">
						<?= wp_get_attachment_image($image['ID'], 'full') ?>
					</a>
				</div>

			<?php endforeach; ?>

		</div>
		<div class="swiper-button-next img-next"></div>
		<div class="swiper-button-prev img-prev"></div>
		<div class="swiper-pagination img-pagination"></div>
	</div>

	<?php endif; ?>