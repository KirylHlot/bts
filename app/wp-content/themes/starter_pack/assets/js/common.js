// left menu
var open_menu = document.getElementById('open_menu');
var carrets_mass = document.getElementById('left_menu_phones_list_item').getElementsByClassName('the_carret_icon');
var close_menu = document.getElementById('close_menu');
var rubrick_link_list_mass = document.getElementsByClassName('rubrick_link_list');
var event_type = document.body.clientWidth > 1199 ? 'mouseover' : 'click';
var first_menu_items_mass = document.getElementById('menu_1').getElementsByTagName('li');
var hidden_menu_id_mass = ['gruzovoj-evakuator','razborka-gruzovikov', 'remont-elektriki'];

function check_link (elem){
  for (let i = 0; i < hidden_menu_id_mass.length ; i++) {
    if(elem.classList.contains(hidden_menu_id_mass[i])){
      return hidden_menu_id_mass[i];
    }
  }
  return false;
}
function show_hidden_menu(elem_id){
  document.getElementById('left_menu_hidden_part').classList.remove('d_none');
  clear_left_menu_hidden_part();
  show_choised_elem(elem_id);
  return true;
}
function clear_left_menu_hidden_part(){
  for (let i = 0; i < rubrick_link_list_mass.length ; i++) {
    rubrick_link_list_mass[i].classList.add('d_none');
  }

  return true;
}
function show_choised_elem(elem_id){
  document.getElementById(elem_id).classList.remove('d_none');
  return true;
}
function open_left_menu(){
  setOverlay();
  document.getElementById('left_menu').classList.remove('d_none');
  closeLeftMenuByMissClick();

  return true;
}
function close_left_menu(){
  removeOverlay();
  document.getElementById('left_menu').classList.add('d_none');
  document.getElementById('left_menu_hidden_part').classList.add('d_none');
  return true;
}
function closeLeftMenuByMissClick() {
  $(document).mouseup(function(e) {
    let t = $(".left_menu");
    t.is(e.target) || 0 !== t.has(e.target).length || close_left_menu()
  })
}

if(document.body.clientWidth > 991) {
  for (let i = 0; i < first_menu_items_mass.length; i++) {
    first_menu_items_mass[i].addEventListener(event_type, function () {
      let elem_id = check_link(first_menu_items_mass[i]);
      if (elem_id) {
        show_hidden_menu(elem_id);
      }
    });
  }
}



open_menu.addEventListener('click',function () {
  open_left_menu();
});
close_menu.addEventListener('click',function () {
  close_left_menu();
});

function show_phones(elem){
  if(elem.parentNode.parentNode.querySelector('.hidden_list').classList.contains('d_none')){
    hidden_all_phones();
  }
  elem.parentNode.parentNode.querySelector('.hidden_list').classList.toggle('d_none');

  return true;
}
function hidden_all_phones(){
  let hidden_list_mass = document.getElementById('left_menu_phones_list_item').getElementsByClassName('hidden_list');

  for (let i = 0; i < hidden_list_mass.length; i++) {
    hidden_list_mass[i].classList.add('d_none');
  }

  return true;
}
if(document.body.clientWidth < 1200) {
  for (let i = 0; i < carrets_mass.length; i++) {
    carrets_mass[i].addEventListener('click', function(){
      show_phones(this);
    })
  }
}



if (document.body.clientWidth > 1199 && $(window).scroll(function() {
  $(window).scrollTop() >= 50 ? $("#bottom_content_menu").addClass("hide") : $("#bottom_content_menu").removeClass("hide")
}));


//main page header carousel
var header_carousel_wrapper=$(".header_carousel_wrapper");
header_carousel_wrapper.owlCarousel({
  loop: false,
  nav: false,
  margin: 0,
  padding: 0,
  dots: true,
  responsive: {
    0: {
      items: 1,
      autoplay: false,
    }
  }
});

$(".header_carousel_nav_right").click(function(){
  header_carousel_wrapper.trigger("next.owl.carousel");
});
$(".header_carousel_nav_left").click(function(){
  header_carousel_wrapper.trigger("prev.owl.carousel");
});

header_carousel_wrapper.on('changed.owl.carousel', function (e) {
    change_carousel_title(e.item.index);
    return true;
});

function change_carousel_title(index){
  let carousuel_outer_inner_mass = document.getElementsByClassName('carousuel_outer_inner');
  hidden_all_titles(carousuel_outer_inner_mass);
  carousuel_outer_inner_mass[index].classList.remove('d_none');

  return true;
}

function hidden_all_titles(elem_mass){
  for (let i = 0; i < elem_mass.length ; i++) {
    elem_mass[i].classList.add('d_none');
  }

  return true;
}

//main page callbacks carousel

var mp_callback_carousel=$(".mp_callback_carousel");
mp_callback_carousel.owlCarousel({
  loop: true,
  nav: false,
  margin: 20,
  padding: 0,
  dots: true,
  responsive: {
    0: {
      items: 1
    },
    1200: {
      items: 2
    }
  }
});

