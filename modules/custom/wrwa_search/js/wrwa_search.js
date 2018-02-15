(function ($) {

    function strip(html)
    {
        var tmp = document.createElement("DIV");
        tmp.innerHTML = html;
        return tmp.textContent || tmp.innerText || "";
    }

    // Autocomplete override render
    $.ui.autocomplete.prototype._renderItem = function (ul, item) {

        var term = this.term;
        var first = ("group" in item)  ? 'first' : '';
        var innerHTML = '<div class="ui-autocomplete-fields ' + first + '">';
        item.value = strip(item.value);
        item.label = Drupal.checkPlain(item.label);
        if (item.fields) {
            $.each(item.fields, function(key, value) {
                var regex = new RegExp('(' + $.trim(term) + ')', 'gi');
                var output = Drupal.checkPlain(value);

                if(key == 'nid') {
                    //skip
                }else if(key == 'path') {
                    innerHTML += ('<div class="ui-autocomplete-field-' + key + ' pull-right">');
                    if(value && value.length) {
                        for(var i=0; i < value.length; i++) {
                            innerHTML += ('<span>' + value[i] + '</span>');
                        }
                    }
                    innerHTML += ('</div>');
                }
                else if (value.indexOf('src=') == -1 && value.indexOf('href=') == -1) {
                    output = output.replace(regex, "<span class='ui-autocomplete-field-term'>$1</span>");
                    innerHTML += ('<div class="ui-autocomplete-field-' + key + '">' + output + '</div>');
                } else {
                    innerHTML += ('<div class="ui-autocomplete-field-' + key + '">' + value + '</div>');
                }
            });
        } else {
            innerHTML += ('<div class="ui-autocomplete-field">' + item.label + '</div>');
        }
        innerHTML += '</div>';

        var group = '';
        if ("group" in item) {
            groupId = typeof(item.group.group_id) !== 'undefined' ? item.group.group_id : '';
            groupName = typeof(item.group.group_name) !== 'undefined' ? item.group.group_name : '';
            if(groupId !== "all_results") {
                group += ('<div class="ui-autocomplete-field-group ' + groupId + '">' + groupName + '</div>');
                $(group).appendTo(ul);
            }

        }
        if(groupId !== "all_results") {
                var elem =  $("<li class=ui-menu-item-" + first + "></li>" )
                    .append("<a>" + innerHTML + "</a>");
                if (item.value == '') {
                    elem = $("<li class='ui-state-disabled ui-menu-item-" + first + " ui-menu-item'>" + item.label + "</li>" );
                }

                elem.data("item.autocomplete", item).appendTo(ul);
        } else {
            var elem =  $("<div class=show-all ui-menu-item-" + first + "></div>" )
                .append("<a class='btn-show-all'>" + innerHTML + "</a>");
            if (item.value == '') {
                elem = $("<li class='ui-state-disabled ui-menu-item-" + first + " ui-menu-item'>" + item.label + "</li>" );
            }

            elem.data("item.autocomplete", item).prependTo(ul);
        }

        Drupal.attachBehaviors(elem);
        return elem;
    };

})(jQuery);