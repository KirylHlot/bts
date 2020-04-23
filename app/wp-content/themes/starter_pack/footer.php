<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter_pack
 */

?>


<footer id="footer" class="footer">
  <div class="main_wrapper">
    <div class="footer_column">
      <a href="/" class="logo_wrapper">
        <img src="<?= get_field('main_logo', 'options')['url']; ?>"
             alt="<?= get_field('main_logo', 'options')['alt']; ?>">
        <div class="logo_desc"><? the_field('logo_description', 'options'); ?></div>
      </a>
      <div class="button callback btn_white">Заказать звонок</div>
      <div class="phones_list">

        <div class="phones_list_item">
          <div class="title">Стол заказов</div>
          <div class="phones_wrapper">
            <?
            $counter = 0;
            $rows_count = count(get_field('cf_phone_zakaz_list', 'option'));
            if (have_rows('cf_phone_zakaz_list', 'option')):
              while (have_rows('cf_phone_zakaz_list', 'option')) :
                the_row();
                ?>
                <div class="single_phone_wrapper">
                  <a href="tel:<? the_sub_field('phone_visible'); ?>"
                     class="phone">
                    <? the_sub_field('phone_visible'); ?>
                  </a>
                  <? if (get_sub_field('is_whatsapp')) {
                    the_whatsapp_icon();
                  }; ?>
                  <? if (get_sub_field('is_wiber')) {
                    the_wiber_icon();
                  }; ?>
                  <? if (get_sub_field('is_telegram')) {
                    the_telegram_icon();
                  }; ?>
                </div>
                <?
                $counter++;
              endwhile;
            endif;
            ?>
          </div>
        </div>

        <div class="phones_list_item">
          <div class="title">Запчасти</div>
          <div class="phones_wrapper">
            <?
            $counter = 0;
            $rows_count = count(get_field('cf_phone_zapchast_list', 'option'));
            if (have_rows('cf_phone_zapchast_list', 'option')):
              while (have_rows('cf_phone_zapchast_list', 'option')) :
                the_row();
                ?>
                <div class="single_phone_wrapper">
                  <a href="tel:<? the_sub_field('phone_visible'); ?>"
                     class="phone">
                    <? the_sub_field('phone_visible'); ?>
                  </a>
                  <? if (get_sub_field('is_whatsapp')) {
                    the_whatsapp_icon();
                  }; ?>
                  <? if (get_sub_field('is_wiber')) {
                    the_wiber_icon();
                  }; ?>
                  <? if (get_sub_field('is_telegram')) {
                    the_telegram_icon();
                  }; ?>
                </div>
                <?
                $counter++;
              endwhile;
            endif;
            ?>
          </div>
        </div>

        <div class="phones_list_item">
          <div class="title">Эвакуация</div>

          <div class="phones_wrapper">
            <?
            $counter = 0;
            $rows_count = count(get_field('cf_phone_evakuacia_list', 'option'));
            if (have_rows('cf_phone_evakuacia_list', 'option')):
              while (have_rows('cf_phone_evakuacia_list', 'option')) :
                the_row();
                ?>
                <div class="single_phone_wrapper">
                  <a href="tel:<? the_sub_field('phone_visible'); ?>"
                     class="phone">
                    <? the_sub_field('phone_visible'); ?>
                  </a>
                  <? if (get_sub_field('is_whatsapp')) {
                    the_whatsapp_icon();
                  }; ?>
                  <? if (get_sub_field('is_wiber')) {
                    the_wiber_icon();
                  }; ?>
                  <? if (get_sub_field('is_telegram')) {
                    the_telegram_icon();
                  }; ?>
                </div>
                <?
                $counter++;
              endwhile;
            endif;
            ?>
          </div>


        </div>

        <a href="<? the_field('op_insta_url', 'options'); ?>" class="instagram">
          <? the_instagram_icon(); ?>
        </a>
        <div class="creater">
          <div class="title">Разработка и продвижение</div>
          <div class="logo">
            <? echo wp_get_attachment_image(233, 'full', "", array("class" => "")); ?>
          </div>
        </div>
      </div>

    </div>
    <div class="footer_column">
      <a href="/uslugi" class="c_title">Услуги</a>
      <?
      $query = new WP_Query(array(
        'posts_per_page' => -1,
        'category_name' => 'uslugi',
        'post_status' => 'publish'
      ));
      $counter = 0;
      while ($query->have_posts() and $counter < 20) {
        $query->the_post();
        ?>
        <a class="simple_link" href="<? the_permalink(); ?>"><? the_title(); ?></a>
        <?
        $counter++;
      };
      wp_reset_postdata();
      ?>
    </div>
    <div class="footer_column">
      <a href="/remont-elektriki" class="c_title">Ремонт электрики</a>
      <?
      $query = new WP_Query(array(
        'posts_per_page' => -1,
        'category_name' => 'remont-elektriki',
        'post_status' => 'publish'
      ));
      $counter = 0;
      while ($query->have_posts() and $counter < 20) {
        $query->the_post();
        ?>
        <a class="simple_link" href="<? the_permalink(); ?>"><? the_title(); ?></a>
        <?
        $counter++;
      };
      wp_reset_postdata();
      ?>
      <a href="/gruzovoj-evakuator" class="c_title">Грузовой эвакуатор</a>
      <?
      $query = new WP_Query(array(
        'posts_per_page' => -1,
        'category_name' => 'gruzovoj-evakuator',
        'post_status' => 'publish'
      ));
      $counter = 0;
      while ($query->have_posts() and $counter < 20) {
        $query->the_post();
        ?>
        <a class="simple_link" href="<? the_permalink(); ?>"><? the_title(); ?></a>
        <?
        $counter++;
      };
      wp_reset_postdata();
      ?>
    </div>
    <div class="footer_column">
      <a href="/razborka-gruzovikov" class="c_title">Разборка грузовиков</a>
      <?
      $query = new WP_Query(array(
        'posts_per_page' => -1,
        'category_name' => 'razborka-gruzovikov',
        'post_status' => 'publish'
      ));
      $counter = 0;
      while ($query->have_posts() and $counter < 20) {
        $query->the_post();
        ?>
        <a class="simple_link" href="<? the_permalink(); ?>"><? the_title(); ?></a>
        <?
        $counter++;
      };
      wp_reset_postdata();
      ?>
      <div class="menu_end">
        <a class="menu-item" href="/prodazha-b-u-tehniki">Продажа б/у техники</a>
        <? wp_nav_menu([
          'theme_location' => 'menu-2',
          'menu_id' => 'final_menu_2'
        ]); ?>
      </div>
    </div>
