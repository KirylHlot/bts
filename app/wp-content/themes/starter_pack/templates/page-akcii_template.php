<?php
/*
  Template Name: Страница акции
*/
?>
<?
$page_id = 62;
?>

<? get_header(); ?>

<section class="main pb_0">
  <div class="main_wrapper">
    <div class="main_content_wrapper single">
      <? if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
      }; ?>
      <h1 class="h1_title"><? the_field('h1_title', $page_id); ?></h1>
      <div class="content mb_30">
        <?=
        wpautop( get_the_content(null, false, $page_id), $br = true );
        ?>
      </div>
      <div class="preview_list">
        <?
        $offset = 10;
        $category_name = 'akcii';
        $category_count = get_category(1)->category_count;
        $query = new WP_Query(array(
          'posts_per_page' => $offset,
          'category_name' => $category_name,
          'post_status' => 'publish'
        ));


        $counter = 0;
        while ($query->have_posts()) {
          $query->the_post();
          posrPreviewItem(get_the_ID(), 250, true);
          $counter++;
        };
        wp_reset_postdata();
        ?>
      </div>
      <?
      if($category_count > $offset){
        echo do_shortcode('[ajax_load_more container_type="div" scroll="false" post_type="post" offset="' . $offset . '" posts_per_page="' . $offset . '" category="' . $category_name . '" pause="true" button_label="Загрузить еще"]');
      }
      ?></div>
  </div>
</section>


<? mailSection(); ?>
<? get_footer(); ?>
