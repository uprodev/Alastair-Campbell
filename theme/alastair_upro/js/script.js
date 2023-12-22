jQuery(document).ready(function ($) {

  //open search
  $(document).on('click', '.search-btn a', function (e){
    e.preventDefault();
    $('.search-form-wrap').addClass('is-active');
  });

  //close search
  $(document).on('click', '.close-search a', function (e){
    e.preventDefault();
    $('.search-form-wrap').removeClass('is-active');
  });

  /*slider*/
  var swiper4n1 = new Swiper(".slider-4n-1", {
    slidesPerView: 1.2,
    spaceBetween: 10,
	  loop:true,
	 autoplay: {
      delay: 4000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    navigation: {
      nextEl: ".next-4n-1",
      prevEl: ".prev-4n-1",
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1350: {
        slidesPerView: 4,
        spaceBetween: 50,
      },
    },
  });

  /*slider*/
  var swiper4n2 = new Swiper(".slider-4n-2", {
    slidesPerView: 1.2,
    spaceBetween: 10,
	 loop:true,
	 autoplay: {
      delay: 4000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    navigation: {
      nextEl: ".next-4n-2",
      prevEl: ".prev-4n-2",
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1350: {
        slidesPerView: 4,
        spaceBetween: 67,
      },
    },
  });

  /*slider*/
  var swiper45n = new Swiper(".slider-4-5n", {
    slidesPerView: "auto",
    spaceBetween: 10,
	autoplay: {
      delay: 4000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    navigation: {
      nextEl: ".next-4-5n",
      prevEl: ".prev-4-5n",
    },
    breakpoints: {
      576: {

        spaceBetween: 20,
      },
      768: {

        spaceBetween: 20,
      },
      1024: {

        spaceBetween: 65,
      },
    },
  });


  /* mob-menu*/
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-responsive'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('body').addClass('is-active');
      $('html').addClass('is-menu');
      $('header').addClass('is-active');
    }, 100);

  });

  /*close mob menu*/
  $(document).on('click', '.close-menu a', function (e){
    e.preventDefault();
    $('body').removeClass('is-active');
    $.fancybox.close();
    $('header').removeClass('is-active');
    $('html').removeClass('is-menu');
  });




  //select
  $('select').niceSelect();

  //progress bar

  if($('.default-page .aside').length > 0){
    var winHeight = $(window).height(),
      docHeight = $('.default-page .content').height(),
      progressBar = $('.progress span'),
      topBlock = $('.default-page .content').offset().top,
      max, value, readText;


    /* Set the max scrollable area */
    max = docHeight - winHeight + topBlock;


    $(document).on('scroll', function(){
      readText = $(window).scrollTop();
      value = (readText/max)*100
      progressBar.css("width", value + "%");

    });

  }



  //fix block
  $('.default-page .aside').fixTo('.default-page .content', {
    top: 50
  });

  var swiperImg = new Swiper(".slider-img", {
    spaceBetween: 10,
    effect: "fade",
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".img-next",
      prevEl: ".img-prev",
    },
    pagination: {
      el: ".img-pagination",
      clickable: true,
    },
  });

  $('.page-template-blog .blog-tabs .item-blog .text-event .wrap-text p:nth-child(2)').Cuttr({
    //options here
    licenseKey: 'EBE72281-71134D04-83AFE92D-27BD4A6F',
    truncate: 'words',
    ending: ' ...',
    length: 15
  });

  $('.slider-4n-block .excerpt, .shop-tabs .wrap-text .excerpt').Cuttr({
    //options here
    licenseKey: 'EBE72281-71134D04-83AFE92D-27BD4A6F',
    truncate: 'characters',
    ending: ' ...',
    length: 95
  });

  $('.shop-tabs .wrap .excerpt').Cuttr({
    //options here
    licenseKey: 'EBE72281-71134D04-83AFE92D-27BD4A6F',
    truncate: 'characters',
    ending: ' ...',
    length: 115
  });
  $('.breadcrumb li:last-child').Cuttr({
    //options here
    licenseKey: 'EBE72281-71134D04-83AFE92D-27BD4A6F',
    truncate: 'words',
    ending: ' ...',
    length: 5
  });
	
	
		//Изменение ширины и высоты
	function myfun() {
		if(window.innerWidth >992){
			   $.fancybox.close();
		}
	};

	$( window ).resize(myfun);
	$( document ).ready(myfun);

});