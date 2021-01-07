<?php
/*
	Template Name: Для тестов 
*/
?>
<?php
/* на добавить в css 
.selectedIMG {
    background - color: lightgray;
}
*/
?>
<?php get_header(); ?>


<div class="wrapper">
    </div>
    <?php echo 'sdhfkj ыварыо hfsd s = '.IMG_DIR ?>
 <script type="text/javascript">

     // создадим новый элемент дом, пример тег с  изображение
$('<img>', {
    src: "http://star-web/wp-content/themes/test/assets/img/111.jpg",
    alt: 'ТЕКСТ если   не загрузится картинка',
    title: 'Текст всплывающей над картинкой',
    width: '20%',
  /*  click: function(e) { // ф-я будет менять класс при клике
            $(this).toggleClass("selectedIMG");
        }
        // или через метод on
        /*, 
        on: {
            click: function(e) { // ф-я будет менять класс при клике
                $(this).toggleClass("selectedIMG");
            }
            */
})

// сверху создали элемент обернутый в jquery содержащий тег img с атрибутами
// теперь работаем как с элементом jquery  и применим
.css({
    'padding': '10px',
    'border': ' 1px solid black'
})

.appendTo('body');
 </script>

<style type="text/css">
.someDiv{
width: 150px;
height: 150px;
display: inline-block;
cursor: pointer;
}
#div1{ background-color: blue; }
#div2{ background-color: green; background-image: url('http://star-web/wp-content/uploads/2020/04/s1200-1024x576.jpg');}
#div3{ background-color: yellow; }
#div4{ background-color: black; }
#div5{ background-color: gray; }
 
#modalDiv{
width: 400px;
height: 400px;
position: absolute;
background-color: green;
display: none;
cursor: pointer;
}
</style>


<div id="div1" class="someDiv"></div>
<div id="div2" class="someDiv"></div>
<div id="div3" class="someDiv"></div>
<div id="div4" class="someDiv"></div>
<div id="div5" class="someDiv"></div>

<!-- див - квадрат с эфффектом -->
<div id="modalDiv"></div>

<script>
/*
jQuery(function($){
    $.ajax({
        type: "POST",
        url: window.wp_data.ajax_url,
        data: {
//      action : 'form_obr',            
        },
        success: function (response) {
            console.log('AJAX response : ',response);
        }
    });
});
*/
</script>

<script>
    /*
var animTime = 900;  // задаем время анимации
 
$('.someDiv').on('click', function(e){
var modal = $('#modalDiv');
modal.css('top', (window.innerHeight - modal.height()) ); // рассчием середину
modal.css('left', (window.innerWidth - modal.width()) ); // рассчием середину
modal.css('background-color', $(e.target).css('background-color')); 
// получаем из объекта е (в передаче функции), target - хранит место куда кликнули
modal.show(animTime);  // show - , fadeIn - 
// animTime заданное время анимации

})
 
$('#modalDiv').on('click', function(){
$(this).hide(animTime); // hide - скроет , fadeOut - 
});
*/
var modal = $('#modalDiv'); // див для оттображения
var oldDiv = null;  // переменная для сохранения предыдущего элмента, тк идет замена
 
// ф-я 
function close (cb) {
if(oldDiv){
modal.animate({
'height':oldDiv.height(),
'width':oldDiv.width(),
'top':oldDiv.offset().top,
'left':oldDiv.offset().left
},{
duration:500,
complete: function(){
oldDiv.css({opacity:1});
oldDiv.animate({'opacity':1},{duration:1,complete:function(){
modal.css({'display':'none'});
oldDiv = null;
if(cb)
cb();
}});
}
});
};
};
 
$('.someDiv').on('click', function(e){
var jthis = $(this); // создадим обертку над нашим элементом jthis по кот кликнули
var r = null;
function show(){    // помещаем modal на место jthis

    modal.css({ 'top':jthis.offset().top,
    'left':jthis.offset().left,
    'width':jthis.width(),
    'height':jthis.height(),
    'background-color':jthis.css('background-color'),
    'background-image':jthis.css('background-image'),
    'opacity':'1',
    'display':'block'
    });

jthis.css('opacity',0); // скроем jthis 
// n = 0;  // для получ кол-ва шага
modal.animate({'height':400,'width':400, // animate - запуск анимации, по стандарту очередь
//  .animate({'width':400},{})
    'top':(window.innerHeight - 400) / 2,
    'left':(window.innerWidth - 400) / 2},{
duration: 500,  //duration - длительность анимациии
// queu:  false// вставать в очереди? да-нет
specialEasing: { //доп объеукт с эффектаим динамики анимауии
height: 'linear',  // линейная 
width: 'swing' // ванчале разгонятся , в конце тормозить
}
/*, complete: function() { // запуск функции по окончании анимации
    console.log("Animation complete");
} ,

    step: function(){ // ф-я будет запускатся после каждого шага анимаци
        console.log(" ШАГ " + n++ );
        if(n == 100){
            modal.stop(); // ф-я остановки анимации
        }
    } 
*/
});
oldDiv = jthis;
}
if(oldDiv && oldDiv.attr('id') == jthis.attr('id'))
close();
else if(oldDiv != null){
close(show);
}else{
show();
}
})
 
$('#modalDiv').on('click', function(){
close();
});



</script>


<?php   
//  include(__DIR__ . '/assets/modul/process.php');  ?>


  <script>
 // masked_input_1.4.1-min.js
 // angelwatt.com/coding/masked_input.php
 (function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(o,B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q(o,x(d))}v(C,true);return true}if(u()){q(o,x(d))}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}o.elm=d;if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setCursorPos=function(B){b(d,B)};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));

MaskedInput({
  elm: document.getElementById('phone'), // select by id
  format: '(___)___-__-__',
  separator: '()-'
});
</script>

<script>
  /*
$(document).ready(function() {
  $(form.forma_zapisi).on('submit', function(e) {
   var base_url = window.location.origin; // 
   console.log('base_url : ', base_url);
   var ths = $(this);   // для того чтоб вывести alert и автомат закрыть окно после нажатия ок
   e.preventDefault;
   $.ajax({
     type: "POST",
 //    url: base_url+'/wp-content/themes/test/assets/mytest.php',
     url: window.wp_data.ajax_url,
     data: $(this).serializa(), // передача сериализованных данных
     data: {
                action: 'form_obr',
                //      skjsdhf: 'jksdhf',
            },
     success: function(response) {
                console.log('AJAX response : ', response);
            },
   }).done(function() {
     alert("Спасибо за заявку! ");
     setTimeout(function() {
       var magnificPopup = $.magnificPopup.instance;
       magnificPopup.close();
       ths.trigger("reset");
     },1000);
     
    });
    return false;
});

});
*/
</script>
