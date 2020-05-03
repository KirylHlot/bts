<?php
/*
  Template Post Type: post
  Template Name: Категоия разборка грузовиков
*/

?>

<? get_header(); ?>
<section class="main">
  <div class="main_wrapper">

    <? sidebarRouter(get_the_category()[0] -> slug, get_the_ID()); ?>
    <div class="main_content_wrapper">
      <? if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
      }; ?>

      <h1 class="h1_title"><? the_field('h1_title', get_the_ID()); ?></h1>
      <div class="content">
        <?=
        wpautop( get_the_content(null, false, get_the_ID()), $br = true );
        ?>
      </div>
      <? the_fotogalary(get_the_ID()); ?>
    </div>
  </div>
</section>
<? ourWorksGalary(); ?>
<? mailSection(); ?>
<? get_footer(); ?>
