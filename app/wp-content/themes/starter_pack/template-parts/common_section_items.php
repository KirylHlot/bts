<?php
function posrPreviewItem($post_id, $substring_count = 250, $is_accia = true)
{
  ?>
  <div class="post_preview_item">
    <h3 class="h3_title"><?= get_the_title($post_id); ?></h3>
    <? if ($is_accia) { ?>
      <div class="date"><? the_field('accia_period', $post_id); ?></div>
      <?
    } ?>
    <div
      class="content"><? echo mb_substr(strip_tags(get_the_content(false, false, $post_id)), 0, $substring_count, 'UTF-8') . '...'; ?></div>
    <a href="<?= get_the_permalink($post_id); ?>" class="button">Читать далее</a>
  </div>
  <?
}

function filesList($page_id)
{
  ?>
  <div class="files_list">
    <?
    $counter = 0;
    if (have_rows('price_list', $page_id)):
      while (have_rows('price_list', $page_id)) : the_row();
        $file = get_sub_field('file');
        $size = round($file['filesize'] / 1000);
        $url = $file['url'];
        $filetype = substr($file['filename'], -3);
        ?>
        <div class="file_item">
          <? if ($filetype === 'ocx' or $filetype === 'doc') {
            the_doc_icon();
          } else if ($filetype === 'pdf') {
            the_pdf_icon();
          } else {
            the_lsx_icon();
          } ?>
          <a href="<?= $url; ?>" class="info_wrapper">
            <div class="filename"><? the_sub_field('filename'); ?></div>
            <div class="filesize"><?= $size; ?>кб</div>
          </a>
          <a href="<?= $url; ?>" class="download">
            <? the_download_icon(); ?>
          </a>
        </div>
      <?
      endwhile;
    endif;
    ?>
  </div>
<? }

function the_fotogalary($page_id)
{
  if (have_rows('the_fotogalary', $page_id)): ?>
    <div class="the_fotogalary">
      <?
      while (have_rows('the_fotogalary', $page_id)) : the_row(); ?>
        <? $galary_img = get_sub_field('image'); ?>
        <a data-fancybox="galary" href="<? echo $galary_img['url']; ?>" class="image_item"
           style="background-image: url('<? echo $galary_img['sizes']['medium']; ?>')"></a>
      <? endwhile;
      ?>
    </div>
  <?
  endif;
}