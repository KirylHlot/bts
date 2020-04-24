<?php
/*
  Template Post Type: post
  Template Name: Категоия статьи
*/

?>
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
      <?
        $preview_block=get_field('preview_block');
        if( $preview_block ):  ?>
          <div class="preview_block">
            <div class="left_part" style="background-image: url('<?= $preview_block['image']['sizes']['medium_large']; ?>');"></div>
            <div class="right_part"><?= $preview_block['text']; ?></div>
          </div>
        <?
        endif;
      ?>
      <div class="content">
        <?=
        wpautop( get_the_content(null, false,  get_the_ID()) , $br = true );
        ?>
      </div>
      <a href="/stati" class="button simple_button center">
        К списку новостей
      </a>
    </div>
  </div>
</section>

<? mailSection(); ?>
<? get_footer(); ?>
