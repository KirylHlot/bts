<?php
/*
  Template Name: Главная страница
*/
?>
<? get_header(); ?>
<?
$page_id = 11;
?>
  <header id="header" class="main_page_header">
    <div class="header_wrapper">
      <div class="left_part">
        <?
        $counter = 0;
        if (have_rows('mp_header_carousel_list', $page_id)):
          while (have_rows('mp_header_carousel_list', $page_id)) : the_row(); ?>
            <div class="carousuel_outer_inner <?= $counter == 0 ? '' : 'd_none'; ?>">
              <h2 class="h2_title"><? the_sub_field('slide_title'); ?></h2>
              <? if (get_sub_field('button_url') === '') { ?>
              <div class="button btn_white callback">
                <? } else { ?>
                <a href="<? the_sub_field('button_url'); ?>" class="button btn_white">
                  <? }
                  the_pencil_icon();
                  the_sub_field('button_title');
                  if (get_sub_field('button_url') === '') { ?>
              </div>
            <? } else {
              ?>
              </a>
            <? } ?>
            </div>
            <?
            $counter++;
          endwhile;
        endif;
        ?>
      </div>
      <div class="right_part">
        <div class="header_carousel_wrapper owl-carousel">
          <?
          if (have_rows('mp_header_carousel_list', $page_id)):
            while (have_rows('mp_header_carousel_list', $page_id)) : the_row(); ?>
              <div class="carousel_item" style="background-image: url('<?= get_sub_field('image')['url']; ?>')"></div>
            <? endwhile;
          endif;
          ?>
        </div>
        <div class="header_carousel_navs">
          <div class="header_carousel_nav_left navs">
            <? the_nav_icon('left'); ?>
          </div>
          <div class="header_carousel_nav_right navs">
            <? the_nav_icon(); ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="mp_service" class="mp_service">
    <div class="main_wrapper">
      <div class="left_part">
        <div class="service_thumb_wrapper"
             style="background-image: url('<?= get_field('mp_service_thumb', $page_id)['url']; ?>')">
        </div>
        <div class="thumb_description"><? the_field('mp_thumb_description', $page_id); ?></div>
      </div>
      <div class="right_part">
        <h2 class="h2_title"><? the_field('mp_service_title', $page_id) ?></h2>
        <div class="h2_desc"><? the_field('mp_service_title_desc', $page_id) ?></div>
        <div class="our_services_wrapper">
          <?
          $query = new WP_Query(array(
            'posts_per_page' => -1,
            'category_name' => 'uslugi',
            'post_status' => 'publish'
          ));
          $counter = 0;
          while ($query->have_posts() and $counter < 12) {
          $query->the_post(); ?>

          <? if ($counter == 0){ ?>
          <div class="my_column left_column">
            <? } else if ($counter == 6){ ?>
          </div>
          <div class="my_column right_column">
            <? } ?>
            <div class="service_item">
              <div class="number"><?
                $num = $counter + 1;
                if ($counter < 9) {
                  echo '0' . $num;
                } else {
                  echo $num;
                } ?>
              </div>
              <a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
            </div>
            <?
            $counter++;
            wp_reset_postdata();
            };
            ?>
          </div>
        </div>
        <div class="button_list">
          <a href="/uslugi" class="button">Все услуги</a>
          <span class="button simple_button claim">Оставить заявку</span>
        </div>
      </div>
    </div>
  </section>
  <? whichAutoWeService(); ?>
  <div id="mp_akcii" class="section mp_akcii">
    <div class="main_wrapper">
      <?
      $query = new WP_Query(array(
        'posts_per_page' => 2,
        'category_name' => 'akcii',
        'post_status' => 'publish'
      ));
      $counter = 0;
      while ($query->have_posts() and $counter < 2) {
        $query->the_post();
        posrPreviewItem(get_the_ID(), 250);
        $counter++;
      };
      wp_reset_postdata();
      ?>
    </div>
  </div>
  <section id="mp_about_us" class="mp_about_us">
    <div class="main_wrapper">
      <h2 class="h2_title"><? the_field('about_us_title', $page_id); ?></h2>
      <div class="about_us_content">
        <? the_field('about_us_content', $page_id); ?>
      </div>
      <div class="buttons_line">
        <a href="/o-kompanii" class="button">О компании</a>
        <div class="button simple_button claim">
          <? the_pencil_icon(); ?>
          Записаться на ремонт
        </div>
      </div>
    </div>
  </section>
  <section id="mp_callback" class="mp_callback">
    <div class="main_wrapper">
      <h2 class="h2_title"><? the_field('otzyvy_title', $page_id) ?></h2>
      <div class="h2_desc"><? the_field('otzyvy_desc', $page_id) ?></div>

      <div class="carousel_wrapper">
        <div class="mp_callback_carousel owl-carousel">

          <?
          $counter = 0;
          if (have_rows('callbacks_list', 64)):
            while (have_rows('callbacks_list', 64)) : the_row(); ?>
              <? if ($counter < 10) { ?>
                <div class="carousel_item">
                  <div class="name"><? the_sub_field('name'); ?></div>
                  <div class="service_type">Услуга: <? the_sub_field('usluga'); ?></div>
                  <div class="content"><? the_sub_field('content'); ?></div>
                </div>
                <?
                $counter++;
              }
            endwhile;
          endif;
          ?>
        </div>


        <div class="callback_carousel_navs">
          <div class="callback_carousel_nav_left navs">
            <? the_nav_icon('left'); ?>
          </div>
          <div class="callback_carousel_nav_right navs">
            <? the_nav_icon(); ?>
          </div>
        </div>



      </div>
    </div>
  </section>
  <? mailSection(); ?>
  <? mapSection(); ?>


<? get_footer(); ?>