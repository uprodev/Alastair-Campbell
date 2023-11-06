<!doctype html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header>
    <div class="top-line">
      <div class="content-width">

        <?php if ($field = get_field('header_logo', 'option')): ?>
          <div class="logo-wrap">
            <a href="<?= get_home_url() ?>">
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            </a>
          </div>
        <?php endif ?>
        
        <nav class="top-menu">

          <?php wp_nav_menu( array(
            'theme_location'  => 'header',
            'container'       => '',
            'items_wrap'      => '<ul>%3$s</ul>'
          )); ?>

          <div class="search-btn">
            <a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/search.svg" alt=""></a>
          </div>
          <div class="open-menu">
            <a href="#">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
        </nav>
      </div>
    </div>
    
    <?php get_search_form() ?>

  </header>

  <div class="menu-responsive" id="menu-responsive" style="display: none">
    <div class="top">
      <div class="close-menu">
        <a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-menu.png" alt=""></a>
      </div>
    </div>
    <div class="wrap">

      <?php if ($field = get_field('header_logo', 'option')): ?>
        <div class="logo-wrap">
          <a href="<?= get_home_url() ?>">
            <?= wp_get_attachment_image($field['ID'], 'full') ?>
          </a>
        </div>
      <?php endif ?>
      
      <nav class="mob-menu">
        
        <?php wp_nav_menu( array(
          'theme_location'  => 'header',
          'container'       => '',
          'items_wrap'      => '<ul>%3$s</ul>'
        )); ?>

      </nav>
    </div>
  </div>

  <main>