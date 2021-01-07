$(function() {

    $('.user-slides').slick({
        prevArrow: $('.user-left'),
        nextArrow: $('.user-right'),
        slidesToShow: 2,
        responsive: [{
            breakpoint: 480,
            settings: {
                slidesToShow: 1
            }
        }]
    });

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