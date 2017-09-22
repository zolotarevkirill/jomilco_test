$(document).ready(function () {
    $('.sort-list li').click(function () {

        var fname = $(this).data('sort-f');

        if ($(this).hasClass('asc')) {

            removeClass();
            $(this).addClass('desc');
            eval('orderBy' + fname + '(false)');

        } else if ($(this).hasClass('desc')) {

            removeClass();
            $(this).removeClass('desc');
            $(this).addClass('asc');
            eval('orderBy' + fname + '(true)');

        } else {

            removeClass();
            $(this).addClass('asc');
            eval('orderBy' + fname + '(true)');

        }
    });


    $('.train-list li:not(.occupied)').click(function () {
        $(this).toggleClass('selected');

        var select_count = $('.train-list li.selected').length;
        var text = 'место';

        if (select_count == 0) {
            $('.display').hide();
        } else {

            if (select_count > 1) {
                text = 'места';
            }

            $('.display').show();

            var selected_position = [];

            $('.train-list li.selected').each(function(i,e){
                selected_position.push($(e).text());
            });



            $('.display span').text(selected_position.join(', ') + ' ' + text);
        }


    });


    $('.buy').on('click', function (e) {
        e.parentDefault;

        $(this).children('.inner').show();

        return true;
    });
});


function removeClass() {
    $('.sort-list li').removeClass('asc');
    $('.sort-list li').removeClass('desc');
}

function orderByName(direction) {
    var items = [];

    $('.list li').each(function (i, e) {
        items.push($(e).data('name'));
    });

    items.sort();

    if (direction == false) {
        items.reverse();
    }

    items.forEach(function (item, i) {
        $('.list li[data-name="' + item + '"]').css('order', i);
    });
}

function orderByDateOutput(direction) {
    var items = [];

    $('.list li').each(function (i, e) {
        items.push($(e).data('output'));
    });

    items.sort(function (a, b) {
        return a - b;
    });

    if (direction == false) {
        items.reverse();
    }

    items.forEach(function (item, i) {
        $('li[data-output="' + item + '"]').css('order', i);
    });
}

function orderByDateInput(direction) {
    var items = [];

    $('.list li').each(function (i, e) {
        items.push($(e).data('input'));
    });

    items.sort(function (a, b) {
        return a - b;
    });

    if (direction == false) {
        items.reverse();
    }

    items.forEach(function (item, i) {
        $('li[data-input="' + item + '"]').css('order', i);
    });
}