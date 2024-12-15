$(document).ready(function () {
  var carousel1 = $('#productSlider1');
  var carousel2 = $('#productSlider2');

  carousel1.carousel({
    interval: 5000, 
    pause: 'hover'
  });

  carousel2.carousel({
    interval: 5000, 
    pause: 'hover'
  });

  $('.carousel-control-prev').click(function (e) {
    e.preventDefault();

    $(this).closest('.carousel').carousel('prev');
  });

  $('.carousel-control-next').click(function (e) {
    e.preventDefault();

    $(this).closest('.carousel').carousel('next');
  });
});
