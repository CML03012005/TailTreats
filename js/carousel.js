$(document).ready(function () {
  var carousel = $('#productSlider');
  carousel.carousel({
    interval: 5000, 
    pause: 'hover'
  });

  $('.carousel-control-prev').click(function (e) {
    e.preventDefault();
    carousel.carousel('prev');
  });

  $('.carousel-control-next').click(function (e) {
    e.preventDefault();
    carousel.carousel('next');
  });
});