(function ($) {
    Drupal.behaviors.wrwaCustomCitiesServed = {
      attach: function (context, settings) {
            $('.form#cities-filters').once('cities-served', function(){
              var $wrap = $(this)
                  ,$airline = $wrap.find('#filters-airline')
                  ,$city = $wrap.find('#filters-city')
                  ,$submit = $wrap.find('input.form-submit')
                  ,$table = $('table.info-list')
                  ,$rows = $table.find('tbody tr')
                  ,$tableMain = $('table.info-list-main')
                  ,$tableSeason = $('table.info-list-season')
                  ,$rowsMain = $tableMain.find('tbody tr')
                  ,$rowsSeason = $tableSeason.find('tbody tr');
                filterRows();

                $submit.on('click', filterRows);

                function filterRows() {

                    var city = $city.val()
                        ,airline = $airline.val();

                    if(city != '_none' || airline !='_none') {
                        var showselector = (airline != '_none') ?  '.airline-'+ airline : '';
                        showselector += (city != '_none') ?  '[data-city="'+ city + '"]' : '';

                        $rows.hide().removeClass('show').removeClass('row-odd');
                        $rows.filter(showselector).show().addClass('show');
                        $rows.filter(showselector).filter( ":odd" ).addClass('row-odd');

                    } else {
                        $rows.show().addClass('show').removeClass('row-odd');
                        $rows.filter( ":odd" ).addClass('row-odd');
                    }

                    var mainHiddenRowsCount = $tableMain.find('tbody tr').not('.show').length
                      ,seasonHiddenRowsCount = $tableSeason.find('tbody tr').not('.show').length
                      ,mainRowsCount = $rowsMain.length
                      ,seasonRowsCount = $rowsSeason.length;

                    if (mainHiddenRowsCount == mainRowsCount) {
                      $tableMain.hide();

                    } else {
                      $tableMain.show();
                    }

                    if (seasonHiddenRowsCount == seasonRowsCount) {
                      $tableSeason.hide();

                    } else {
                      $tableSeason.show();
                    }

                    return false;
                }
            });
      }

    };
})(jQuery);