</footer>


<div id="callback_popup" class="callback_popup popup d_none">
  <div class="close_callback_popup">
    <? the_close_menu_icon(); ?>
  </div>

  <div class="main_content">
    <div class="h2_title">заказать звонок</div>
    <div class="desc">Пожалуйста, укажите свой номер телефона и мы обязательно свяжемся с вами в течение рабочего дня.</div>
    <form id="callback_form" class="form_wrapper">
      <input type="hidden" name="email" aria-label="email" value="<? the_field('email_name', 'option'); ?>">
      <input type="hidden" name="page_title" value="<?= get_the_title(); ?>">
      <input type="text" name="name" aria-label="name" placeholder="Ваше имя" required>
      <input type="number" name="phone" aria-label="phone" placeholder="Телефон" required>
      <div class="desc">Нажимая на кнопку «Отправить», я даю согласие на обработку моих персональных данных</div>
      <button class="button">Отправить</button>
    </form>
  </div>
  <div class="alert_done d_none">
    <div class="h2_title">Спасибо</div>
    <div class="desc thank">Мы свяжемся с вами в течение рабочего дня.</div>
  </div>
</div>


<div id="claim_popup" class="claim_popup popup d_none">
  <div class="close_callback_popup">
    <? the_close_menu_icon(); ?>
  </div>

  <div class="main_content">
    <div class="h2_title">заказать звонок</div>
    <div class="desc">Пожалуйста, укажите свой номер телефона и мы обязательно свяжемся с вами в течение рабочего дня.</div>
    <form id="claim_form" class="form_wrapper">
      <input type="hidden" name="email" aria-label="email" value="<? the_field('email_name', 'option'); ?>">
      <input type="hidden" name="page_title" value="<?= get_the_title(); ?>">
      <input type="text" name="name" aria-label="name" placeholder="Ваше имя" required>
      <input type="number" name="phone" aria-label="phone" placeholder="Телефон" required>
      <textarea name="comment" placeholder="Комментарий" aria-label="comment"></textarea>
      <div class="desc">Нажимая на кнопку «Отправить», я даю согласие на обработку моих персональных данных</div>
      <button class="button">Отправить</button>
    </form>
  </div>
  <div class="alert_done d_none">
    <div class="h2_title">Спасибо</div>
    <div class="desc thank">Мы свяжемся с вами в течение рабочего дня.</div>
  </div>
</div>

<div id="overlay" class="d_none"></div>
<?php wp_footer(); ?>
</body>
</html>
