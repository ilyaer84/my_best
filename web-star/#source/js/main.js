/***собираем в один ***/

//@prepros-append header.js
//@prepros-append slider.js
//@prepros-append modal.js


$(document).ready(function() {



    /******** передача данных ссылку в форму********/

    $("a.zakaz").click(function() {
        $('#zvonok input[name="zakaz"]').val($(this).attr("data-zakaz"));
        $(".d_zakaz").show();
        div_hide('openModal');
    })

    $("a.tools_button").click(function() {
        $('#zvonok input[name="zakaz"]').val($(this).attr("data-zakaz"));
        $(".d_zakaz").hide();
        div_hide('openModal');
    })

    /******** спойлер ***********/
    $(".spolireHead").on("click", function() {
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

    /********  reviews ***********/
    $(function() {

        $('.user-slides').slick({
            prevArrow: $('.user-left'),
            nextArrow: $('.user-right'),
            slidesToShow: 3,
            cssEase: 'linear',
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [{
                breakpoint: 767, //breakpoint — это ширина при которой следует включать настройки.
                settings: {
                    slidesToShow: 1, //сколько слайдов показывать в карусели
                    //    slidesToScroll: 3 // сколько слайдов прокручивать за раз
                }
            }]
        });
        /******** end reviews ***********/
        $('.like-post').one('click', function() { // при клике на любой элемент с классом like-post
            // one('click' -  единоразово срабатывающий обработчик события 
            var $span = $(this); //

            var data = { // отпраляем данные на сервер
                action: 'likepost', // экшен до кот можно достучаться до зарегистрированного  прописан в function.php
                id: $span.data('id') // id поста
            };

            $.post(_PHP.ajaxUrl, data, function(res) { // $.post - функция будет обращатся на адресс _PHP.ajaxUrl
                // data - второй параметр,
                //function(res) - ф-я обработчик ответа кот принимает результат
                $span.fadeOut(200).prev().html(res);
                // вернулся результат с сервера $span.fadeOut(200) - span который позволяет лайнуть скроем
                // .prev() - перейдем к предыдущему span и зададим 
            });
        });

    });


})