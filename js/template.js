$(document).ready(function () {


    var city1 = new CustomSelect({
        elem: document.getElementById('myInput')
    });
    var city2 = new CustomSelect({
        elem: document.getElementById('myInput2')
    });


    $("#datepicker").datepicker();
    $(".datepicker2").datepicker();

    $('.inner').hide();

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


    $('.myRadio').click(function () {
        $('.myRadio').removeClass('selected');
        $(this).addClass('selected');
    });

    $('.formBtn').on('click', function (e) {
        e.preventDefault();

        var send = true;
        var form = $(this).data('form');

        $('#' + form + ' input').removeClass('error');

        $('#' + form + ' input').each(function (i, e) {

            if (isEmpty($(e).val())) {
                var name = $(e).attr('placeholder');
                $(e).addClass('error');
                alert('Заполните поле «' + name + '» !');
                send =  false;
            }

        });

        if(!validate(form)){
            send =  false;
        }


        if(send){

            var name = 'Это текст из template.js сам писал!'

            $.post('/include/ajax.php',{name:name},function(data){
                alert(data);
            });

        }


        return false;
    });


    $('.train-list li:not(.occupied)').click(function () {
        $(this).toggleClass('selected');

        var select_count = $('.train-list li.selected').length;
        var text = 'место';
        var disp = $(this).data('display');

        //console.log(disp);

        if (select_count == 0) {
            $('.display').hide();
        } else {

            if (select_count > 1) {
                text = 'места';
            }

            $("[data-disp='" + disp + "']").show();

            var selected_position = [];


            $("[data-display='" + disp + "'].selected").each(function (i, e) {
                selected_position.push($(e).text());
            });


            //console.log(selected_position);


            $("[data-d='" + disp + "']").text(selected_position.join(', ') + ' ' + text);
        }


    });


    $('.buy').on('click', function (e) {
        e.parentDefault;
        $('.line').removeClass('active');
        $('.buy').show();
        $('.inner').hide();
        $(this).hide();


        var item = $(this).data('item');
        var line = $(this).data('line');

        console.log("[data-l='" + line + "']");

        $("[data-l='" + line + "']").addClass('active');
        $("[data-inner='" + item + "']").show();

        return true;
    });
});


function validate(form_id) {



    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    var address = $('#'+form_id+' input[name="email"]').val();

    if(reg.test(address) == false) {
        alert('Введите корректный e-mail');
        $('#'+form_id+' input[name="email"]').addClass('error');
        return false;
    }else {
        $('#'+form_id+' input[name="email"]').removeClass('error');
        return true;
    }
}


function removeClass() {
    $('.sort-list li').removeClass('asc');
    $('.sort-list li').removeClass('desc');
}

function orderByName(direction) {
    var items = [];

    $('.line').each(function (i, e) {
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

function isEmpty(str) {
    if (str.trim() == '')
        return true;

    return false;
}

function CustomSelect(options) {
    var elem = options.elem;

    elem.onclick = function (event) {
        if (event.target.className == 'title') {
            toggle();
        } else if (event.target.tagName == 'LI') {
            setValue(event.target.innerHTML, event.target.dataset.value);
            close();
        }
    }

    var isOpen = false;


    function onDocumentClick(event) {
        if (!elem.contains(event.target)) close();
    }


    function setValue(title, value) {
        elem.querySelector('.title').innerHTML = title + ' <span>' + value + '</span>';

        var widgetEvent = new CustomEvent('select', {
            bubbles: true,
            detail: {
                title: title,
                value: value
            }
        });

        elem.dispatchEvent(widgetEvent);

    }

    function toggle() {
        if (isOpen) close()
        else open();
    }

    function open() {
        elem.classList.add('open');
        document.addEventListener('click', onDocumentClick);
        isOpen = true;
    }

    function close() {
        elem.classList.remove('open');
        document.removeEventListener('click', onDocumentClick);
        isOpen = false;
    }

}