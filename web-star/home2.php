MAIN -home
<?php 
/*
    
*/
?>

<?php get_header(); // типо include header.php 
// на эту страницу попадает когда пост точно есть
/*
$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
$hostame = $protocol.'://'.$_SERVER['HTTP_HOST'];

if($hostame == get_site_url()){
    $title = 'Заказать создание и разработку сайта под ключ';    
} else {
    $title = get_the_title();
}
*/
if ( has_post_thumbnail()) {  
    $background_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); // получаем ссылку картинки
// print_r($background_url);
} else {
    $background_url[0]='';
}

?>

<div class="wrapper">
            <div style="display: none">
			<progress id="progressbar" value="0" max="100"></progress>
			</div>

        <div class="title-bar  has-effect overlay-color" style= "background-image:
         url('<?php   echo $background_url[0];    ?>')">        
            <div class="titles">
                <h1 class="htitle" itemprop="headline"> <?php the_title(); ?> </h1>
            </div>        
        </div>

    <div id="content1" >

    <style type="text/css">

.refresh-captcha,
    button[type="submit"] {
      padding-left: 2rem;
    }

    .refresh-captcha::before {
      content: "";
      position: absolute;
      width: 1rem;
      height: 1rem;
      left: .5rem;
      top: 50%;
      transform: translateY(-50%);
      background: transparent no-repeat center center;
      background-size: 100% 100%;
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512.333 512'%3E%3Cpath fill='%23000' d='M440.935 12.574l3.966 82.766C399.416 41.904 331.674 8 256 8 134.813 8 33.933 94.924 12.296 209.824 10.908 217.193 16.604 224 24.103 224h49.084c5.57 0 10.377-3.842 11.676-9.259C103.407 137.408 172.931 80 256 80c60.893 0 114.512 30.856 146.104 77.801l-101.53-4.865c-6.845-.328-12.574 5.133-12.574 11.986v47.411c0 6.627 5.373 12 12 12h200.333c6.627 0 12-5.373 12-12V12c0-6.627-5.373-12-12-12h-47.411c-6.853 0-12.315 5.729-11.987 12.574zM256 432c-60.895 0-114.517-30.858-146.109-77.805l101.868 4.871c6.845.327 12.573-5.134 12.573-11.986v-47.412c0-6.627-5.373-12-12-12H12c-6.627 0-12 5.373-12 12V500c0 6.627 5.373 12 12 12h47.385c6.863 0 12.328-5.745 11.985-12.599l-4.129-82.575C112.725 470.166 180.405 504 256 504c121.187 0 222.067-86.924 243.704-201.824 1.388-7.369-4.308-14.176-11.807-14.176h-49.084c-5.57 0-10.377 3.842-11.676 9.259C408.593 374.592 339.069 432 256 432z'/%3E%3C/svg%3E");
    }

    .custom-file-input:lang(ru)~.custom-file-label::after {
      content: "Обзор";
    }

    button[type="submit"]::before {
      content: "";
      position: absolute;
      width: 1rem;
      height: 1rem;
      left: .5rem;
      top: 50%;
      transform: translateY(-50%);
      background: transparent no-repeat center center;
      background-size: 100% 100%;
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512.333 512'%3E%3Cpath fill='%23fff' d='M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z'/%3E%3C/svg%3E");
    }

    #openModal2 > .modal_div {
    width: 500px;
    position: relative;
    margin: 5% auto;
    padding: 5px 20px 13px 20px;
    border-radius: 10px;
    background: #fff;
    background: -moz-linear-gradient(#fff, #999);
    background: -webkit-linear-gradient(#fff, #999);
    background: -o-linear-gradient(#fff, #999);
}
    </style>

<script>


</script>

<div class="for_zvonok1">

<!--
<a href="#callback" class="mod_okno2" onClick="div_hide('openModal2');">Заказать звонок 2</a>
 </div>

<div id="openModal2" class="modalDialog">
    <div class="modal_div">
<a href="#close" title="Закрыть" class="close" onClick="div_hide('openModal2');" >X</a>
-->

</div>
<?php get_template_part('/assets/modul/feedback/form_feedback_tpl'); ?>
 
  <script>


</script>



<div class="for_zvonok1">    

    <a href="#callback" class="mod_okno" onClick="div_hide('openModal');">Заказать звонок</a>

    <div id="openModal" class="modalDialog">
	  <div>	
		<a href="#close" title="Закрыть" class="close" onClick="div_hide('openModal');" >X</a>
		<h2>Модальное окно</h2>
        <p>Пример простого модального окна, которое может быть создано с использованием CSS3.</p>
        
        <?php   if(isset($_POST["zakaz_zvomka"])) {
        include(__DIR__ . '/assets/modul/email.php'); } ?>

        <form class="obratnuj-zvonok" autocomplete="off"   method='post'>
            

            <div class="form-zvonok"> 
            <div>
                <label>Имя <span>*</span></label>
                <input type='text' name='username' required></div>
            <div>
                <label>Номер телефона (с кодом) <span>*</span></label>
                <input type='text' name='usernumber' required></div>
            <div>
                <label>Сообщение</label>
                <input type='text' name='question'>
            </div>
            <input class="bot-send-mail" type='submit' name='zakaz_zvomka' value='Послать заявку'>
            </div>
        </form>  
    </div>

</div>


<div class="for_zvonok2">
    

</div>



<div id="app">

  <div class="body_sli">
    <p class="slider__top-heading">используй силу 'интернета'</p>    

    <div class ="slider_my">

        <div class="img_sli curry fade">  
             <div class="slider__slide-content">
                 <h3 class="slider__slide-subheading">France</h3>
                 <h2 class="slider__slide-heading">
                 <span>P</span><span>a</span><span>r</span><span>i</span><span>s</span></h2>
                 <p class="slider__slide-readmore">read more</p>
            </div>

            <div class="slider__slide-parts">
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('http://nisnom.com/images/cities-slider-react060917/jace-grandinetti-141556.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('http://nisnom.com/images/cities-slider-react060917/jace-grandinetti-141556.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('http://nisnom.com/images/cities-slider-react060917/jace-grandinetti-141556.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('http://nisnom.com/images/cities-slider-react060917/jace-grandinetti-141556.jpg')">
            </div></div></div>

         </div> 

        <div class="img_sli s--prev fade"> 

             <div class="slider__slide-content">
                 <h3 class="slider__slide-subheading">RUSSIA</h3><h2 class="slider__slide-heading">
                 <span>M</span><span>o</span><span>s</span><span>c</span><span>v</span></h2>
                 <p class="slider__slide-readmore">read more</p>
            </div>

            <div class="slider__slide-parts">
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg')">
                </div></div>
                <div class="slider__slide-part">
                <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg')">
            </div></div></div>

        </div>

        <div class="img_sli fade">  
             <div class="slider__slide-content">
                 <h3 class="slider__slide-subheading">France</h3>
                 <h2 class="slider__slide-heading">
                 <span>P</span><span>a</span><span>r</span><span>i</span><span>s</span></h2>
                 <p class="slider__slide-readmore">read more</p>
            </div>

            <div class="slider__slide-parts">
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('http://nisnom.com/images/cities-slider-react060917/jace-grandinetti-141556.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('http://nisnom.com/images/cities-slider-react060917/jace-grandinetti-141556.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('http://nisnom.com/images/cities-slider-react060917/jace-grandinetti-141556.jpg')">
                </div></div>
                <div class="slider__slide-part">
                <div class="slider__slide-part-inner" style="background-image: url('http://nisnom.com/images/cities-slider-react060917/jace-grandinetti-141556.jpg')">
            </div></div></div>
         
        </div>

        <div class="img_sli fade">
    
             <div class="slider__slide-content">
                 <h3 class="slider__slide-subheading">RUSSIA</h3><h2 class="slider__slide-heading">
                 <span>M</span><span>o</span><span>s</span><span>c</span><span>v</span></h2>
                 <p class="slider__slide-readmore">read more</p>
            </div>

            <div class="slider__slide-parts">
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg')">
                </div></div>
                <div class="slider__slide-part">
                <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg')">
            </div></div></div>

        </div>
        
        <div class="img_sli "> 5 </div>
    </div>

    <div class="sli_control" onclick="plusSlides(-1)"></div>
    <div class="sli_control_right" onclick="plusSlides(1)"></div>

    <div class="div_dot">
        <span class="dot dot_act" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
    </div>

    <a href="https://dribbble.com/shots/3774469-T-R-A-V-E-L-E-R" target="_blank" rel="nofollow" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
  </a>

  <a href="https://twitter.com/NikolayTalanov" target="_blank" rel="nofollow" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
  </a>

  </div>

 

</div>

    <div class="section1" data-anchor="block_my0">
<!--
      <div class="slider s--ready">
        <p class="slider__top-heading">используй силу 'интернета'</p>    

         <div class ="slider__slides">

            <div class="slider__slide s--active"> 

                <div class="slider__slide-content">
                    <h3 class="slider__slide-subheading">France</h3>
                    <h2 class="slider__slide-heading">
                    <span>P</span><span>a</span><span>r</span><span>i</span><span>s</span></h2>
                    <p class="slider__slide-readmore">read more</p>
                 </div>

                <div class="slider__slide-parts">
                    <div class="slider__slide-part">
                        <div class="slider__slide-part-inner" style="background-image: url("<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg");">
                    </div></div>
                    <div class="slider__slide-part">
                        <div class="slider__slide-part-inner" style="background-image: url("<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg");">
                    </div></div>
                    <div class="slider__slide-part">
                        <div class="slider__slide-part-inner" style="background-image: url("<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg");">
                    </div></div>
                    <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url("<?php echo IMG_DIR; ?>684a92ea00973fd7ffd39697e0f69b46.jpg");">
                    </div></div>
                </div>

            </div>

            <div class="slider__slide s--prev"> 

                <div class="slider__slide-content">
                    <h3 class="slider__slide-subheading">France</h3>
                    <h2 class="slider__slide-heading">
                    <span>P</span><span>a</span><span>r</span><span>i</span><span>s</span></h2>
                    <p class="slider__slide-readmore">read more</p>
                 </div>

                <div class="slider__slide-parts">
                    <div class="slider__slide-part">
                        <div class="slider__slide-part-inner" style="background-image: url("<?php echo IMG_DIR; ?>582b13dbdedaa.jpg");">
                    </div></div>
                    <div class="slider__slide-part">
                        <div class="slider__slide-part-inner" style="background-image: url("<?php echo IMG_DIR; ?>582b13dbdedaa.jpg");">
                    </div></div>
                    <div class="slider__slide-part">
                        <div class="slider__slide-part-inner" style="background-image: url("<?php echo IMG_DIR; ?>582b13dbdedaa.jpg");">
                    </div></div>
                    <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url("<?php echo IMG_DIR; ?>582b13dbdedaa.jpg");">
                    </div></div>
                </div>

            </div>


        </div>
        <div class="sli_control"></div>
        <div class="sli_control_right"></div>

       </div>

-->
    </div>


        <div class="section1" data-anchor="block_my1">
            <h2>кому нужен сайт, какие сайты, цель , для чего </h2>

            <div class="citata"><p>
            „Если Вашего бизнеса нет в Интернете, то Вас нет в бизнесе!“</p>
            <p> © Билл Гейтс </p>
            </div>
            <div style="display:flex">

                <div style="width: 49%">
                <p>Сайт – это виртуальный офис, работающий круглосуточно и без выходных.
                 В любой момент пользователь может зайти «в него» и получить нужную
                  ему информацию: товары, услуги, статьи, видео-аудио контент.</p>
                    <p>Это очень удобно для пользователей и полезно для самой компании.
                  </p>
                    <p>Это очень удобно для пользователей и полезно для самой компании.
                  </p>
                    <p>А если бы у вас не было сайта – они бы так и не узнали о вашем существовании.
                  </p>
                    <p>А если бы у вас не было сайта – они бы так и не узнали о вашем существовании.
                  </p>
                    <p> Сайт- инструмент позволяющий найти клиентов, партнеров, поставщиков.
                   Если же на сайте продумать все детали, предусмотреть форму обратной связи или сразу 
                   установить кнопку для заказа товаров/услуг, эффективность вашего ресурса вырастет в разы!
                   </p>
                    <p> Средство информации </p> 

                   <?php // <ol type="A | a | I | i | 1">...</ol>
                   //      height: 200px;       ?>
                   <ol type="A">
                   <li>о последних новостях;</li>
                   <li>о проводимых акциях;</li>
                   <li>о существующих скидках и т.д.</li>                 
                   </ol>
                  
                   Недорогой, но эффективный способ рекламы
                 </div>

                <div style=" margin: 0 auto; position: relative;  width: 250px; perspective: 1000px;">                    
                  
                    <div class="carousel">
                        <div class="item a">Средство информации </div>
                        <div class="item b">Удобно</div>
                        <div class="item c">Возможности для рекламы</div>
                        <div class="item d">Инструмент </div>
                        <div class="item e">Взаимодействие </div>
                        <div class="item f">Расширение каналов</div>                   
                    </div>
                            <div class="prev">Назад</div>
                            <div class="next">Вперед </div>
                        
                </div>   
                     
            </div>
         </div>
   

<div  class="section1 sect2" data-anchor="block_my2">
<!-- my_div1 -->

    <div class="my_div1">

        <div class="tablTarif1">
            <div class="tarifcolor">
                <div class="zagolovok"><p class="tarifHeader">Сайт Визитка - это одностраничный информационный сайт.  </p>
                </div>
            </div>
        <div class="zagolovok2">
        <h4 class="tariText"> "Сайт-Визитка" </h4>
        <p class="cenaTarifHome"> Цена: <span id="CenaViz">10000</span> р.</p>
        </div>


      <div id="spoil11"  class="spolireConten" >    
        <table class="table5">
        <tbody>
        <tr><td>1. Форма заказа звонка </td></tr>
        <tr><td>2. Наполнение 1 страницы</td></tr>
        <tr><td>3. Размещение 10 картинок (фото)</td></tr>
        <tr><td>4. Набор текста  ~ 1000 символов</td></tr>
        </tbody>
        </table>        
      </div>

      <div class="spolireHead openSpoler" >
        <div class="spolireMega"  style="background-color: #666;">Раскрыть весь список
        </div>
      </div>            
            <div class="Fulldescription"> 
            <div class="knopk22"><a data-toggle="fc_modal" data-target="#modal-5ea20357299bf">Заказать</a></div>
            </div>
            </div>

    </div>

            <div class="my_div2">

            <div class="wpb_wrapper">
			 
<div class="tablTarif1">
<div class="tarifcolor">
<div class="tarifIMG"><div style="background-image: url(/wp-content/uploads/2019/01/1-06-3.png); background-color: #666666;"></div></div>
<div class="zagolovok"><p class="tarifHeader">Сайт нужен и полезен в любой сфере бизнеса. </p></div>
</div>

<div class="zagolovok2">
<h4 class="tariText">Во все сайты входит: </h4>
</div>



<table class="table5">
<tbody>
<tr><td>1. Уникальный дизайн <span class="chydesa" onclick="diz('2'); show('block');"><i class="fa fa-angle-double-right" style="margin-right: 4px; margin-left: 4px;"></i>(что это?)</span></td></tr>
<tr><td>2. Адаптивная верстка<span class="chydesa" onclick="diz('21'); show('block');"><i class="fa fa-angle-double-right" style="margin-right: 4px; margin-left: 4px;"></i>(что это?)</span></td></tr>
<tr><td>3. Начальная оптимизация для поисковиков: Яндекс и Google<span class="chydesa" onclick="diz('25'); show('block');"><i class="fa fa-angle-double-right" style="margin-right: 4px; margin-left: 4px;"></i>(что это?)</span></td></tr>
<tr><td>4. Формы обратной связи<span class="chydesa" onclick="diz('9'); show('block');"><i class="fa fa-angle-double-right" style="margin-right: 4px; margin-left: 4px;"></i>(что это?)</span></td></tr>
<tr><td>5. Кнопки соц. сетей<span class="chydesa" onclick="diz('11'); show('block');"><i class="fa fa-angle-double-right" style="margin-right: 4px; margin-left: 4px;"></i>(что это?)</span></td></tr>
<tr class="NoneNovMob"><td>6. Слайдер<span class="chydesa" onclick="diz('7'); show('block');"><i class="fa fa-angle-double-right" style="margin-right: 4px; margin-left: 4px;"></i>(что это?)</span></td></tr>
<tr class="NoneNovMob"><td>7. CMS – система управления сайтом<span class="chydesa" onclick="diz('10'); show('block');"><i class="fa fa-angle-double-right" style="margin-right: 4px; margin-left: 4px;"></i>(что это?)</span></td></tr>

</tbody>
</table>


        <div class="DopFunc"> 
        <p> Бонусы к заказу на сайт </p>
        </div>
        <table class="table5">
        <tbody>
        <tr><td>1. Подбор Хостинга и размещение сайта</td></tr>
        <tr><td>2. Парковка домена (адресс сайта)</td></tr>
        <tr><td>3. Настройка эл. почты вида info@ваш домен</td></tr>
        <tr><td>4. Установка счетчика посещений</td></tr>
        <tr><td>5. Прикрепим SSL сертификат безопасности</td></tr>
        </tbody>
        </table>

</div><!--  конец tablTarif1 -->

		</div>
            </div>

<!--  my_div3  -->
    <div class="my_div3">

        <div class="tablTarif1">
            <div class="tarifcolor">
            <div class="zagolovok"><p class="tarifHeader">LANDIN GPAGE. Рекламный инструмент для запуска промо акций товаров или услуг. </p>
            </div>
        </div>
            <div class="zagolovok2">
            <h4 class="tariText"> "Лендинг" </h4>
            <p class="cenaTarifHome"> Цена: <span id="CenaViz">20000</span> р.</p>
            </div>


            <div id="spoil11"  class="spolireConten" >    
                <table class="table5">
                <tbody>
                <tr><td>1. Дискрипт. Точный и лаконичный заголовок по Вашему виду деятельности </td></tr>
                <tr><td>2. Призыв. Побуждающая к действию фраза</td></tr>
                <tr><td>3. Анимированный слайдер</td></tr>
                <tr><td>4. Кнопка-Форма заказа</td></tr>
                <tr><td>5. Триггеры Доверия. Отзывы довольных клиентов, успешные кейсы, сертификаты и грамоты</td></tr>
                <tr><td>6. Набор текста ~ 1000 символов</td></tr>
                <tr><td>7. Акция. Дедлайн. Стоит ограничить срок действия акции, чтобы клиент не откладывал принятие решения.</td></tr>
                </tbody>
                </table>
            </div>
            <div class="spolireHead openSpoler" >
            <div class="spolireMega"  style="background-color: #666;">Раскрыть весь список</div>
            </div>            
                    <div class="Fulldescription"> 
                    <div class="knopk22"><a data-toggle="fc_modal" data-target="#modal-5ea20357299bf">Заказать</a></div>
                    </div>
                    </div>


    </div>

 <!-- my_div4 -->
            <div class="my_div4"> 

 <!-- flipper -->
   <div id="myflip" class="flip-container" ontouchstart="this.classList.toggle('hover');">
    <div class="flipper">

      <div id="animated-box__front" class="front">
        <!-- front content -->
        <div class="jet-animated-box__overlay">
            <!-- затемнение -->
		<div class="jet-animated-box__inner">
            <!--  CSS свойство justify-content определяет как браузер распределяет пространство между и вокруг флекс элементов вдоль главной оси контейнера (горизонтально), 
                            или производит выравнивание всего макета сетки по оси строки grid-контейнера. -->
                           
            <div class="jet-animated-box__icon">
                <div class="jet-animated-box-icon-inner"><span class="jet-elements-icon"><i aria-hidden="true" class="fas fa-wrench"></i></span>
            </div></div>

            <div class="jet-animated-box__content"><h3 class="">preventative</h3><h4 class="">Maintenance</h4>
        </div></div>

        </div> 

      </div>

        <div class="back">
            <!-- back content --> 
        <div class="jet-animated-box__overlay">
            <!-- затемнение -->
            
            <div class="jet-animated-box__inner">
                <div class="jet-animated-box__content"><h3 class="">preventative</h3>
                    <h4 class="">Maintenance</h4>
                    <p class="">We’ll perform the car checkup and find issues with cooling system, engine, steering and suspension for you! You don’t have to be an expert to do car maintenance!</p>
                    <a class="" href="https://ld-wp73.template-help.com/wordpress/prod_21258/v1/blog/">
                        <span class="jet-animated-box__button-text">Learn more</span>
                        <span class="jet-animated-box__button-icon jet-elements-icon">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
            </div></div>
            </div>

        </div>
    </div>
   </div>
 <!-- end flipper -->



            <div class="tablTarif1">            
            <div class="zagolovok2">
            <h4 class="tariText"> "СВОЙ - САЙТ" </h4>
            <p class="cenaTarifHome"> Цена: <span id="CenaViz">"договорная"</span> р.</p>
            </div>


    <div id="spoil11"  class="spolireConten" >    
                <table class="table5">
                <tbody>
                <tr><td>1. Анимированный слайдер </td></tr>
                <tr><td>2. Несколько форм обратной связи</td></tr>
                <tr><td>3. Нестандартные технические решения</td></tr>
                <tr><td>4. Форма отзывов</td></tr>
                <tr><td>5. Схема проезда</td></tr>
                <tr><td>6. Запуск рекламной компании</td></tr>
                <tr><td>7. Техническая поддержка</td></tr>
                </tbody>
                </table>
            </div>
            <div class="spolireHead openSpoler" >
            <div class="spolireMega"  style="background-color: #666;">Раскрыть весь список</div>
            </div>            
                    <div class="Fulldescription"> 
                    <div class="knopk22"><a data-toggle="fc_modal" data-target="#modal-5ea20357299bf">Заказать</a></div>
                   
                    <div class="tarifcolor_i">
            <div class="zagolovok"><p class="tarifHeader">"СВОЙ" сайт. Вы можете составить для себя "персональный" тариф сайта.</p>
            </div>
        </div>                
                </div>
                    </div>
     </div>
 <!--my_div5 -->
    <div class="my_div5">
 <!--3D флип CUB -->
        <div class="cub_cont">
        <div class="cub">
            <div class="front_cub side"> 
            <div class="inner_my_font">            

                <div class="side">
                    <div class="front_cub_icon">
                        <span class="f_elem_icon"><i aria-hidden="true" class="fas fa-wrench"></i></span>
                    <h3 class="f_title">Сайт  </h3><h4 class="">Визитка</h4>
                </div>
                </div></div>
                </div>
               
            <div class="back_cub side">
          
            <div class="overlay_back side"> </div>           
            
            <div class="inner_my_back">
                    <div class="back_cub_icon back_cont side"><h3 class="back_cont_title">Сайт</h3>
                    <h4 class="back_cont_title">Визитка</h4>
                    <p class="back_cont_p"> Сайт Визитка - это одностраничный информационный сайт. !</p>
                        <a class="" href="/">
                        <span class="jet-animated-box__button-text">Ссылочка</span><span class="">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </span></a>
                </div></div>
                </div>
           </div>
         </div>           
    </div>
     <!--end 3D флип CUB -->

</div>      

        <div class="section1" data-anchor="block_my3">
            <h2>Этапы создания сайта! во все сайт входит: </h2>
            ОСНОВНЫЕ ШАГИ РАЗРАБОТКИ САЙТОВ
            РАБОТАЕМ СО ВСЕМИ ПОПУЛЯРНЫМИ CMS
        </div>

        <div class="section1" data-anchor="block_my4">
            <h2> Сколько это стоит? </h2>
            Во все наши сайты входит:
        </div>

    </div>

</div>      

    

    <div class="content-wrapper clearfix">
            <main class="clearfix">

            <?php  the_post(); // the_post - функция которая все функции глобально перенастраивать с одного поста на другой
                 ?>                 
                     <h1> <?php //the_title();  ?>  </h1>                      
               
                <div>
                    <?php the_content();  ?> 
                    <?php the_post_thumbnail('medium'); // вставляем миниатюры 
                    
                     $id = get_post_thumbnail_id( );
                     echo '<br>$id= '.$image_attributes[1] ;
                    $background_url = wp_get_attachment_image_src( $id, $size );  
                    echo '<br> $background_url= '.$background_url ; 
                    echo '<br>$background_url[1]= '.$image_attributes[1] ; 
                    echo '<br>$$background_url[0]= '.$background_url[0]; 
 
                    //"width=
                    echo '<br>width= '.$image_attributes[1] ;
                    echo '<br>height='.$image_attributes[2] ;                    
                    
                    ?> 

                </div>
                
            </main>

            <?php // dynamic_sidebar(); //для вызова по ид сайдбар
                 //   get_sidebar('single');  // для вызова из фала sidebar-single.php
                ?>  
    </div>

	

    <script src="<?php get_template_directory_uri() ?>/assets/js/slider.js"> </script>
</div> 
<?php get_footer(); ?>