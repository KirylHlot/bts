<?php
/*
  Template Name: Страница цены
*/
?>
<?
$page_id = 68;
?>

<? get_header(); ?>
<section class="main">
  <div class="main_wrapper">
    <? sidebarRouter($post->post_name, $page_id); ?>
    <div class="main_content_wrapper">
      <? if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
      }; ?>
      <h1 class="h1_title"><? the_field('h1_title', $page_id); ?></h1>
      <div class="content">
        <?=
        wpautop( get_the_content(null, false, $page_id), $br = true );
        ?>
      </div>
      <? filesList($page_id); ?>
    </div>
  </div>
</section>
<? mailSection(); ?>
<? get_footer(); ?>
