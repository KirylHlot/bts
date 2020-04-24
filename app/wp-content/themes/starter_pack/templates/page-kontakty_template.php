<?php
/*
  Template Name: Страница контакты
*/
?>
<?
$page_id = 58;
?>

<? get_header(); ?>

<section class="main">
  <div class="main_wrapper">
    <div class="main_content_wrapper single">
      <? if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
      }; ?>
      <h1 class="h1_title"><? the_field('h1_title', $page_id); ?></h1>

      <div class="contacts_wrapper">
        <form id="mail_form" class="mail_form half_form">

          <div class="h2_title">Оставить заявку</div>
          <div class="desc">Пожалуйста, укажите Ваш номер телефона, и мы обязательно свяжемся с Вами в течение рабочего дня</div>
          <input type="hidden" name="page_title" value="Контакты">
          <input type="hidden" name="email" value="<? the_field('email_name', 'option'); ?>">
          <input type="text" name="name" placeholder="Ваше имя" required aria-label="name">
          <input type="number" name="phone" placeholder="Телефон" required aria-label="phone">
          <textarea name="comment" placeholder="Комментарий" aria-label="comment"></textarea>
          <button class="button">Отправить</button>
          <div class="allert_done mail_alerts d_none">Сообщение отправлено!</div>
          <div class="allert_false mail_alerts d_none">Ошибка отправления!</div>
        </form>
        <div class="contacts_content">
          <div class="content">
            <?=
            wpautop( get_the_content(null, false, $page_id), $br = true );
            ?>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>


<? mapSection(); ?>
<? get_footer(); ?>
