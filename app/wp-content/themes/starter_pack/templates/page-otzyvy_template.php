<?php
/*
  Template Name: Страницы отзывы
*/
?>
<?
$page_id = 64;
?>

<? get_header(); ?>

<section class="main">
  <div class="main_wrapper">
    <div class="main_content_wrapper single">
      <? if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
      }; ?>
      <h1 class="h1_title"><? the_field('h1_title', $page_id); ?></h1>

      <div class="callbacks_list">
        <?
        $counter = 0;
        if (have_rows('callbacks_list', $page_id)):
          while (have_rows('callbacks_list', $page_id)) : the_row(); ?>
            <div class="carousel_item_greed">
              <div class="name"><? the_sub_field('name'); ?></div>
              <div class="service_type">Услуга: <? the_sub_field('usluga'); ?></div>
              <div class="content"><? the_sub_field('content'); ?></div>
            </div>
            <div class="gutter-sizer"></div>
            <?
            $counter++;
          endwhile;
        endif;
        ?>
      </div>
      <? if (false) { ?>
        <div id="show_else" class="button simple_button">загрузить еще</div>
      <? } ?>

    </div>
  </div>
</section>

<? mailSection(); ?>
<? get_footer(); ?>
