(function ($, Drupal, once) {
  Drupal.behaviors.myModuleBehavior = {
    attach: function (context, settings) {
      once('html', context).forEach(function (element) {
        console.log('hello');
        $('.view-content').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          arrows: true,
          dots: true
        });
      })
    }
  };
})(jQuery, Drupal, once);
