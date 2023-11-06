</main>
<footer>
  <div class="content-width">

    <?php if ($field = get_field('footer_logo', 'option')): ?>
      <div class="logo-wrap">
        <a href="<?= get_home_url() ?>">
          <?= wp_get_attachment_image($field['ID'], 'full') ?>
        </a>
      </div>
    <?php endif ?>

    <div class="right">
      <nav class="footer-menu">

        <?php wp_nav_menu( array(
          'theme_location'  => 'footer',
          'container'       => '',
          'items_wrap'      => '<ul>%3$s</ul>'
        )); ?>

      </nav>

      <?php if(have_rows('social_media', 'option')): ?>

        <ul class="soc-list-btn">

          <?php while(have_rows('social_media', 'option')): the_row() ?>

              <li>
                <a href="<?php the_sub_field('url') ?>" target="_blank" >
                  <i class="<?php the_sub_field('icon') ?>"></i>
                  <span><?php the_sub_field('text_1') ?></span>
                </a>
              </li>

          <?php endwhile ?>

        </ul>

      <?php endif ?>

    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>