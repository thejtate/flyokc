(function ($) {

  if (typeof Drupal != 'undefined') {
    Drupal.behaviors.atjWeather = {
      attach: function (context, settings) {
        if($(context).is('span.form-required, span.form-optional')) {
          return; //skip form invoke init. due performance issue
        }
        initChart();
      },

      completedCallback: function () {
        // Do nothing. But it's here in case other modules/themes want to override it.
      }
    }
  }

  $(function () {
    if (typeof Drupal == 'undefined') {
      initChart();
    }
  });

  function initChart() {
    var $bChart = $('.b-chart');
    var chart = document.querySelector('.b-chart .chart');
    var chartInner = chart.querySelector('.chart-items');

    if (!chart || document.documentElement.classList.contains('mobile')) return;

    var options = {
      height: 313,
      barWidth: 40,
      barSpace: 21
    };

    chart.style.height = options.height + 'px';

    var data = chart.getAttribute('data-data').split(';');

    for(var i = 0; i < data.length; i++) {
      data[i] = data[i].split(',');
      drawItem(data[i], i);
    }

    $(window).on('resize scroll', function () {
      if ($(window).scrollTop() + window.outerHeight > $bChart.offset().top + $bChart.outerHeight() && !$bChart.hasClass('processed')) {
        $bChart.addClass('processed');
      }

    }).resize();

    function drawItem(o, i) {
      var bar = document.createElement('div');
      bar.className = 'chart-item';
      bar.style.width = options.barWidth + 'px';
      bar.style.left = i * (options.barWidth + options.barSpace) + 'px';

      if(o[0]) {
        var firstBar = document.createElement('span');
        firstBar.style.height = parseFloat(o[0]) + 'px';
        firstBar.className = 'chart-item-bar chart-item-first-bar';
        bar.appendChild(firstBar);
      }

      if(o[1]) {
        var secondBar = document.createElement('span');
        secondBar.style.height = parseFloat(o[1]) + 'px';
        secondBar.className = 'chart-item-bar chart-item-second-bar';
        bar.appendChild(secondBar);
      }

      chartInner.appendChild(bar);
    }
  }

})(jQuery);