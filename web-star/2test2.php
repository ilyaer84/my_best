<?php
/*
	Template Name: Для тестов 222
*/

?>
<?php get_header(); ?>

<div class="for_zvonok1">

<!--
<a href="#callback" class="mod_okno2" onClick="div_hide('openModal2');">Заказать звонок 2</a>
 </div>

<div id="openModal2" class="modalDialog">
    <div class="modal_div">
<a href="#close" title="Закрыть" class="close" onClick="div_hide('openModal2');" >X</a>
-->

<?php get_template_part('form_zakaz_zvonka'); ?>



</div>


<script>
// http://star-web/wp-content/themes/test/assets/js/test.js

    

    $("form.forma_zapisi").submit(function(e) { 
    e.preventDefault();
   var base_url = window.location.origin; // 
   console.log('base_url : ', base_url);
  // var ths = $(this),   // для того чтоб вывести alert и автомат закрыть окно после нажатия ок
   var fData = $(this).serialize();

   console.log( "fData = " + fData );
   console.log( $(this).serialize() );

   $.ajax({
     type: "POST",
     url: base_url+'/wp-content/themes/test/assets/mytest.php',
 //    url: window.wp_data.ajax_url,
 //    data: $(this).serializa(), // передача сериализованных данных
        data: $(this).serialize()  ,   
 //      data: new FormData(this),
 /*    data: {
                action: 'form_obr',
                //      skjsdhf: 'jksdhf',
            }, */
     success: function(response) {
                console.log('AJAX response : ', response);
            },
   }).done(function() {
     alert("Спасибо за заявку! ");
  /*   setTimeout(function() {
       var magnificPopup = $.magnificPopup.instance;
       magnificPopup.close();
       ths.trigger("reset");
     },1000);
 */   
    });
    return false;
});


wp_die();
</script>

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
 // masked_input_1.4.1-min.js
 // angelwatt.com/coding/masked_input.php
 (function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(o,B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q(o,x(d))}v(C,true);return true}if(u()){q(o,x(d))}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}o.elm=d;if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setCursorPos=function(B){b(d,B)};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));

MaskedInput({
  elm: document.getElementById('phone'), // select by id
  format: '(___)___-__-__',
  separator: '()-'
});

      // ajax-запрос (пример использования formdata в jquery):
      //   url - адрес на который будет отправлен запрос
      //   data - данные, которые необходимо отправить на сервер  
      //   processData - отменить обработку данных
      //   contentType - не устанавливать заголовок Content-Type 
      //   type - тип запроса
      //   dataType - тип данных ответа сервера
      //   success - функция, которая будет выполнена после удачного запроса
</script>