/**
 * Created by dimateus on 22/06/16.
 */
(function ($) {
    var formController = null;

    Drupal.behaviors.wrwaFlightsActions = {
      attach: function (context, settings) {

          $('.wrwa-flights-filters-form', context).once('wrwa-flights-filters-form-calculation', function() {
               formController = new FormController($(this));
          });
      }
    };

    function FormController($form) {

        var tagWrap = $form.find('.tags-wrap')
            ,$submit = $form.find('[name="search"]')
            ,$listTypeRadios = $form.find('[name="output_type"]')
            ,type = $form.data('type')
            ,isArrivals = (type == 'arrivals');

        var filters = [
            {$elem: $form.find('[name="airline"]'), label : 'Airline: '},
            {$elem: $form.find('[name="location"]'), label : isArrivals ? 'From: ' : 'To: '},
            {$elem: $form.find('[name="number"]'), label : 'Flight: #'},
            {$elem: $form.find('[name="status"]'), label : 'Status: '}
        ];
        init();

        function init() {
            $form.on('click', clearFilterHandler);
            tagWrap.html(renderFilters());
            $listTypeRadios.on('change', listTypeChangeHandler);
        }

        function listTypeChangeHandler(){
            var $this = $(this);

            if($this.val() == 'list') {
                $form.removeClass('blocks').addClass('list');
            } else {
                $form.removeClass('list').addClass('blocks');
            }
        }

        function clearFilterHandler(e) {

            if($(e.target).hasClass('close-tag')) {
                var id = $(e.target).data('source');
                var $source = $('#' + id);
                $source.val('');
                $source.trigger('change');
                $submit.trigger('click');
                return false;
            }

        }

        function renderFilters() {
            var $output = '', $filtersOutput = '';

                $.each(filters, function() {
                    var val = this.$elem.val()
                        ,tagName = this.$elem.prop('tagName');
                    if(val) {
                        $filtersOutput += '<span class="tag">';
                        switch(tagName) {
                            case 'SELECT':
                                var text = this.label + this.$elem.find('option[value="' + val + '"]').text();
                                $filtersOutput += text + '<a class="close-tag" data-source="' + this.$elem.prop('id') +'" href="#"></a>';
                                break;
                            case 'INPUT':
                                var text = this.label + val;
                                $filtersOutput += text + '<a class="close-tag" data-source="' + this.$elem.prop('id') +'" href="#"></a>';
                                break;
                        }

                        $filtersOutput += '</span>';
                    }
                });

            if($filtersOutput) {
                $output += '<div class="tag-items">';
                $output += '<span>Filtered by</span>';
                $output += $filtersOutput;
                $output += '</div>';
                $output += '';
            }

            return $output;
        }
    }

})(jQuery);