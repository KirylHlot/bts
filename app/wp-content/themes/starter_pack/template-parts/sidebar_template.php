<?php

function sidebarRouter($currient_page, $page_id)
{
  ?>
  <div class="sidebar" id="sidebar">
    <ul class="link_list">

      <? if ($currient_page === 'uslugi') {
        echo '<li class="sidebar_link currient"><a href="/uslugi">Услуги</a></li>';
        theBarLinksList($currient_page, $page_id);
      } else {
        echo '<li class="sidebar_link"><a href="/uslugi">Услуги</a></li>';
      } ?>

      <? if ($currient_page === 'remont-elektriki') {
        echo '<li class="sidebar_link currient"><a href="/remont-elektriki">Ремонт электрики</a></li>';
        theBarLinksList($currient_page, $page_id);
      } else {
        echo '<li class="sidebar_link"><a href="/remont-elektriki">Ремонт электрики</a></li>';
      } ?>

      <? if ($currient_page === 'gruzovoj-evakuator') {
        echo '<li class="sidebar_link currient"><a href="/gruzovoj-evakuator">Грузовой эвакуатор</a></li>';
        theBarLinksList($currient_page, $page_id);
      } else {
        echo '<li class="sidebar_link"><a href="/gruzovoj-evakuator">Грузовой эвакуатор</a></li>';
      } ?>

      <li class="sidebar_link"><a href="/prodazha-b-u-tehniki">Продажа б/у техники</a></li>

      <? if ($currient_page === 'razborka-gruzovikov') {
        echo '<li class="sidebar_link currient"><a href="/razborka-gruzovikov">Разборка грузовиков</a></li>';
        theBarLinksList($currient_page, $page_id);
      } else {
        echo '<li class="sidebar_link"><a href="/gruzovoj-evakuator">Разборка грузовиков</a></li>';
      } ?>

    </ul>
  </div>
<?
}

function theBarLinksList($currient_page, $page_id)
{
  ?>
  <li class="bar_list">
    <ul class="bar">
      <?
      $query = new WP_Query(array(
        'posts_per_page' => 15,
        'category_name' => $currient_page,
        'post_status' => 'publish'
      ));
      while ($query->have_posts()) {
        $query->the_post();
        ?>
          <li class="barlink <?= $page_id === get_the_ID()? ' currient_page': ''; ?>">
            <a href="<? the_permalink(); ?>"><? the_title(); ?></a>
          </li>
        <?
      };
      wp_reset_postdata();
      ?>
    </ul>
  </li>
<? }