$(".callback_carousel_nav_left").click(function(){
  mp_callback_carousel.trigger("next.owl.carousel");
});
$(".callback_carousel_nav_right").click(function(){
  mp_callback_carousel.trigger("prev.owl.carousel");
});

//main page our works carousel

var our_works_carousel=$(".our_works_carousel");
our_works_carousel.owlCarousel({
  loop: true,
  nav: false,
  margin: 20,
  padding: 0,
  dots: true,
  responsive: {
    0: {
      items: 1
    },
    576: {
      items: 2
    },
    768: {
      items: 3
    }
  }
});

$(".our_works_carousel_nav_left").click(function(){
  our_works_carousel.trigger("next.owl.carousel");
});
$(".our_works_carousel_nav_right").click(function(){
  our_works_carousel.trigger("prev.owl.carousel");
});









//send email simple section

//footer mail form
$(document).ready(function () {
  $("#mail_form").submit(function () {
    $.ajax({
      type: "POST",
      url: "\\wp-content\\themes\\starter_pack\\mails\\simple_mail.php",
      data: $(this).serialize()
    }).done(function () {
      mail_form_alert_done();
    }).fail(function () {
      mail_form_alert_wrong();
    });
    return false;
  });
});

function mail_form_alert_done(){
  let mail_form = document.getElementById('mail_form');
  let mail_alerts = document.getElementsByClassName('mail_alerts');

  for (let i = 0; i < mail_alerts.length; i++) {
    if(!mail_alerts[i].classList.contains('allert_done')){
      mail_alerts[i].classList.add('d_none');
    }else{
      mail_alerts[i].classList.remove('d_none');
    }
  }
  mail_form.querySelector('.button').classList.add('d_none');

  return true;

}

function mail_form_alert_wrong(){
  let mail_form = document.getElementById('mail_form');
  mail_form.querySelector('.allert_false').classList.remove('d_none');

  return true;

}

//Popups
var claim_mass = document.getElementsByClassName('claim');
var callback_mass = document.getElementsByClassName('callback');
var close_callback_popup_mass = document.getElementsByClassName('close_callback_popup');

if(callback_mass){
  for (let i = 0; i < callback_mass.length ; i++) {
    callback_mass[i].addEventListener('click', function () {
      show_callback_popup('callback_popup');
    })
  }
}
if(claim_mass){
  for (let i = 0; i < claim_mass.length ; i++) {
    claim_mass[i].addEventListener('click', function () {
      show_callback_popup('claim_popup');
    })
  }
}
if(close_callback_popup_mass){
  for (let i = 0; i < close_callback_popup_mass.length ; i++) {
    close_callback_popup_mass[i].addEventListener('click', function () {
      close_popup();
    })
  }
}

function popup_alert_done(popup_id){

  document.getElementById(popup_id).querySelector('.main_content').classList.add('d_none');
  document.getElementById(popup_id).querySelector('.alert_done').classList.remove('d_none');

  return true;

}
function show_callback_popup(popup_id){
  show_popup(popup_id);
  closePopupByMissClick();
  return true;
}
function show_popup(name){
  setOverlay();
  document.getElementById(name).classList.remove('d_none');
  return true;
}
function close_popup(){
  let popup_mass = document.getElementsByClassName('popup');
  for (let i = 0; i < popup_mass.length; i++) {
    popup_mass[i].classList.add('d_none');
  }
  removeOverlay();
  return true;
}
function closePopupByMissClick() {
  $(document).mouseup(function(e) {
    let t = $(".popup");
    t.is(e.target) || 0 !== t.has(e.target).length || close_popup()
  })
}
function setOverlay(){
  document.getElementById('overlay').classList.remove('d_none');
  document.getElementById('body').classList.add('ovf_hidden');
  return true;
}
function removeOverlay(){
  document.getElementById('overlay').classList.add('d_none');
  document.getElementById('body').classList.remove('ovf_hidden');
  return true;
}

$(document).ready(function () {
  $("#callback_form").submit(function () {
    $.ajax({
      type: "POST",
      url: "\\wp-content\\themes\\starter_pack\\mails\\callback_mail.php",
      data: $(this).serialize()
    }).done(function () {
      popup_alert_done('callback_popup');
    }).fail(function () {
    });
    return false;
  });
});
$(document).ready(function () {
  $("#claim_form").submit(function () {
    $.ajax({
      type: "POST",
      url: "\\wp-content\\themes\\starter_pack\\mails\\claim_mail.php",
      data: $(this).serialize()
    }).done(function () {
      popup_alert_done('claim_popup');
    }).fail(function () {
    });
    return false;
  });
});

let $dots = $('.owl-dot');
$dots.attr('aria-label', 'owl carousel');

$('.callbacks_list').masonry({
  gutter: '.gutter-sizer',
  itemSelector: '.carousel_item_greed',
  percentPosition: true,
  horizontalOrder: true
});