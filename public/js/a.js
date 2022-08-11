jQuery(document).ready(function ($) {

// inkhat bayad avale file js bashe vase csrf token faghat yekbar
    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    jQuery(document).on('click', '.orderby_item', function () {


        var lang = $("input[name='lang']").val();
        var search_id = $("input[name='sch_id']").val();
        var is_none_stop = $("input[name='is_none_stop']").val();
        var order = $(this).attr('data-target');
        var text = ".orderby_item[data-target=" + order + "]";


        // ajax
        $.ajax({
            url: "/reorder",
            type: "POST",
            cache: true,
            data: {search_id: search_id, lang: lang, order: order, is_none_stop: is_none_stop},
            dataType: 'html',
            beforeSend: function () {
            },
            success: function (data) {

                // data meghdarie json shodeie k az samte server return mishe mitoni ba json.pars ono b array tabdil koni o meghdaresho estefade koni
                $('#flight_main_container0').html(JSON.parse(data).html);

            },
            error: function () {
            }
        });

        // end ajax


    });


});
