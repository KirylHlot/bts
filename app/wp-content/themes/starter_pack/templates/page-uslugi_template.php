<?php
/*
  Template Name: Страница услуги
*/
?>
<?
$page_id = 48;
?>

<? get_header(); ?>


<section class="main">
  <div class="main_wrapper">
    <div class="sidebar" id="sidebar"></div>
    <div class="main_content_wrapper">
      <? if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
      }; ?>

      <h1 class="h1_title">Наши услуги</h1>
      <div class="content">
        <?= get_the_content(false, false, $page_id ); ?>
      </div>

    </div>
  </div>
</section>














<? ourWorksGalary(); ?>
<? whichAutoWeService(); ?>
<? mailSection(); ?>
<? get_footer(); ?>
