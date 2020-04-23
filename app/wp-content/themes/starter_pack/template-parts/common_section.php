<?

function whichAutoWeService()
{
  ?>
  <section class="which_auto">
    <div class="main_wrapper">
      <div class="h2_title"><? the_field('wa_title', 'option'); ?></div>
      <div class="h2_desc"><? the_field('wa_title_desc', 'option'); ?></div>
      <div class="logo_list">
        <?
        if (have_rows('wa_icons_list', 'option')):
          while (have_rows('wa_icons_list', 'option')) : the_row(); ?>
            <div class="logo_item" style="background-image: url('<?= get_sub_field('icon')['url']; ?>');"></div>
          <? endwhile;
        endif;
        ?>
      </div>
    </div>
  </section>
<?
}
function mailSection()
{
  ?>
  <section id="mail_section" class="mail_section">
    <div class="main_wrapper">
      <h2 class="h2_title"><? the_field('mail_section_title', 'options') ?></h2>
      <h2 class="h2_desc"><? the_field('mail_section_desc', 'options') ?></h2>
      <form id="mail_form" class="mail_form">
        <input type="hidden" name="page_title" value="<?= get_the_title(); ?>">
        <input type="hidden" name="email" value="<? the_field('email_name', 'option'); ?>">
        <input type="text" name="name" placeholder="Ваше имя" required aria-label="name">
        <input type="number" name="phone" placeholder="Телефон" required aria-label="phone">
        <textarea name="comment" placeholder="Комментарий" aria-label="comment"></textarea>
        <button class="button">Отправить</button>
        <div class="allert_done mail_alerts d_none">Сообщение отправлено!</div>
        <div class="allert_false mail_alerts d_none">Ошибка отправления!</div>
      </form>
    </div>
  </section>
<?
}
function mapSection()
{
  ?>
  <section id="map_section" class="map_section">
    <div class="adress_block">
      <h2 class="h2_title"><? the_field('map_section_title', 'options'); ?></h2>
      <div class="content"><? the_field('cf_adress_top_menu', 'options'); ?></div>
    </div>
    <? the_field('cf_google_map', 'options'); ?>
  </section>
<?
}
function ourWorksGalary()
{
  ?>
  <section class="our_works">
    <div class="main_wrapper">
      <h2 class="h2_title"><? the_field('our_works_title', 'options'); ?></h2>
      <div class="carousel_wrapper">
        <div class="our_works_carousel owl-carousel">
          <?
          if (have_rows('our_works_galary', 'options')):
            while (have_rows('our_works_galary', 'options')) : the_row(); ?>
              <? $galary_img = get_sub_field('image', 'options'); ?>
              <a data-fancybox="galary" href="<? echo $galary_img['url']; ?>" class="carousel_item"
                 style="background-image: url('<? echo $galary_img['sizes']['medium_large']; ?>')"></a>
            <? endwhile;
          endif;
          ?>
        </div>
        <div class="our_works_carousel_navs">
          <div class="our_works_carousel_nav_left navs">
            <? the_nav_icon('left'); ?>
          </div>
          <div class="our_works_carousel_nav_right navs">
            <? the_nav_icon(); ?>
          </div>
        </div>

      </div>
    </div>
  </section>
<?
}


