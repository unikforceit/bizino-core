(function ($) {
  $('.cmb-type-icon ul li').click(function(){
    var jCMBTypeIcon = $(this).closest('.cmb-type-icon');
    // Set selected styles
    jCMBTypeIcon.find('li').removeClass('selected').addClass('unselected');
    $(this).removeClass('unselected').addClass('selected');
    // Tick the input
    jCMBTypeIcon.find('input').removeAttr('checked');
    $(this).find('input').attr('checked', '1');
  })
  
  $('.cmb-type-icon ul.icon-scroll').click(function(){
    // Important to disable the custom input 
    // because otherwise it will override the radio selection
    var jCMBTypeIcon = $(this).closest('.cmb-type-icon');
    jCMBTypeIcon.find('.custom_icon input').attr('disabled', '1');
  });
  
  $('.cmb-type-icon .custom_icon').click(function(){
    var jCMBTypeIcon = $(this).find('input').removeAttr('disabled').focus();
  });

  $(document).ready(function (){
    $(".vs-carousel").each(function () {
      var vsSlide = $(this);

      // Collect Data
      function d(data) {
        return vsSlide.data(data);
      }

      // Custom Arrow Button
      var prevButton = '<button type="button" class="slick-prev"><i class="' + d("prev-arrow") + '"></i></button>',
          nextButton = '<button type="button" class="slick-next"><i class="' + d("next-arrow") + '"></i></button>';

      // Function For Custom Arrow Btn
      $("[data-slick-next]").each(function () {
        $(this).on("click", function (e) {
          e.preventDefault();
          $($(this).data("slick-next")).slick("slickNext");
        });
      });

      $("[data-slick-prev]").each(function () {
        $(this).on("click", function (e) {
          e.preventDefault();
          $($(this).data("slick-prev")).slick("slickPrev");
        });
      });

      // Check for arrow wrapper
      if (d("arrows") == true) {
        if (!vsSlide.closest(".arrow-wrap").length) {
          vsSlide.closest(".container").parent().addClass("arrow-wrap");
        }
      }

      vsSlide.slick({
        dots: d("dots") ? true : false,
        fade: d("fade") ? true : false,
        arrows: d("arrows") ? true : false,
        speed: d("speed") ? d("speed") : 1000,
        asNavFor: d("asnavfor") ? d("asnavfor") : false,
        autoplay: d("autoplay") == false ? false : true,
        infinite: d("infinite") == false ? false : true,
        slidesToShow: d("slide-show") ? d("slide-show") : 1,
        adaptiveHeight: d("adaptive-height") ? true : false,
        centerMode: d("center-mode") ? true : false,
        autoplaySpeed: d("autoplay-speed") ? d("autoplay-speed") : 8000,
        centerPadding: d("center-padding") ? d("center-padding") : "0",
        focusOnSelect: d("focuson-select") ? true : false,
        pauseOnFocus: d("pauseon-focus") ? true : false,
        pauseOnHover: d("pauseon-hover") ? true : false,
        variableWidth: d("variable-width") ? true : false,
        vertical: d("vertical") ? true : false,
        verticalSwiping: d("vertical") ? true : false,
        prevArrow: d("prev-arrow") ? prevButton : '<button type="button" class="slick-prev"><i class="fal fa-long-arrow-left"></i></button>',
        nextArrow: d("next-arrow") ? nextButton : '<button type="button" class="slick-next"><i class="fal fa-long-arrow-right"></i></button>',
        rtl: $("html").attr("dir") == "rtl" ? true : false,
        responsive: [{
          breakpoint: 1600,
          settings: {
            arrows: d("xl-arrows") ? true : false,
            dots: d("xl-dots") ? true : false,
            slidesToShow: d("xl-slide-show") ?
                d("xl-slide-show") : d("slide-show"),
            centerMode: d("xl-center-mode") ? true : false,
            centerPadding: 0,
          },
        },
          {
            breakpoint: 1400,
            settings: {
              arrows: d("ml-arrows") ? true : false,
              dots: d("ml-dots") ? true : false,
              slidesToShow: d("ml-slide-show") ?
                  d("ml-slide-show") : d("slide-show"),
              centerMode: d("ml-center-mode") ? true : false,
              centerPadding: 0,
            },
          },
          {
            breakpoint: 1200,
            settings: {
              arrows: d("lg-arrows") ? true : false,
              dots: d("lg-dots") ? true : false,
              slidesToShow: d("lg-slide-show") ?
                  d("lg-slide-show") : d("slide-show"),
              centerMode: d("lg-center-mode") ? d("lg-center-mode") : false,
              centerPadding: 0,
            },
          },
          {
            breakpoint: 992,
            settings: {
              arrows: d("md-arrows") ? true : false,
              dots: d("md-dots") ? true : false,
              slidesToShow: d("md-slide-show") ? d("md-slide-show") : 1,
              centerMode: d("md-center-mode") ? d("md-center-mode") : false,
              centerPadding: 0,
            },
          },
          {
            breakpoint: 767,
            settings: {
              arrows: d("sm-arrows") ? true : false,
              dots: d("sm-dots") ? true : false,
              slidesToShow: d("sm-slide-show") ? d("sm-slide-show") : 1,
              centerMode: d("sm-center-mode") ? d("sm-center-mode") : false,
              centerPadding: 0,
            },
          },
          {
            breakpoint: 576,
            settings: {
              arrows: d("xs-arrows") ? true : false,
              dots: d("xs-dots") ? true : false,
              slidesToShow: d("xs-slide-show") ? d("xs-slide-show") : 1,
              centerMode: d("xs-center-mode") ? d("xs-center-mode") : false,
              centerPadding: 0,
            },
          },
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ],
      });
    });
  });

  $(document).ready(function(){
    $('.cmb-type-icon .selected').each(function(){
      if (this.scrollIntoView) this.scrollIntoView();
    });
  });
})(jQuery);