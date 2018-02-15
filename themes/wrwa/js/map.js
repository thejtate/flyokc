;(function(document) {
  'use strict';

  var defaults = {
    classActive: 'active',
    classActiveMobileTooltip: 'active-mobile-tooltip',
    classActiveMobileNav: 'active-mobile-nav',
    classActiveMobileSidebar: 'active-mobile-sidebar',
    classActiveItemDesc: 'sidebar-desc-is-active',
    classActiveMapLevel: 'level-map-is-active',
    mobileScrollLeftMapLevel: 0,
    classActiveUpperLevel: 'level-upper-is-active',
    mobileScrollLeftUpperLevel: 100,
    classActiveLowerLevel: 'level-lower-is-active',
    mobileScrollLeftLowerLevel: 120,
    classActiveParkingLevel: 'level-parking-is-active',
    mobileScrollLeftParkingLevel: 245,
    classActiveMapParkingLevel: 'level-parking-map-is-active',
    mobileScrollLeftMapParkingLevel: 245,
    classActiveCarRenalLevel: 'level-car-rental-is-active',
    mobileScrollLeftCarRenalLevel: 100,
    classResize: 'resizing',
    classAnimated: 'animated',
    classBlur: 'blur',

    overlayId: 'map-overlay',

    descSidebarId: 'sidebar-desc',
    descSidebarBtnCloseId: 'btn-close',

    scaleBlockWrapperId: 'scale-block-wrapper',
    scaleBtnPositiveId: 'scale-btn-positive',
    scaleBtnNegativeId: 'scale-btn-negative',
    scaleProgressId: 'scale-progress',
    scaleBtnProgressId: 'scale-btn-progress',

    firstActiveLevelId: 'level-map',
    levelsLength: '',
    prefixHash: 'el-'
  };

  var elms = {
    wrapper: '#b-map',

    navOfImage: '.level-map',

    navOfLevelsUpperLevel: '.level-upper-control .levels-nav',
    navOfLevelsParkingLevel: '.level-parking-control .levels-nav',
    mobileNavBtn: '.btn-nav-level',

    navOfLevel: '.level-nav',

    mobileSidebarBtnClose: '.btn-sidebar-close',
    mobileSidebarBtn: '.btn-sidebar',
    navOfUpperLevelSidebar: '.level-upper-sidebar',
    navOfLowerLevelSidebar: '.level-lower-sidebar',

    wrapperLevels: '.levels-inner',
    upperLevel: '.level-upper',
    lowerLevel: '.level-lower',
    parkingLevel: '.level-parking',

    overlay: '',

    descSidebar: '',
    descSidebarBtnClose: '',

    scaleBlockWrapperShow: false,
    scaleBlockWrapper: '',
    scaleBtnPositive: '',
    scaleBtnNegative: '',
    scaleProgress: '',
    scaleBtnProgress: '',

    navLevelLoverAndUpper: '#img-nav-level-lover-and-upper'
  };

  var current = [], currentItem, currentItem2, currentTooltip, timer, step;

  var init = function() {
    elms.wrapper = find(elms.wrapper, document);

    if(!elms.wrapper) return;

    elms.navOfImage = find(elms.navOfImage);
    elms.navOfLevelsUpperLevel = find(elms.navOfLevelsUpperLevel);
    elms.navOfLevelsParkingLevel = find(elms.navOfLevelsParkingLevel);
    elms.navLevelLoverAndUpper = find(elms.navLevelLoverAndUpper);
    elms.mobileNavBtn = find(elms.mobileNavBtn);
    elms.navOfLevel = find(elms.navOfLevel);

    elms.mobileSidebarBtnClose = find(elms.mobileSidebarBtnClose);
    elms.mobileSidebarBtn = find(elms.mobileSidebarBtn);
    elms.navOfUpperLevelSidebar = find(elms.navOfUpperLevelSidebar);
    elms.navOfLowerLevelSidebar = find(elms.navOfLowerLevelSidebar);

    elms.wrapperLevels = find(elms.wrapperLevels);
    elms.upperLevel = find(elms.upperLevel);
    elms.lowerLevel = find(elms.lowerLevel);
    elms.parkingLevel = find(elms.parkingLevel);

    elms.levelsLength = (elms.levelsLength) ? elms.levelsLength : findAll('li', elms.navOfLevelsUpperLevel).length;

    buildOverlay();

    if(elms.scaleBlockWrapperShow) buildScale();

    buildDescSidebar();
    bindEvents();

    if(!window.location.hash) {
      // if(hasClass(document.documentElement, 'tablet') || hasClass(document.documentElement, 'mobile')) {
      //   defaults.firstActiveLevelId = 'level-upper';
      // }

      window.location.hash =  defaults.prefixHash + defaults.firstActiveLevelId;
    } else {
      var hash = window.location.hash.replace('#' + defaults.prefixHash, '');
      defaults.firstActiveLevelId = find('[href="#' + hash + '"]') ? hash : defaults.firstActiveLevelId;

      // if(hash == 'level-map' && (hasClass(document.documentElement, 'tablet') || hasClass(document.documentElement, 'mobile'))) {
      //   defaults.firstActiveLevelId = 'level-upper';
      // }

      levelsController(find('[href="#' + defaults.firstActiveLevelId + '"]'));
    }
  };


  //HANDLERS

  var windowResize = function() {
    clearTimeout(timer);
    addClass(document.body, defaults.classResize);

    timer = setTimeout(function() {
      removeClass(document.body, defaults.classResize);
    }, 600);
  };

  var hashChangeHandler = function() {
    var hash = window.location.hash.replace('#' + defaults.prefixHash, '');

    // if(hash == 'level-map' && (hasClass(document.documentElement, 'tablet') || hasClass(document.documentElement, 'mobile'))) {
    //   hash = 'level-upper';
    // }

    levelsController(find('[href="#' + (find('[href="#' + hash + '"]') ? hash : defaults.firstActiveLevelId) + '"]'));
  };

  var mapHoverHandler = function(e) {
    e.stopPropagation();

    if(current.length) removeActiveElms(current, defaults.classActive);

    if(hasClass(document.documentElement, 'desktop')) {
      tooltipHandler(e.target, this);
    }
  };

  var tooltipClickHandler = function(e) {
    if(hasClass(document.documentElement, 'tablet') || hasClass(document.documentElement, 'mobile')) {
      tooltipHandler(e.target, this);
    }
  };

  var navLevelsClickHandler = function(e) {
    e.preventDefault();
    e.stopPropagation();

    var target = closest(this, e.target, 'A');

    if(target && !hasClass(target, defaults.classActive)) {
      var href = target.getAttribute('href').replace('#', '');

      window.location.hash = defaults.prefixHash + href;
    }
  };

  var mobileNavLevelsClickHandler = function(e) {
    e.preventDefault();
    e.stopPropagation();

    toggle(document.body, defaults.classActiveMobileNav);
  };

  var mobileSidebarClickHandler = function(e) {
    e.preventDefault();
    e.stopPropagation();

    toggle(document.body, defaults.classActiveMobileSidebar);
  };

  var navHoverHandler = function(e) {
    e.stopPropagation();

    var target = closest(this, e.target, 'A');

    if(target) {
      setActiveElms(findAll('[data-role="' + target.dataset.role + '"]'), defaults.classActive);
    } else if(current.length) {
      removeActiveElms(current, defaults.classActive);
    }
  };

  var levelClickHandler = function(e) {
    var target = e.target;
    var self = closestAttr(this, target, 'data-url');

    if(self && !hasClass(target, 'ico-empty') && !hasClass(target, 'edit') && !hasClass(target, 'delete')) {
      e.preventDefault();
      e.stopPropagation();

      var href = getByID(self.getAttribute('data-url').replace('#', ''));

      if(href) {
        setActiveNavElm(document.body, defaults.classActiveItemDesc);
        setActiveNavElm(href, defaults.classActive);
      }
    }
  };

  var tooltipHandler = function(target, self) {
    target = closestAttr(self, target, 'data-tooltip');

    if(target) {
      var tooltip = getByID(target.getAttribute('data-tooltip').replace('#', ''));

      if(tooltip) {
        addClass(document.body, defaults.classActiveMobileTooltip);
        setTooltipPosition(target, tooltip);
        setActiveTooltip(tooltip, defaults.classActive);
      }
    } else if(currentTooltip && hasClass(document.documentElement, 'desktop')) {
      removeClass(document.body, defaults.classActiveMobileTooltip);
      removeClass(currentTooltip, defaults.classActive);
    }
  };

  var overlayClickHandler = function(e) {
    if (~e.target.id.indexOf(defaults.overlayId)) {
      if(currentTooltip) {
        removeClass(currentTooltip, defaults.classActive);
      }
      removeClass(document.body, defaults.classActiveMobileTooltip);
      removeClass(document.body, defaults.classActiveMobileSidebar);
      removeClass(document.body, defaults.classActiveItemDesc);

      if(currentItem.tagName !== 'A') {
        removeClass(currentItem, defaults.classActive);
      }
    }
  };

  var closeButtonClickHandler = function(e) {
    e.preventDefault();
    e.stopPropagation();

    if(currentTooltip) {
      removeClass(currentTooltip, defaults.classActive);
    }
    removeClass(document.body, defaults.classActiveMobileTooltip);
    removeClass(document.body, defaults.classActiveMobileSidebar);
    removeClass(document.body, defaults.classActiveItemDesc);

    if(currentItem.tagName !== 'A') {
      removeClass(currentItem, defaults.classActive);
    }
  };

  var scaleBtnHandler = function(e) {
    e.preventDefault();
    e.stopPropagation();

    var target = e.target;

    if(hasClass(target, defaults.scaleBtnPositiveId)) {
      stepController(step - 1);
    } else {
      stepController(step + 1);
    }
  };

  //todo: stop to listening if element is active (navHoverHandler)
  function bindEvents() {
    windowResize();
    bind(window, 'resize', windowResize);
    bind(window, 'hashchange', hashChangeHandler);
    bind(elms.wrapper, 'mouseover', mapHoverHandler);
    bind(elms.wrapper, 'click', tooltipClickHandler);
    bind(elms.navOfImage, 'click', navLevelsClickHandler);
    bind(elms.navOfLevelsUpperLevel, 'click', navLevelsClickHandler);
    bind(elms.navLevelLoverAndUpper, 'click', navLevelsClickHandler);
    bind(elms.navOfLevelsParkingLevel, 'click', navLevelsClickHandler);

    bind(elms.mobileNavBtn, 'click', mobileNavLevelsClickHandler);
    bind(elms.mobileNavBtn, 'touch', mobileNavLevelsClickHandler);

    bind(elms.navOfLevel, 'mouseover', navHoverHandler);

    bind(elms.mobileSidebarBtnClose, 'click', closeButtonClickHandler);
    bind(elms.mobileSidebarBtn, 'mouseover', mobileSidebarClickHandler);
    bind(elms.navOfUpperLevelSidebar, 'mouseover', navHoverHandler);
    bind(elms.navOfLowerLevelSidebar, 'mouseover', navHoverHandler);

    bind(elms.upperLevel, 'click', levelClickHandler);
    bind(elms.lowerLevel, 'click', levelClickHandler);
    bind(elms.parkingLevel, 'click', levelClickHandler);
    bind(elms.overlay, 'click', overlayClickHandler);
    bind(elms.descSidebarBtnClose, 'click', closeButtonClickHandler);

    if(elms.scaleBlockWrapperShow) {
      bind(elms.scaleBtnPositive, 'click', scaleBtnHandler);
      bind(elms.scaleBtnNegative, 'click', scaleBtnHandler);
    }

  }


  //HELPERS

  function bind(element, event, callback, useCapture) {
    element.addEventListener(event, callback, useCapture);
  }

  function getByID(id) {
    return document.getElementById(id);
  }

  function find(element, context) {
    context = (typeof context == 'undefined') ? elms.wrapper : context;

    return context.querySelector(element);
  }

  function findAll(elements, context) {
    context = (typeof context == 'undefined') ? elms.wrapper : context;

    return context.querySelectorAll(elements);
  }

  function closest(self, target, element) {
    while (target != self) {
      if (target.tagName == element.toUpperCase()) {
        return target;
      }

      target = target.parentNode;
    }

    return false;
  }

  function closestAttr(self, target, attr) {
    while (target != self) {
      if (target.hasAttribute(attr)) {
        return target;
      }

      target = target.parentNode;
    }

    return false;
  }

  function create(element, id, cl, html) {
    element = document.createElement(element);
    element.id = (typeof id == 'undefined') ? '' : id;
    element.setAttribute('class', (typeof cl == 'undefined' ? '' : cl));
    element.innerHTML = (typeof html == 'undefined') ? '' : html;

    return element;
  }

  function removeClass(element, cl) {
    element.classList.remove(cl);
  }

  function addClass(element, cl) {
    element.classList.add(cl);
  }

  function hasClass(element, cl) {
    return element.classList.contains(cl);
  }

  function toggle(element, cl) {
    return element.classList.toggle(cl);
  }

  function offset(element) {
    var rect = element.getBoundingClientRect();

    return {
      top: rect.top + window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0,
      left: rect.left + window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft || 0
    }
  }

  function indexInParent(node) {
    var children = node.parentNode.childNodes;
    var num = 0;

    for (var i = 0; i < children.length; i++) {
      if (children[i] == node) return num;
      if (children[i].nodeType == 1) num++;
    }

    return -1;
  }

  function trigger(element, eventName) {
    var event = document.createEvent('HTMLEvents');

    event.initEvent(eventName, true, false);
    element.dispatchEvent(event);
  }


  //CORE METHODS

  function setActiveElms(elements, cl) {
    if(current.length && current !== elements) {
      removeActiveElms(current, defaults.classActive);
    }

    current = elements;

    for(var i = 0; i < current.length; i++) {
      addClass(current[i], cl);
    }
  }

  function removeActiveElms(elements, cl) {
    for(var i = 0; i < elements.length; i++) {
      elements[i].classList.remove(cl);
    }
  }

  function setActiveNavElm(element, cl) {
    if(!element.classList.contains(cl)) {
      if(currentItem && currentItem !== element) {
        removeClass(currentItem, cl);
      }

      currentItem = element;
      addClass(currentItem, cl);
    }
  }

  function setActiveNavImgElm(element, cl) {
    if(!element.classList.contains(cl)) {
      if(currentItem2 && currentItem2 !== element) {
        removeClass(currentItem2, cl);
      }

      currentItem2 = element;
      addClass(currentItem2, cl);
    }
  }

  function setActiveTooltip(element, cl) {
    if(!element.classList.contains(cl)) {
      if(currentTooltip && currentTooltip !== element) {
        removeClass(currentTooltip, cl);
      }

      currentTooltip = element;
      addClass(currentTooltip, cl);
    }
  }

  function setTooltipPosition(target, tooltip) {
    var o = offset(target);
    var left = o.left + target.offsetWidth/2 - tooltip.offsetWidth/2;
    var top = o.top - tooltip.offsetHeight;

    if(left > 0) {
      removeClass(tooltip, 'left');
    } else {
      addClass(tooltip, 'left');
      left = o.left - 18;
    }

    tooltip.style.left = left + 'px';
    tooltip.style.top = top + 'px';
  }

  function buildOverlay() {
    elms.overlay = getByID(defaults.overlayId);

    if(!elms.overlay) {
      elms.overlay = create('div', defaults.overlayId, defaults.overlayId);
      elms.overlay.setAttribute('role', 'dialog');
      elms.wrapper.appendChild(elms.overlay);
    }
  }

  //todo: update create function for variable number of arguments
  function buildDescSidebar() {
    elms.descSidebar = getByID(defaults.descSidebarId);

    if(elms.descSidebar) {
      elms.descSidebarBtnClose = getByID(defaults.descSidebarBtnCloseId);
      return;
    }

    elms.descSidebar = create('div', defaults.descSidebarId, defaults.descSidebarId);
    elms.descSidebarBtnClose = create('span', defaults.descSidebarBtnCloseId, defaults.descSidebarBtnCloseId, '+');
    elms.descSidebar.appendChild(elms.descSidebarBtnClose);

    elms.wrapper.appendChild(elms.descSidebar);
  }

  function buildScale() {
    elms.scaleBlockWrapper = getByID(defaults.scaleBlockWrapper);

    if(elms.scaleBlockWrapper) {
      elms.scaleBtnPositive = getByID(defaults.scaleBtnPositive);
      elms.scaleBtnNegative = getByID(defaults.scaleBtnNegative);
      elms.scaleProgress = getByID(defaults.scaleProgress);
      elms.scaleBtnProgress = getByID(defaults.scaleBtnProgress);
      return;
    }

    elms.scaleBlockWrapper = create('div', defaults.scaleBlockWrapperId, defaults.scaleBlockWrapperId);
    elms.scaleBtnPositive = create('span', defaults.scaleBtnPositiveId, defaults.scaleBtnPositiveId, '+');
    elms.scaleBtnNegative = create('span', defaults.scaleBtnNegativeId, defaults.scaleBtnNegativeId, '-');
    elms.scaleProgress = create('span', defaults.scaleProgressId, defaults.scaleProgressId);
    elms.scaleBtnProgress = create('span', defaults.scaleBtnProgressId, defaults.scaleBtnProgressId);

    elms.scaleBlockWrapper.appendChild(elms.scaleBtnPositive);
    elms.scaleBlockWrapper.appendChild(elms.scaleBtnNegative);
    elms.scaleBlockWrapper.appendChild(elms.scaleProgress);
    elms.scaleBlockWrapper.appendChild(elms.scaleBtnProgress);

    elms.wrapper.appendChild(elms.scaleBlockWrapper);
  }

  function levelsController(target) {
    var href = target.getAttribute('href').replace('#', '');
    var mapElm = getByID(href);
    var mobileScrollPosition;

    if(mapElm == null) return;
    if(currentItem) {
      addClass(mapElm, defaults.classAnimated);
    }

    removeClass(document.body, defaults.classActiveMobileNav);

    mapElm.addEventListener('transitionend', function() {
      removeClass(mapElm, defaults.classAnimated);
      removeClass(document.body, defaults.classBlur);
    });

    window.location.hash = defaults.prefixHash + href;

    switch (href) {
      case 'level-map':
        removeClass(document.body, defaults.classActiveUpperLevel);
        removeClass(document.body, defaults.classActiveLowerLevel);
        removeClass(document.body, defaults.classActiveParkingLevel);
        removeClass(document.body, defaults.classActiveMapParkingLevel);
        removeClass(document.body, defaults.classActiveCarRenalLevel);

        setActiveNavElm(document.body, defaults.classActiveMapLevel);

        removeActiveElms(findAll('a', elms.navOfLevelsUpperLevel), defaults.classActive);
        setActiveNavElm(find('[href="#' + href + '"]', elms.navOfLevelsUpperLevel), defaults.classActive);

        if(step == 1 || step == 2) {
          setActiveNavElm(document.body, defaults.classBlur);
        }

        step = 0;
        mobileScrollPosition = defaults.mobileScrollLeftMapLevel;
        break;
      case 'level-upper':
        removeClass(document.body, defaults.classActiveMapLevel);
        removeClass(document.body, defaults.classActiveLowerLevel);
        removeClass(document.body, defaults.classActiveParkingLevel);
        removeClass(document.body, defaults.classActiveMapParkingLevel);
        removeClass(document.body, defaults.classActiveCarRenalLevel);

        setActiveNavElm(document.body, defaults.classActiveUpperLevel);

        removeActiveElms(findAll('a', elms.navOfLevelsUpperLevel), defaults.classActive);
        setActiveNavElm(find('[href="#' + href + '"]', elms.navOfLevelsUpperLevel), defaults.classActive);

        removeActiveElms(findAll('a', elms.navLevelLoverAndUpper), defaults.classActive);
        setActiveNavImgElm(find('[href="#' + href + '"]', elms.navLevelLoverAndUpper), defaults.classActive);

        if(step == 0) {
          setActiveNavElm(document.body, defaults.classBlur);
        }

        step = 1;
        mobileScrollPosition = defaults.mobileScrollLeftUpperLevel;
        break;
      case 'level-lower':
        removeClass(document.body, defaults.classActiveMapLevel);
        removeClass(document.body, defaults.classActiveUpperLevel);
        removeClass(document.body, defaults.classActiveParkingLevel);
        removeClass(document.body, defaults.classActiveMapParkingLevel);
        removeClass(document.body, defaults.classActiveCarRenalLevel);

        setActiveNavElm(document.body, defaults.classActiveLowerLevel);

        removeActiveElms(findAll('a', elms.navOfLevelsUpperLevel), defaults.classActive);
        setActiveNavElm(find('[href="#' + href + '"]', elms.navOfLevelsUpperLevel), defaults.classActive);

        removeActiveElms(findAll('a', elms.navLevelLoverAndUpper), defaults.classActive);
        setActiveNavImgElm(find('[href="#' + href + '"]', elms.navLevelLoverAndUpper), defaults.classActive);

        step = 2;
        mobileScrollPosition = defaults.mobileScrollLeftLowerLevel;
        break;
      case 'level-parking':
        removeClass(document.body, defaults.classActiveMapLevel);
        removeClass(document.body, defaults.classActiveUpperLevel);
        removeClass(document.body, defaults.classActiveLowerLevel);
        removeClass(document.body, defaults.classActiveMapParkingLevel);
        removeClass(document.body, defaults.classActiveCarRenalLevel);

        setActiveNavElm(document.body, defaults.classActiveParkingLevel);

        removeActiveElms(findAll('a', elms.navOfLevelsParkingLevel), defaults.classActive);
        setActiveNavElm(find('[href="#' + href + '"]', elms.navOfLevelsParkingLevel), defaults.classActive);

        step = 3;
        mobileScrollPosition = defaults.mobileScrollLeftParkingLevel;
        break;
      case 'level-parking-map':
        removeClass(document.body, defaults.classActiveMapLevel);
        removeClass(document.body, defaults.classActiveUpperLevel);
        removeClass(document.body, defaults.classActiveLowerLevel);
        removeClass(document.body, defaults.classActiveParkingLevel);
        removeClass(document.body, defaults.classActiveCarRenalLevel);

        setActiveNavElm(document.body, defaults.classActiveMapParkingLevel);

        removeActiveElms(findAll('a', elms.navOfLevelsParkingLevel), defaults.classActive);
        setActiveNavElm(find('[href="#' + href + '"]', elms.navOfLevelsParkingLevel), defaults.classActive);

        step = 3;
        mobileScrollPosition = defaults.mobileScrollLeftMapParkingLevel;
        break;
      case 'level-car-rental':
        removeClass(document.body, defaults.classActiveMapLevel);
        removeClass(document.body, defaults.classActiveUpperLevel);
        removeClass(document.body, defaults.classActiveLowerLevel);
        removeClass(document.body, defaults.classActiveParkingLevel);
        removeClass(document.body, defaults.classActiveMapParkingLevel);

        setActiveNavElm(document.body, defaults.classActiveCarRenalLevel);

        removeActiveElms(findAll('a', elms.navOfLevelsUpperLevel), defaults.classActive);
        setActiveNavElm(find('[href="#' + href + '"]', elms.mobileScrollLeftCarRenalLevel), defaults.classActive);

        step = 4;
        mobileScrollPosition = defaults.mobileScrollLeftCarRenalLevel;
        break;
      default:
        break;
    }

    setTimeout(function() {
      elms.wrapperLevels.scrollLeft = mobileScrollPosition;
    }, 50);

    if(elms.scaleBlockWrapperShow) setPosition(step);
  }

  function stepController(newStep) {
    var level = '';

    newStep = (newStep < 0) ? 0 : newStep;
    newStep = (newStep > elms.levelsLength - 1) ? elms.levelsLength - 1 : newStep;

    switch (newStep) {
      case 0:
        level = 'level-map';
        break;
      case 1:
        level = 'level-upper';
        break;
      case 2:
        level = 'level-lower';
        break;
      case 3:
        level = 'level-parking';
        break;
    }

    levelsController(find('[href="#' + level + '"]', elms.navOfLevelsUpperLevel));
  }

  function setPosition(newStep) {
    var position = newStep/(elms.levelsLength - 1) * 100;

    elms.scaleBtnProgress.style.top = position + '%';
  }


  //Initialization

  if (document.readyState != 'loading') {
    init();
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }

})(document);