/**** ф-я скрыть / открыть *****/
function div_hide(id) {
    x = document.getElementById(id);
    if (x.style.display == 'block') {

        //   document.getElementById(id).innerHTML = 'function div_hide!'; //document.getElementById('xx').style.display = 'none'; 
        x.style.display = 'none';
    } else {
        x.style.display = 'block';
    }
}

/***  меню бургер  ***/

$(document).ready(function() {

    //$('.sub-menu').wrap('<div class="podmenu">');

    /**** бюргер *******/
    $('.header_burger').click(function(e) {
        $('.header_burger, .header_menu').toggleClass('active');
        $('body').toggleClass('lock'); // заблокируем прокрутку
    })

    /****** кнопка вверх ********/
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.but__backToTop').fadeIn();
        } else {
            $('.but__backToTop').fadeOut();
        }
    });

    $('.but__backToTop').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    /****** end кнопка вверх ********/

});

/**** end меню бургер***/


/*доб стили разделителей в меню*/


var header = $('#header');
var heightHeader = header.height;


window.onscroll = function() {
    if (window.pageYOffset == 0) {

    /*    $('#header').css({
            background: 'rgb(0, 0, 0)',
            color: 'rgb(255, 255, 255)',
        });
        */

           $('.head').css({
            background: 'rgb(0, 0, 0)',
            color: 'rgb(255, 255, 255)',
        });
         $('.logo-container a').css({
            color: 'white',
        });
        $('.head a').css({
            color: 'rgb(255, 255, 255)',
        });
        $('.head ').css({
            color: 'rgb(255, 255, 255)',
        });
        $('.header-tools').css({
            color: 'rgb(255, 255, 255)',
        });
               
        $('.current-menu-item>a').css({
            color: 'red',
        });

    } else {
     /*   $('#header').css({
            background: '#d9d9d9',
            position: 'fixed',
        })  
        */
         $('.head').css({
             background: '#d9d9d9',
            position: 'fixed',
        }) 
        $('.logo-container a').css({
            color: 'rgb(0, 0, 0)',
        });
        $('.head a').css({
            color: 'rgb(0, 0, 0)',
        });
        $('.tools_button ').css({
            color: 'red',
        });
        $('.header-tools').css({
            color: 'rgb(0, 0, 0)',
        });
        $('.current-menu-item>a').css({
            color: 'red',
        });

    }

};