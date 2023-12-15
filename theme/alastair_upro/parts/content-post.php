<?php 
$article_cat_id = 1291;
$in_article_cat = in_category($article_cat_id);
$wprss_item_permalink = get_post_meta(get_the_ID(), 'wprss_item_permalink')[0];

$podcast_cat_image = '';
if(in_category(1295)) $podcast_cat_image = 12895;
if(in_category(1296)) $podcast_cat_image = 7721;
?>

<?php if ($field = get_field('_video_format_urls')): ?>
	<div class="video-block">
		<?= $field ?>
	</div>
<?php else: ?>
	<figure>
		<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink() ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>>
			<?= in_category(1295) || in_category(1296) ? wp_get_attachment_image($podcast_cat_image, 'full') : get_the_post_thumbnail(get_the_ID(), 'full') ?>
		</a>
	</figure>
<?php endif ?>

<div class="text">
	<p class="h6">
		<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink() ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>><?php the_title() ?></a>
	</p>
	<?php if (get_the_excerpt()): ?>
		<span class="excerpt">
			<?= get_excerpt(200) ?>
		</span>
		<a href="<?= $in_article_cat ? $wprss_item_permalink : get_the_permalink() ?>"<?php if($in_article_cat) echo ' target="_blank"' ?>><?php _e('Continue', 'Campbell') ?>

		<?php if (in_category($article_cat_id, get_the_ID())): ?>
			<img src="<?= get_stylesheet_directory_uri() ?>/img/web-1.svg" alt="">
		<?php else: ?>
			<i class="far fa-long-arrow-right"></i></a>
		<?php endif ?>

	</a>
<?php endif ?>

<?php $terms = wp_get_object_terms(get_the_ID(), 'category') ?>

<?php if ($terms): ?>
	<div class="btn-wrap">

		<?php foreach ($terms as $term): ?>

			<?php if ($term->parent == 0): ?>
				<a href="<?= get_term_link($term->term_id) ?>" class="btn-color" style="<?php if($field = get_field('label', 'term_' . $term->term_id)['border']) echo 'border-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['background']) echo 'background-color: ' . $field . ';'; if($field = get_field('label', 'term_' . $term->term_id)['color']) echo 'color: ' . $field . ';'; ?>"><?= get_field('singular_name', 'term_' . $term->term_id) ?: $term->name ?></a>
			<?php endif ?>

		<?php endforeach ?>

	</div>
<?php endif ?>

</div>