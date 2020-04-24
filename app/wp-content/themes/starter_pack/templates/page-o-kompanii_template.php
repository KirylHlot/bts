<?php
/*
  Template Name: Страница о компании
*/
?>
<?
$page_id = 66;
?>

<? get_header(); ?>


<section class="main">
  <div class="main_wrapper">
    <div class="main_content_wrapper single">
      <? if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
      }; ?>
      <h1 class="h1_title"><? the_field('h1_title', $page_id); ?></h1>
      <div class="content">
        <?=
        wpautop( get_the_content(null, false, $page_id), $br = true );
        ?>
      </div>
      <div class="button simple_button claim">
        <? the_pencil_icon(); ?>
        Записаться на ремонт
      </div>
    </div>
  </div>
</section>
<? mailSection(); ?>
<? mapSection(); ?>
<? get_footer(); ?>
