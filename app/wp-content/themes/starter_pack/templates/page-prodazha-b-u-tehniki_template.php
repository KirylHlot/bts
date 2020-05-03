<?php
/*
  Template Name: Страницы продажа б/у техники
*/
?>
<?
$page_id = 54;
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




      <div class="examples_list">
        <?
        $counter = 0;
        if (have_rows('technics_list', $page_id)):
          while (have_rows('technics_list', $page_id)) : the_row(); ?>
              <div class="exrmple_item">
                <div class="foto_wrapper" style="background-image: url('<?= get_sub_field('image')['url']; ?>')"></div>
                <div class="title"><? the_sub_field('title'); ?></div>
                <div class="content"><? the_sub_field('info'); ?></div>
              </div>
          <?
          endwhile;
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
<? mailSection(); ?>
<? get_footer(); ?>
