function div_hide(id) {
    x = document.getElementById(id);
    if (x.style.display == 'block') {



        //   document.getElementById(id).innerHTML = 'function div_hide!'; //document.getElementById('xx').style.display = 'none'; 
        x.style.display = 'none';
    } else {
        x.style.display = 'block';
    }
}

/*****полоса загрузки progress*****/
$(document).ready(function () {
    var progressbar = $('#progressbar'),
        max = progressbar.attr('max'),
        time = (1000 / max) * 5,
        value = progressbar.val();

    var loading = function () {
        value += 1;
        addValue = progressbar.val(value);

        $('.progress-value').html(value + '%');

        if (value == max) {
            clearInterval(animate);
        }
    };


    var animate = setInterval(function () {
        loading();
    }, time);


});

/*****end полоса загрузки progress*****/

/*доб стили разделителей в меню*/

/*
var header = $('#header');
var heightHeader = header.height;


window.onscroll = function() {
    if (window.pageYOffset == 0) {
        $('#header').css({
            background: 'rgb(255, 255, 255)',
            position: 'relative',
            color: 'rgb(0, 0, 0)',
        });
        $('#header a').css({
            color: 'rgb(0, 0, 0)',
        });
        $('#content').css({
            "margin-top": "0"
        });
    } else {
        $('#header').css({
            background: 'rgb(0, 0, 0)',
            position: 'fixed',
            color: 'rgb(255, 255, 255)',
        })
        $('#header a').css({
            color: 'rgb(255, 255, 255)',
        });
        $('#content').css({
            "margin-top": parseInt($('#header').css('height')) + 7
        });
    }
};
*/



/***  скрипт прокрутка по блокам  надо подкл отдел скрипт * jquery.fullPage.min.js ***/
/*
$(document).ready(function() {
    $('#fullpage').fullpage({
        anchors: ['block1', 'block2', 'block3', 'block4'],
        menu: '#menu',
        css3: true,
        scrollingSpeed: 1000
    });
});
*/
/*** end  скрипт прокрутка по блокам****/

window.onload = function () {
    console.log('МОЙ Скрипт подключился!'); // для выыода инфы в консоли



    /******** 3d карусель на CSS***********/
    var carousel = $(".carousel"),
        currdeg = 0;

    $(".next").on("click", {
        d: "p"
    }, rotate);
    $(".prev").on("click", {
        d: "n"
    }, rotate);

    function rotate(e) {
        if (e.data.d == "p") {
            currdeg = currdeg - 60;
        }
        if (e.data.d == "n") {
            currdeg = currdeg + 60;
        }
        carousel.css({
            "-webkit-transform": "rotateY(" + currdeg + "deg)",
            "-moz-transform": "rotateY(" + currdeg + "deg)",
            "-o-transform": "rotateY(" + currdeg + "deg)",
            "transform": "rotateY(" + currdeg + "deg)"
        });
    }
    /******** end 3d карусель на CSS***********/



    /******** спойлер ***********/


    $(".spolireHead").on("click", function () {
        if ($(this).hasClass('openSpoler')) {
            $(this).removeClass('openSpoler').children().html('Свернуть')
        } else {
            $(this).addClass('openSpoler').children().html('Раскрыть весь список')
        }


        $(this).prev().slideToggle();

        // roditel = $(this).parent();
        // $(roditel).find($(".NoneNovMob")).toggleClass("NoneFix");


    });
    /******** end спойлер ***********/

    /***перевернет флип***/
    //document.querySelector("#myflip").classList.toggle("flip");
    /*** end перевренет флип***/

    /**********  форма обратно связи  ************/

    //после загрузки DOM


    /*
    Параметры указываются в виде:
    {
    ключ: значение;
    ключ: значение;
    ...
    }
    Основные параметры
    selector - селектор формы (по умолчанию '#feedback-form')
    maxSizeFile - максимальный размер файла в мегабайтах (по умолчанию 0.5)
    validFileExtensions - допустимые расширения файлов для загрузки (по умолчанию 'jpg','jpeg','bmp','gif','png') 
    */

    // selector: '#feedback-form' (по умолчанию)
    /*   var form1 = new ProcessForm();
    // С помощью функции-конструктора ProcessForm можно обрабатывать любое количество форм.
    form1.init({
        selector: '#feedback-form'
    });
*/
    // selector: '#feedback-form-2'
    /*
    var form2 = new ProcessForm({
        selector: '#feedback-form-2'
    });
    form2.init();
*/



    /********** end  форма обратно связи  ************/

    // $ тк работаем с Jquery, доступ к элементам =
    // ('div') - обращение к блокам
    // ('.lalala') - обращение через . к классу CSS
    // ('#xxx') - обращение к ID = document.getElementById('xxx')
    // ('div') - обращение к блокам

    /*
            $(".sub-menu").append("<li class='item'>Тест</li>"); // Добавление содержимого в конец элементов
            $(".sub-menu").prepend("<li class='item'> Тест </li>"); //Добавление содержимого в начало элементов
      
        xx = $(".sub-menu").html();
        $(".sub-menu").html("<div>lalala</div>" + xx); //Добавление содержимого в начало элементов
     */

    //  var xx = document.getElementById('.spolireHead').innerHTML; 



    //   alert(zam);
    //  xx.innerHTML = ''; // очищаем родительский контейнер
    //  test.appendChild(zam); // вставляем в очищенный контейнер новый div

    //   $(".spolireMega").on("click", function() $(".next").on("click", { d: "p" }, rotate);

    // $(".sub-menu").wrap("<div class='new'>lalala</div>"); //  "обернуть" по отдельности списки 
    //$(".sub-menu").wrapAll("<div class='new'>lalala</div>"); //  "обернем" списки одним общим div-элементом: 

    //  $("li .sub-menu").before('<i class="fa sub-mark fa-angle-down" aria-hidden="true"></i>');

    /*
    $('vert').each(function() {
        // выведем содержимое текущего элемента в консоль
        console.log($(this).html());
    });

*/
    /*
    $(function() {
        $('ul li>a').on('click', function(e) {
            if ($(this).parent().find('ul').length > 0) {
                e.preventDefault();
                /* тут код по раскрытию меню, или другим действиям */
    /*
}
});
}); 

*/
    // document.getElementById('vert').innerHTML += '<br>Login = ';
    //  x = document.getElementById('yyy').innerHTML;
    //  alert(x);
    // document.getElementById('xx').innerHTML = 'Hello!';
    /*
        var x = $('.sub-menu').css('background-color');
        alert(x);
    */



}