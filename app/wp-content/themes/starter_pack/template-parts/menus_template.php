<?php

function leftMenu(){?>

  <div id="left_menu" class="left_menu d_none" >
    <div class="visible_part">
      <div id="close_menu" class="burger">
        <? the_close_menu_icon(); ?>
      </div>
      <a href="/" class="logo_wrapper">
        <img src="<?= get_field('main_logo', 'option' )['url']; ?>" alt=""><? get_field('main_logo', 'option')['alt']; ?>
      </a>

       <? wp_nav_menu([
        'theme_location'  => 'menu-1',
         'menu_id' => 'menu_1'
      ]);  ?>
      <? wp_nav_menu([
        'theme_location'  => 'menu-2',
        'menu_id' => 'menu_2'
      ]);  ?>

      <div class="button callback">
        Заказать звонок
      </div>

      <div id="left_menu_phones_list_item"  class="phones_list">
        <? the_phone_icon(); ?>
        <div class="phones_list_item">
          <div class="title">Стол заказов</div>
          <div class="phones_wrapper">
            <?
            $counter = 0;
            $rows_count = count(get_field('cf_phone_zakaz_list', 'option'));
            if (have_rows('cf_phone_zakaz_list', 'option')):
              while (have_rows('cf_phone_zakaz_list', 'option')) :
                the_row();
                if($counter == 1){?>
                  <div class="hidden_list d_none">
                <?}
                ?>
                <div class="single_phone_wrapper <?= $counter > 0?'hidden':''; ?>">
                  <? if($counter == 0 and $rows_count > 1){
                    the_carret_icon();
                  }?>
                  <a href="tel:<? the_sub_field('phone_visible'); ?>"
                     class="phone">
                    <? the_sub_field('phone_visible'); ?>
                  </a>

                </div>
                <?
                if($counter == $rows_count - 1 and $rows_count > 1){?>
                  </div>
                <?}
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
                if($counter == 1){?>
                  <div class="hidden_list d_none">
                <?}
                ?>
                <div class="single_phone_wrapper <?= $counter > 0?'hidden':''; ?>">
                  <? if($counter == 0 and $rows_count > 1){
                    the_carret_icon();
                  }?>
                  <a href="tel:<? the_sub_field('phone_visible'); ?>"
                     class="phone">
                    <? the_sub_field('phone_visible'); ?>
                  </a>
                </div>
                <?
                if($counter == $rows_count - 1 and $rows_count > 1){?>
                  </div>
                <?}
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
                if($counter == 1){?>
                  <div class="hidden_list d_none">
                <?}
                ?>
                <div class="single_phone_wrapper">
                  <? if($counter == 0 and $rows_count > 1){
                    the_carret_icon();
                  }?>
                  <a href="tel:<? the_sub_field('phone_visible'); ?>" class="phone">
                    <? the_sub_field('phone_visible'); ?>
                  </a>
                </div>
                <?
                if($counter == $rows_count - 1 and $rows_count > 1){?>
                  </div>
                <?}
                $counter++;
              endwhile;
            endif;
            ?>
          </div>
        </div>
      </div>
      <div class="adress_wrapper">
        <? the_marker_map_icon(); ?>
        <div class="adress">
          <? the_field('cf_adress_top_menu', 'option');  ?>
        </div>
      </div>
    </div>

    <div id="left_menu_hidden_part" class="hidden_part d_none">

      <ul id="gruzovoj-evakuator" class="rubrick_link_list d_none">
        <?
        $query = new WP_Query( array(
          'posts_per_page' => -1,
          'category_name' => 'gruzovoj-evakuator',
          'post_status'=>'publish'
        ) );
        $counter = 0;
        while ( $query->have_posts() and $counter < 10 ) {
          $query->the_post();
          ?>
          <li>
            <a href="<? the_permalink(); ?>"><?= get_the_title(); ?></a>
          </li>
          <?
          $counter ++;
        };
        wp_reset_postdata();
        ?>
      </ul>

      <ul id="razborka-gruzovikov" class="rubrick_link_list d_none">
        <?
        $query = new WP_Query( array(
          'posts_per_page' => -1,
          'category_name' => 'razborka-gruzovikov',
          'post_status'=>'publish'
        ) );
        $counter = 0;
        while ( $query->have_posts() and $counter < 10 ) {
          $query->the_post();
          ?>
          <li>
            <a href="<? the_permalink(); ?>"><?= get_the_title(); ?></a>
          </li>
          <?
          $counter ++;
        };
        wp_reset_postdata();
        ?>
      </ul>

      <ul id="remont-elektriki" class="rubrick_link_list d_none">
        <?
        $query = new WP_Query( array(
          'posts_per_page' => -1,
          'category_name' => 'remont-elektriki',
          'post_status'=>'publish'
        ) );
        $counter = 0;
        while ( $query->have_posts() and $counter < 10 ) {
          $query->the_post();
          ?>
          <li>
            <a href="<? the_permalink(); ?>"><?= get_the_title(); ?></a>
          </li>
          <?
          $counter ++;
        };
        wp_reset_postdata();
        ?>
      </ul>

    </div>



  </div>
<?};
function topMenu()
{
  ?>

  <nav id="top_menu" class="top_menu">

    <div id="open_menu" class="burger">
      <? the_burger_icon(); ?>
    </div>

    <div class="top_content">
      <div class="logo_group">
        <a href="/" class="logo_wrapper">
          <img src="<?= get_field('main_logo', 'option')['url']; ?>"
               alt="<?= get_field('main_logo', 'option')['alt']; ?>">
        </a>
        <div class="logo_desc">
          <?= get_field('logo_description', 'option'); ?>
        </div>
      </div>
      <div class="adress_wrapper">
        <?= the_marker_map_icon() ?>
        <span class="adress">
          <?= get_field('cf_adress_top_menu', 'option'); ?>
        </span>
      </div>
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
                if($counter == 1){?>
                <div class="hidden_list">
                  <?}
                ?>
                <div class="single_phone_wrapper <?= $counter > 0?'hidden':''; ?>">
                  <? if (get_sub_field('is_whatsapp')) {
                    the_whatsapp_icon();
                  }; ?>
                  <? if (get_sub_field('is_wiber')) {
                    the_wiber_icon();
                  }; ?>
                  <? if (get_sub_field('is_telegram')) {
                    the_telegram_icon();
                  }; ?>
                  <a href="tel:<? the_sub_field('phone_visible'); ?>"
                     class="phone">
                    <? the_sub_field('phone_visible'); ?>
                    <? if($counter == 0 and $rows_count > 1){
                      the_carret_icon();
                    }?>
                  </a>

                </div>
              <?
                if($counter == $rows_count - 1 and $rows_count > 1){?>
                  </div>
                <?}
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
                if($counter == 1){?>
                <div class="hidden_list">
                  <?}
                ?>
                <div class="single_phone_wrapper <?= $counter > 0?'hidden':''; ?>">
                  <? if (get_sub_field('is_whatsapp')) {
                    the_whatsapp_icon();
                  }; ?>
                  <? if (get_sub_field('is_wiber')) {
                    the_wiber_icon();
                  }; ?>
                  <? if (get_sub_field('is_telegram')) {
                    the_telegram_icon();
                  }; ?>
                  <a href="tel:<? the_sub_field('phone_visible'); ?>"
                     class="phone">
                    <? the_sub_field('phone_visible'); ?>
                    <? if($counter == 0 and $rows_count > 1){
                      the_carret_icon();
                    }?>
                  </a>
                </div>
              <?
                if($counter == $rows_count - 1 and $rows_count > 1){?>
                  </div>
                <?}
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
                if($counter == 1){?>
                  <div class="hidden_list">
                <?}
                ?>
                <div class="single_phone_wrapper">
                  <? if (get_sub_field('is_whatsapp')) {
                    the_whatsapp_icon();
                  }; ?>
                  <? if (get_sub_field('is_wiber')) {
                    the_wiber_icon();
                  }; ?>
                  <? if (get_sub_field('is_telegram')) {
                    the_telegram_icon();
                  }; ?>
                  <a href="tel:<? the_sub_field('phone_visible'); ?>" class="phone">
                    <? the_sub_field('phone_visible'); ?>
                    <? if($counter == 0 and $rows_count > 1){
                      the_carret_icon();
                    }?>
                  </a>
                </div>
              <?
                if($counter == $rows_count - 1 and $rows_count > 1){?>
                  </div>
                <?}
                $counter++;
              endwhile;
            endif;
            ?>
          </div>
        </div>


      </div>
      <div class="button simple_button callback">Заказать звонок</div>
    </div>

    <div id="bottom_content_menu" class="bottom_content">
      <? wp_nav_menu([
        'theme_location'  => 'menu-1'
      ]);  ?>
      <? wp_nav_menu([
        'theme_location'  => 'menu-2'
      ]);  ?>
    </div>
  </nav>


  <?
  return true;
};

function leftStaticItem(){?>
  <div class="left_static_remark">
    <span><? the_field('vert_text_header', 'option' ); ?></span>
  </div>
<?};


