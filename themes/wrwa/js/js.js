(function ($) {

  if (typeof Drupal != 'undefined') {
    Drupal.behaviors.projectName = {
      attach: function (context, settings) {
        init();
        if (context !== document) {
          initTextBlocks();
        }
      },

      completedCallback: function () {
        // Do nothing. But it's here in case other modules/themes want to override it.
      }
    };
  }

  $(function () {
    if (typeof Drupal == 'undefined') {
      init();
    }
  });

  $(window).load(function () {
    initTextBlocks();
    initFlexsliderGalleryLogo();
    setRetinaWidth();
    initSearchAnimation();
  });

  function init() {
    initFlexsliderGalleryMobile();
    initFlexsliderGalleryTablet();
    initFlexsliderGallery();
    initControlNavGallerySliders();
    initFlexslider();
    initFullWidthBlock();
    initGallery();
    initCloseBlock();
    initSelect();
    initSearchHeader();
    initMobileNav();
    initTabsNav();
    initFaqItems();
    SearchResult();
  }

  function SearchResult() {
    var $wrapper = $('.form-search');
    var $elm = $wrapper.find('.form-text');

    $wrapper.append('<a href="#" class="btn-close"></a>');

    var $btn = $wrapper.find('.btn-close');

    $elm.on('click touch', function () {
      $wrapper.addClass('active');
    });

    $btn.on('click touch', function () {
      $wrapper.removeClass('active');
      $elm.val('');
      $('ul.ui-autocomplete').style('display', 'none');
    });
  }

  function initSearchAnimation() {
    var $wrapper = $('.form-search');
    var $elm = $wrapper.find('.form-text');

    if (!$elm.length || $wrapper.hasClass('form-search-processed')) return;

    $wrapper.addClass('form-search-processed');

    var text = 'Start typing to begin your search';

    if (!$('html').hasClass('desktop')) {
      $elm.attr('placeholder', text);
      return;
    }

    $elm.val('');

    var speed = 50;
    var flag = false;
    var timer;
    var counter = 0;

    if(GetIEVersion() == 0) {
      $elm.focus();
    }

    $elm.on('keydown', function () {
      if (!flag) {
        finished();
      }
    });

    typing();

    function GetIEVersion() {
      var sAgent = window.navigator.userAgent;
      var Idx = sAgent.indexOf("MSIE");

      // If IE, return version number.
      if (Idx > 0)
        return parseInt(sAgent.substring(Idx+ 5, sAgent.indexOf(".", Idx)));

      // If IE 11 then look for Updated user agent string.
      else if (!!navigator.userAgent.match(/Trident\/7\./))
        return 11;

      else
        return 0; //It is not IE
    }


    function typing() {
      $elm.val($elm.val() + text[counter]);
      counter++;

      if (flag || counter == text.length) {
        finished();

        return;
      }

      timer = setTimeout(typing, speed);
    }

    function finished() {
      flag = true;
      clearTimeout(timer);
      $elm.val('');
      $elm.attr('placeholder', text);
    }
  }

  function initFaqItems() {
    var $wrapper = $('.faq-items'),
      $el = $wrapper.find('> ul > li'),
      $item = $el.find('> div > a');

    $item.on('click touch', function (e) {
      e.preventDefault();

      var $parent = $(this).closest('li');

      if ($parent.hasClass('active')) {
        $parent.removeClass('active');

      } else {
        $el.removeClass('active');
        $parent.addClass('active');
      }
    })
  }

  function initTextBlocks() {
    var $wrapper = $('.articles-items');

    if (!$wrapper.length || $wrapper.hasClass('text-blocks-processed')) return;

    $wrapper.addClass('text-blocks-processed');

    $(window).on('resize', function () {
      $wrapper.each(function () {
        var $this = $(this);

        setHeight($this);
      });
    }).resize();

    function setHeight(el) {
      var $elms = el.find('.item');
      var height = 0;
      var $currentEl;
      var currentHeight;

      for (var i = 0; i < $elms.length; i++) {
        $currentEl = $elms.eq(i);

        $currentEl.height('auto');
        $currentEl.find('.text-block-inner-set-height').height('auto');
        currentHeight = $currentEl.height();

        if (height < currentHeight) {
          height = currentHeight;
        }
      }

      $elms.height(height);

      for (var i = 0; i < $elms.length; i++) {
        $currentEl = $elms.eq(i);

        var $elmsInner = $currentEl.find('.text-block-inner');

        if (!$elmsInner.length) continue;

        var $elmsInnerWithH = $elmsInner.filter('.text-block-inner-set-height');
        var $elmsInnerWithoutH = $elmsInner.filter(':not(.text-block-inner-set-height)');

        currentHeight = 0;

        for (var y = 0; y < $elmsInnerWithoutH.length; y++) {
          currentHeight += $elmsInnerWithoutH.eq(y).height();
        }

        $elmsInnerWithH.height((height - currentHeight) / $elmsInnerWithH.length);
      }

      $elms.addClass('loaded');
    }
  }

  function initTabsNav() {
    var $wrapper = $('.tabs-wrapper.style-a');
    var $nav = $wrapper.find('.tab-nav li');
    var $content = $wrapper.find('.tabs-content .item');
    var current = 0;
    var prefix = 'item-';

    if (!$wrapper.length) return;

    if (window.location.hash) {
      current = window.location.hash.replace('#' + prefix, '');
    }

    setActiveTab(current);

    $nav.find('a').on('click touch', navClickHandler);
    $(window).on('hashchange', onHashChange);

    function onHashChange() {
      current = window.location.hash.replace('#' + prefix, '');

      if (current > $nav.length - 1) return;

      removeActiveTabs();
      setActiveTab(current);
    }

    function navClickHandler(e) {
      e.preventDefault();

      var index = $(this).parent().index();

      removeActiveTabs();
      setActiveTab(index);
    }

    function setActiveTab(index) {
      $nav.eq(index).addClass('active');
      $content.eq(index).addClass('active');

      window.location.hash = prefix + index;
    }

    function removeActiveTabs() {
      $nav.removeClass('active');
      $content.removeClass('active');
    }
  }

  function initMobileNav() {
    var $wrapper = $('.nav');
    var $listWrapper = $wrapper.find('.menu-block-wrapper > ul.menu');
    var $list = $listWrapper.find('li');
    var $listLinks = $list.find('a');
    var $btn = $('.nav .btn-nav');
    var $body = $('body');

    if ($wrapper.hasClass('nav-processed')) return;

    $wrapper.addClass('nav-processed');

    for (var i = 0; i < $listLinks.length; i++) {
      var $current = $listLinks.eq(i);

      if (!$current.siblings('ul').length) continue;

      $current.siblings('ul').prepend('<li class="back-nav-btn"><a href="#">back</a></li>');
      $current.append('<span class="icon-next-menu"></span>');
    }

    var $btnNextMenu = $wrapper.find('.icon-next-menu');
    var $btnBack = $wrapper.find('.back-nav-btn a');

    $btnNextMenu.on('click touch', function (e) {
      e.preventDefault();

      var $this = $(this).closest('li');

      if ($this.hasClass('active-next-level')) {
        $this.removeClass('active-next-level');
        $body.removeClass('active-next-level');

      } else {
        $this.addClass('active-next-level');
        $body.addClass('active-next-level');
      }
    });

    $btnBack.on('click touch', function (e) {
      e.preventDefault();

      var $this = $(this).parents('.active-next-level');

      setTimeout(function () {
        $this.removeClass('active-next-level');
      }, 300);

      $body.removeClass('second-nav-level-active');
    });

    $btn.on('click touch', function (e) {
      e.preventDefault();

      $body.toggleClass('mobile-nav-active');
    });

    $body.on('click touch', function (e) {
      if (!$(e.target).closest($wrapper).length) {
        if ($body.hasClass('mobile-nav-active')) $body.removeClass('mobile-nav-active');
        $list.removeClass('active-next-level');
      }
    });
  }

  function initSearchHeader() {
    var $wrapper = $('.search-wrapper'),
      $btn = $wrapper.find('.btn-search');

    if ($wrapper.hasClass('search-processed')) return;

    $wrapper.addClass('search-processed');

    $btn.on('click touch', function (e) {
      e.preventDefault();

      if ($wrapper.hasClass('active')) {
        $wrapper.removeClass('active');

      } else {
        $wrapper.addClass('active');
        $wrapper.find('.form-text').focus();
      }
    })
  }


  function initSelect() {
    $('select').select2({
      width: 'full',
      adaptDropdownCssClass: function (c) {
        return c;
      },
      minimumResultsForSearch: Infinity
    });
  }

  function initCloseBlock() {
    var $block = $('.block-wrapper'),
      $closeBtn = $block.find('.close');

    $closeBtn.on('click touch', function (e) {
      e.preventDefault();

      $block.hide();
    })
  }

  function initFlexslider() {
    $('.section-slider').flexslider({
      directionNav: false,
      controlNav: false,
      slideshowSpeed: 10000,
      animationSpeed: 2000
    });
  }

  function initGallery() {
    var $wrapper = $('.section-gallery.style-a .site-container');
    var $sliders = $('.gallery-slider-mobile, .gallery-slider-tablet, .gallery-slider');
    var counter = false;
    var $pager;
    var $pagerBtn;

    for (var i = 0; i < $sliders.length; i++) {
      var sliderLength = $sliders.eq(i).find('.slides li:not(.clone)').length;

      if (sliderLength > 1) {
        counter = true;
      }
    }

    if (counter) {
      createPager();
    }

    function createPager() {
      $pager = $wrapper.append('<div class="gallery-control-arrows">' +
      '<a href="#" class="control-prev">prev</a>' +
      '<a href="#" class="control-next">next</a>' +
      '</div>');

      $pagerBtn = $wrapper.find('.gallery-control-arrows a');
      $pagerBtn.on('click', function (e) {
        e.preventDefault();

        var $target = $(e.target);

        if ($target.hasClass('control-prev')) {
          goPrev();
        } else if ($target.hasClass('control-next')) {
          goNext();
        }
      });
    }

    function goPrev() {
      for (var i = 0; i < $sliders.length; i++) {
        $sliders.eq(i).find('.flex-direction-nav .flex-prev').trigger('click');
      }
    }

    function goNext() {
      for (var i = 0; i < $sliders.length; i++) {
        $sliders.eq(i).find('.flex-direction-nav .flex-next').trigger('click');
      }
    }
  }

  function initFlexsliderGalleryLogo() {

    var $wrappers = $('.section-items'),
      $item = $wrappers.find('.item');

    $item.eq(0).find('.logo-slider').flexslider({
      direction: 'vertical',
      animation: 'slider',
      directionNav: false,
      controlNav: false,
      touch: false,
      slideshowSpeed: 6000
    });

    $item.eq(1).find('.logo-slider').flexslider({
      direction: 'vertical',
      animation: 'slider',
      directionNav: false,
      controlNav: false,
      initDelay: 1000,
      touch: false,
      slideshowSpeed: 6000
    });

    $item.eq(2).find('.logo-slider').flexslider({
      direction: 'vertical',
      animation: 'slider',
      directionNav: false,
      controlNav: false,
      initDelay: 2000,
      touch: false,
      slideshowSpeed: 6000
    });

    $item.eq(3).find('.logo-slider').flexslider({
      direction: 'vertical',
      animation: 'slider',
      directionNav: false,
      controlNav: false,
      initDelay: 3000,
      touch: false,
      slideshowSpeed: 6000
    });

    $item.eq(4).find('.logo-slider').flexslider({
      direction: 'vertical',
      animation: 'slider',
      directionNav: false,
      controlNav: false,
      initDelay: 4000,
      touch: false,
      slideshowSpeed: 6000
    });

    $item.eq(5).find('.logo-slider').flexslider({
      direction: 'vertical',
      animation: 'slider',
      directionNav: false,
      controlNav: false,
      initDelay: 5000,
      touch: false,
      slideshowSpeed: 6000
    });

    $('.nonstop-mobile').flexslider({
      direction: 'vertical',
      animation: 'slider',
      directionNav: false,
      controlNav: false,
      initDelay: 1000,
      touch: false,
      slideshowSpeed: 6000
    });

    var $wrapper = $('.logo-slider .item');

    $wrapper.on('touchstart', function () {
      $('body').css('overflow', 'hidden');
    });

    $wrapper.on('touchend', function () {
      $('body').css('overflow', 'visible');
    });
  }

  function setRetinaWidth() {
    var $wrapper = $('.front .section-items');

    if (!$wrapper.length) return;

    $wrapper.find('.elems img').each(function () {
      var $this = $(this);

      $this.css({
        width: $this[0].width / 2,
        maxWidth: '100%'
      });
    });
  }

  function initFlexsliderGallery() {
    $('.gallery-slider').flexslider({
      direction: 'vertical',
      animation: 'slider',
      slideshow: false,
      animationSpeed: 1000,
      pauseOnAction: false,
      start: function (slider) {
        setAnimation(slider);
      },
      before: function(slider){
        var elemIndex = slider.currentSlide + 1;
        var $elemControlNavEl =  $('.control-nav-desktop li');

        $elemControlNavEl.removeClass('active');

       if(elemIndex >= $elemControlNavEl.length ){
         $elemControlNavEl.eq(0).addClass('active');
       }else{
         $elemControlNavEl.eq(elemIndex).addClass('active');
       }
      },
      after: function (slider) {
        setAnimation(slider);
      }
    });
  }

  function initFlexsliderGalleryTablet() {

    $('.gallery-slider-tablet').flexslider({
      direction: 'vertical',
      animation: 'slider',
      slideshow: false,
      animationSpeed: 1000,
      pauseOnAction: false,
      prevText: '',
      nextText: '',
      touch: false,
      start: function (slider) {
        setAnimation(slider);
      },
      before: function(slider){
        var elemIndex = slider.currentSlide + 1;
        var $elemControlNavEl =  $('.control-nav-tablet li');

        $elemControlNavEl.removeClass('active');
        if(elemIndex >= $elemControlNavEl.length ){
          $elemControlNavEl.eq(0).addClass('active');
        }else{
          $elemControlNavEl.eq(elemIndex).addClass('active');
        }
      },
      after: function (slider) {
        setAnimation(slider);
      }
    });
  }

  function initControlNavGallerySliders(){
    var $wrapper = $('.section-gallery.style-a');

    if ($wrapper.hasClass('section-processed')) return;

    $wrapper.addClass('section-processed');

    var $wrapperSlider = $('.gallery-slider-tablet');
    var $wrapperSliderDesc = $('.gallery-slider');

    $wrapper.find('.site-container').append('<div class="control-nav-desktop"><ul></ul></div><div class="control-nav-tablet"><ul></ul></div>');

    var $wrapperNavDesk = $('.control-nav-desktop ul');
    var $wrapperNavTablet = $('.control-nav-tablet ul');

    for(var i = 0; i< $wrapperSliderDesc.eq(0).find('.flex-control-nav li').length; i++){
      $wrapperNavDesk.append('<li><a href="#"></a></li>');
    }

    for(var j=0; j< $wrapperSlider.eq(0).find('.flex-control-nav li').length; j++){
      $wrapperNavTablet.append('<li><a href="#"></a></li>')
    }

    var $navTab = $('.control-nav-tablet li a, .control-nav-desktop li a');

    $('.control-nav-tablet li').eq(0).addClass('active');
    $('.control-nav-desktop li').eq(0).addClass('active');

    $navTab.on('click touch', function (e) {
      e.preventDefault();

      var $parent = $(this).parent();
      var $parentIndex = $parent.index();

      for (var i = 0; i < $wrapperSlider.length; i++) {
        $wrapperSlider.eq(i).find('.flex-control-nav li').eq($parentIndex).find('a').trigger('click');
      }

      for (var i = 0; i < $wrapperSliderDesc.length; i++) {
        $wrapperSliderDesc.eq(i).find('.flex-control-nav li').eq($parentIndex).find('a').trigger('click');
      }

      $navTab.parent().removeClass('active');
      $parent.addClass('active');
    });
  }

  function initFlexsliderGalleryMobile() {
    $('.gallery-slider-mobile').flexslider({
      //direction: 'vertical',
      animation: 'slider',
      slideshow: false,
      animationSpeed: 1000,
      pauseOnAction: false,
      prevText: '',
      nextText: '',
      touch: false,
      start: function (slider) {
        setAnimation(slider);
      },
      after: function (slider) {
        setAnimation(slider);
      }
    });
  }

  function setAnimation(slider) {
    var time = parseInt(slider.slides[slider.currentSlide].getAttribute('data-slide-delay'));

    if (isNaN(time)) return;

    if (slider.timeOut) {
      clearTimeout(slider.timeOut);
    }

    slider.timeOut = setTimeout(function () {
      $(slider.directionNav[1]).trigger('click');
    }, time);
  }

  function initFullWidthBlock() {
    var $elements = $('.full-block'),
      minWidth = 0;

    $(window).on('resize', setPosition);
    setPosition();

    function setPosition() {
      var $winWidth = $(window).outerWidth(),
        width;

      if ($winWidth > minWidth) {
        width = $winWidth;
      } else {
        width = minWidth;
      }

      $elements.width(width);
      $elements.css('margin-left', '-' + width / 2 + 'px');
    }
  }

})(jQuery);