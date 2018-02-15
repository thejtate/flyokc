(function ($) {
    Drupal.behaviors.weatherCustomElement = {
        attach: function (context, settings) {

            initWeather();

        }
    };

    function initWeather() {
        var $elements = $('.weather-custom-item'),
            location = Drupal.settings.weather_custom.location;

        if ($elements.hasClass('weather-custom-item-processed')) {

            return;
        }

        $elements.addClass('weather-custom-item-processed');

        $.simpleWeather({
            location: location,
            woeid: '',
            unit: 'f',
            success: function (weather) {
                html = '<span class="temp">' + weather.temp + '</span><span class="icon icon-' + weather.code + '"></span> ';

                $elements.html(html);
            },
            error: function (error) {
                console.log(error);
                $elements.html('');
            }
        });

    }

})(jQuery);
