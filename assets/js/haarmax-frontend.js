;(function($) {
    'use strict';
    $(window).on( 'elementor/frontend/init', function() {

        // Testimonial Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxtestimonialslider.default',function($scope) {

            // Function For Custom Arrow Btn
            $('[data-slick-next]').each(function () {
              $(this).on('click', function (e) {
                e.preventDefault()
                $($(this).data('slick-next')).slick('slickNext');
              })
            })

            $('[data-slick-prev]').each(function () {
              $(this).on('click', function (e) {
                e.preventDefault()
                $($(this).data('slick-prev')).slick('slickPrev');
              })
            })


            let $authorslickcarousels = $scope.find('.avater-fly.vs-carousel');
            $authorslickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: false,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                asNavFor: '#testimonialslide1',
                slidesToShow: 5,
                slidesToScroll: 1,
                centerMode:true,
                variableWidth: true,
                focusOnSelect:true,

            });

            let $contentslickcarousels = $scope.find('.testimonial-one.vs-carousel');
            $contentslickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: false,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: true,
                speed: 1000,
                asNavFor: '#avaterfly',
                slidesToShow: 1,
                slidesToScroll: 1,
            });

            let $slickcarouselstwo = $scope.find('.slider-two.vs-carousel');
            $slickcarouselstwo.not('.slick-initialized').slick({
                dots: $slickcarouselstwo.data('slick-dots'),
                infinite: true,
                arrows: $slickcarouselstwo.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="long-arrow"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="long-arrow"></i></button>',
                autoplay: $slickcarouselstwo.data('slick-sutoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: 2,
                slidesToScroll: 1,
                responsive: [ {
                    breakpoint: 1500,
                    settings: {
                        arrows: false,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            arrows: false,
                            }
                        },
                    {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                       }
                    }
                ]
            });

        });

        // Blog Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxblogpost.default',function($scope) {

            let $blogslickcarousel = $scope.find('.blog-vs-carousel');
            $blogslickcarousel.not('.slick-initialized').slick({
                dots: $blogslickcarousel.data('slick-dots'),
                infinite: true,
                arrows: $blogslickcarousel.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: $blogslickcarousel.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $blogslickcarousel.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [ {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                    }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                       }
                    }
                ]
            });

        });

        // Working Process Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxworkingprocess.default',function($scope) {

            let $working_process_slickcarousel = $scope.find('.vs-carousel');
            $working_process_slickcarousel.not('.slick-initialized').slick({
                dots: $working_process_slickcarousel.data('slick-dots'),
                infinite: true,
                arrows: $working_process_slickcarousel.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: $working_process_slickcarousel.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $working_process_slickcarousel.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [ {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                    }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                       }
                    }, {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                       }
                    }
                ]
            });

        });

        // Logo Carousel Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxlogocarousel.default',function($scope) {

            let $logo_slickcarousel = $scope.find('.vs-carousel');
            $logo_slickcarousel.not('.slick-initialized').slick({
                dots: $logo_slickcarousel.data('slick-dots'),
                infinite: true,
                arrows: $logo_slickcarousel.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $logo_slickcarousel.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [ {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                    }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                       }
                    }, {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                       }
                    }
                ]
            });

        });


        // Search Option
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxsearch.default',function($scope) {

            $.fn.vsLiveSearch = function (){
              let myVar = null,
              toggleClass = 'open',
              loaderToggleClass = 'd-none',
              $searchWrap = $(this),
              $input = $searchWrap.find('.form-control'),
              $loader = $searchWrap.find('.search-loader'),
              $resultWrap = $searchWrap.find('.search-result');

              $input.on("keyup", function (e) {
                $resultWrap.removeClass(toggleClass).html(' ');
                let cinput = $(this);
                clearTimeout(myVar);
                myVar = setTimeout(function () {
                  if (cinput.val() != '') {
                    $.ajax({
                      type: 'POST',
                      url: haarmaxajax.action_url,
                      data: {
                        action: 'haarmax_ajax_search',
                        searchkey: cinput.val(),
                        posttype: 'product'
                      },
                      beforeSend: function () {
                        $loader.removeClass(loaderToggleClass);
                        $resultWrap.addClass(toggleClass).html(' ');
                      },
                      success: function (data) {
                        $loader.addClass(loaderToggleClass);
                        $resultWrap.html(data);
                      }
                    });
                  } else {
                    $resultWrap.removeClass(toggleClass).html(' ');
                  }
                }, 500);
                e.preventDefault();
              });
            }

            if ($scope.find('.live-search')) {
              $scope.find('.live-search').vsLiveSearch();
            }

        });


        // Pricing Table Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxpricelist.default',function($scope) {

            let $priceplan = $scope.find('.price-plan-slide');
            $priceplan.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: true,
                autoplay: false,
                fade: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                focusOnSelect: true,
                centerMode: true,
                centerPadding: '555px',
                prevArrow: '<button type="button" class="slick-prev"><i class="long-arrow"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="long-arrow"></i></button>',
                responsive: [{
                  breakpoint: 1700,
                  settings: {
                    centerPadding: '300px',
                    slidesToShow: 1,
                    arrows: false
                  }
                }, {
                  breakpoint: 1450,
                  settings: {
                    centerPadding: '200px',
                    arrows: false
                  }
                }, {
                  breakpoint: 1199,
                  settings: {
                    centerPadding: '100px',
                    arrows: false
                  }
                }, {
                  breakpoint: 992,
                  settings: {
                    centerPadding: '50px',
                    arrows: false
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    centerPadding: '0',
                    arrows: false
                  }
                }]
            });

            // style 2
            let $priceplan2 = $scope.find('.price-plan-style-2');
                $priceplan2.not('.slick-initialized').slick({
                dots:  false,
                fade: false,
                arrows: true,
                speed:  1000,
                autoplay: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '0',
                autoplaySpeed: 8000,
                focusOnSelect: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="long-arrow"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="long-arrow"></i></button>',
                responsive: [{
                    breakpoint: 1600,
                    settings: {
                      arrows: false,
                      dots: true,
                      slidesToShow: 3,
                    }
                  }, {
                    breakpoint: 1400,
                    settings: {
                      arrows: true,
                      dots: false,
                      slidesToShow: 3,
                    }
                  }, {
                    breakpoint: 1200,
                    settings: {
                      arrows: false,
                      dots: false,
                      slidesToShow: 2,
                    }
                  }, {
                    breakpoint: 992,
                    settings: {
                      arrows: false,
                      dots: false,
                      slidesToShow: 2,
                    }
                  }, {
                    breakpoint: 767,
                    settings: {
                      arrows: false,
                      dots: false,
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 576,
                    settings: {
                      arrows: false,
                      dots: false,
                      slidesToShow: 1,
                    }
                  }
                ]
              });

            // style 3
            let $priceplan3 = $scope.find('.price-plan-style-3');
                $priceplan3.not('.slick-initialized').slick({
                dots:  false,
                fade: true,
                arrows: true,
                speed:  1000,
                autoplay: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: false,
                autoplaySpeed: 8000,
                focusOnSelect: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="long-arrow"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="long-arrow"></i></button>',
                responsive: [{
                    breakpoint: 1600,
                    settings: {
                      arrows: false,
                      dots: true,
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 1400,
                    settings: {
                      arrows: false,
                      dots: false,
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 1200,
                    settings: {
                      arrows: false,
                      dots: true,
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 992,
                    settings: {
                      arrows: false,
                      dots: false,
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 767,
                    settings: {
                      arrows: false,
                      dots: false,
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 576,
                    settings: {
                      arrows: false,
                      dots: false,
                      slidesToShow: 1,
                    }
                  }
                ]
              });

            let $data_bg = $scope.find('[data-bg-src]');
            $data_bg.each(function () {
                var src = $(this).attr('data-bg-src');
                $(this).css('background-image', 'url(' + src + ')');
                $(this).removeAttr('data-bg-src').addClass('background-image');
            });

        });

        // newsletter Image
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxnewsletterform.default',function($scope) {
            let $data_bg = $scope.find('[data-bg-src]');
            $data_bg.each(function () {
                var src = $(this).attr('data-bg-src');
                $(this).css('background-image', 'url(' + src + ')');
                $(this).removeAttr('data-bg-src').addClass('background-image');
            });
        });

        // offer cart Image
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxoffercart.default',function($scope) {
            let $offercart = $scope.find('[data-bg-src]');
            $offercart.each(function () {
                var src = $(this).attr('data-bg-src');
                $(this).css('background-image', 'url(' + src + ')');
                $(this).removeAttr('data-bg-src').addClass('background-image');
            });
        });

        // Package Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxpackage.default',function($scope) {
          let $slickcarousels5 = $scope.find('.vs-packages-small');
                $slickcarousels5.not('.slick-initialized').slick({
                dots:  false,
                fade: false,
                arrows: false,
                speed:  1000,
                autoplay: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplaySpeed: 8000,
                focusOnSelect: true,
                centerMode: true,
                centerPadding: 0,
                asNavFor: '#packSlide2',
                responsive: [{
                    breakpoint: 1600,
                    settings: {
                      slidesToShow: 3,
                    }
                  }, {
                    breakpoint: 1400,
                    settings: {
                      slidesToShow: 3,
                    }
                  }, {
                    breakpoint: 1200,
                    settings: {
                      slidesToShow: 3,
                    }
                  }, {
                    breakpoint: 992,
                    settings: {
                      slidesToShow: 3,
                    }
                  }, {
                    breakpoint: 767,
                    settings: {
                      slidesToShow: 2,
                    }
                  }, {
                    breakpoint: 576,
                    settings: {
                      slidesToShow: 2,
                    }
                  }
                ]
            });

            let $slickcarousels6 = $scope.find('.vs-packages-big');
              $slickcarousels6.not('.slick-initialized').slick({
              dots:  false,
              fade: true,
              arrows: false,
              speed:  1000,
              autoplay: true,
              infinite: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplaySpeed: 8000,
              focusOnSelect: true,
              asNavFor: '#packSlide1',
              prevArrow: '<button type="button" class="slick-prev"><i class="long-arrow"></i></button>',
              nextArrow: '<button type="button" class="slick-next"><i class="long-arrow"></i></button>',
              responsive: [{
                  breakpoint: 1600,
                  settings: {
                    slidesToShow: 1,
                  }
                }, {
                  breakpoint: 1400,
                  settings: {
                    slidesToShow: 1,
                  }
                }, {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 1,
                  }
                }, {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 1,
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 1,
                  }
                }, {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                  }
                }
              ]
            });

            let $offersslide = $scope.find('.offers-slide');
            $offersslide.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: false,
                fade: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                focusOnSelect: true,
                centerMode: true,
                centerPadding: '378px',
                prevArrow: '<button type="button" class="slick-prev"><i class="long-arrow"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="long-arrow"></i></button>',
                responsive: [{
                  breakpoint: 1700,
                  settings: {
                    centerPadding: '300px',
                    slidesToShow: 1,
                    arrows: false
                  }
                }, {
                  breakpoint: 1450,
                  settings: {
                    centerPadding: '200px',
                    arrows: false
                  }
                }, {
                  breakpoint: 1199,
                  settings: {
                    centerPadding: '100px',
                    arrows: false
                  }
                }, {
                  breakpoint: 992,
                  settings: {
                    centerPadding: '50px',
                    arrows: false
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    centerPadding: '0',
                    arrows: false
                  }
                }]
            });
        });

        // team Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxteammember.default',function($scope) {

            let $mask_bg = $scope.find('[data-mask-src');
            $mask_bg.each(function () {
                var mask = $(this).attr('data-mask-src');
                $(this).css({
                  'mask-image': 'url(' + mask + ')',
                  '-webkit-mask-image': 'url(' + mask + ')'
                });
                $(this).removeAttr('data-mask-src');
            });

            let $slickcarousel = $scope.find('.vs-carousel');
                $slickcarousel.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [ {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                    }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                       }
                    }
                ]
            });

        });

        // image with video
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaximage.default',function($scope) {

            let $mask_bg = $scope.find('[data-mask-src');
            $mask_bg.each(function () {
                var mask = $(this).attr('data-mask-src');
                $(this).css({
                  'mask-image': 'url(' + mask + ')',
                  '-webkit-mask-image': 'url(' + mask + ')'
                });
                $(this).removeAttr('data-mask-src');
            });
        });

        // trend Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxtrendproduct.default',function($scope) {
            let $trendcarousel = $scope.find('.vs-carousel');
                $trendcarousel.not('.slick-initialized').slick({
                dots: true,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                fade: false,
                speed: 1500,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                  breakpoint: 1600,
                  settings: {
                    slidesToShow: 4,
                    dots: false,
                  }
                }, {
                  breakpoint: 1400,
                  settings: {
                    slidesToShow: 4,
                    dots: false,
                  }
                }, {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 3,
                    dots: false,
                  }
                }, {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 2,
                    dots: false,
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                    dots: false,
                  }
                }, {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    dots: false,
                  }
                }
              ]
            });
        });


        // right choice Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxrightchoice.default',function($scope) {
          let $rightchoice_slider = $scope.find('.naved-img');
                $rightchoice_slider.not('.slick-initialized').slick({
                dots:  false,
                fade: true,
                arrows: false,
                speed:  800,
                autoplay: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplaySpeed: 8000,
                focusOnSelect: true,
                asNavFor: '#naved-slide2',
                prevArrow: '<button type="button" class="slick-prev"><i class="long-arrow"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="long-arrow"></i></button>',
                responsive: [{
                    breakpoint: 1600,
                    settings: {
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 1400,
                    settings: {
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 1200,
                    settings: {
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 992,
                    settings: {
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 767,
                    settings: {
                      slidesToShow: 1,
                    }
                  }, {
                    breakpoint: 576,
                    settings: {
                      slidesToShow: 1,
                    }
                  }
                ]
            });

            let $rightchoice_slider2 = $scope.find('.naved-thumb-slide');
              $rightchoice_slider2.not('.slick-initialized').slick({
              dots:  false,
              arrows: false,
              speed:  800,
              autoplay: true,
              infinite: true,
              slidesToShow: 4,
              slidesToScroll: 1,
              autoplaySpeed: 8000,
              focusOnSelect: true,
              centerMode:true,
              centerPadding: 0,
              asNavFor: '#naved-slide1',
              responsive: [{
                  breakpoint: 1600,
                  settings: {
                    slidesToShow: 4,
                  }
                }, {
                  breakpoint: 1400,
                  settings: {
                    slidesToShow: 4,
                  }
                }, {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 4,
                  }
                }, {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 4,
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 3,
                  }
                }, {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 3,
                  }
                }
              ]
            });
        });

        // service Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxservices.default',function($scope) {

            let $service_slickcarousel = $scope.find('.vs-carousel');
            $service_slickcarousel.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 8000,
                fade: false,
                speed: 1000,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [ {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                    }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                       }
                    }
                ]
            });
        });

        // instagram Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/haarmaxinstagramgallery.default',function($scope) {

            // Function For Custom Arrow Btn
            $('[data-slick-next]').each(function () {
              $(this).on('click', function (e) {
                e.preventDefault()
                $($(this).data('slick-next')).slick('slickNext');
              })
            })

            $('[data-slick-prev]').each(function () {
              $(this).on('click', function (e) {
                e.preventDefault()
                $($(this).data('slick-prev')).slick('slickPrev');
              })
            })

            let $priceplan = $scope.find('.gallery-cutted-slide');
            $priceplan.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: $priceplan.data('slick-arrows'),
                autoplay: false,
                fade: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                focusOnSelect: true,
                centerMode: true,
                centerPadding: '365px',
                prevArrow: '<button type="button" class="slick-prev"><i class="long-arrow"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="long-arrow"></i></button>',
                responsive: [{
                  breakpoint: 1700,
                  settings: {
                    centerPadding: '300px',
                    slidesToShow: 1
                  }
                }, {
                  breakpoint: 1450,
                  settings: {
                    centerPadding: '200px',
                  }
                }, {
                  breakpoint: 1199,
                  settings: {
                    centerPadding: '100px',
                    arrows: false
                  }
                }, {
                  breakpoint: 992,
                  settings: {
                    centerPadding: '50px',
                    arrows: false
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    centerPadding: '0',
                    arrows: false
                  }
                }]
            });
        });


  });

}(jQuery));

