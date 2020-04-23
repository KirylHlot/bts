<?php
function posrPreviewItem ($post_id, $substring_count=250){?>
  <div class="post_preview_item">
    <h3 class="h3_title"><?= get_the_title($post_id); ?></h3>
    <div class="date">Задать в шаблоне дату!!!!</div>
    <div class="content"><? echo mb_substr(strip_tags(get_the_content(false, false, $post_id)), 0, $substring_count, 'UTF-8') . '...'; ?></div>
    <a href="<?= get_the_permalink($post_id); ?>" class="button">Читать далее</a>
  </div>
<?}