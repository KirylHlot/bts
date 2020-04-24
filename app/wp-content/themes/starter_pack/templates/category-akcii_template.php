<?php
/*
  Template Post Type: post
  Template Name: Категоия акции
*/
?>
<? get_header(); ?>


<section class="main">
  <div class="main_wrapper">
    <div class="main_content_wrapper single">
      <? if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
      }; ?>
      <h1 class="h1_title"><? the_field('h1_title', get_the_ID()); ?></h1>
      <div class="content">
        <?=
        wpautop( get_the_content(null, false,  get_the_ID()) , $br = true );
        ?>
      </div>
      <? filesList (get_the_ID()); ?>
      <a href="/akcii" class="button simple_button center">
        К списку акций
      </a>
    </div>
  </div>
</section>

<? mailSection(); ?>
<? get_footer(); ?>
