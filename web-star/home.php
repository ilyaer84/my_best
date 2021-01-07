<?php 
/*
    Template Name: Для главной
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
?>

<!--
    ! орол 
    TODO:
    ? 
-->

<div id="app">


  <div class="body_sli">
    <p class="slider__top-heading bel2">используй силу</p>   
    <p class="slider__top-heading top2 bel2">'интернета'</p>   

    <div class ="slider_my">

        <div class="img_sli curry fade">  
             <div class="slider__slide-content">
                 <h3 class="slider__slide-subheading">Воплощение задумки в проект </h3>
                 <h2 class="slider__slide-heading">
                 <span>С</span><span>о</span><span>з</span><span>д</span><span>а</span><span>н</span><span>и</span><span>е</span>
                 </h2>
            </div>

            <div class="slider__slide-parts">
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>zemlya.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>zemlya.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>zemlya.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>zemlya.jpg')">
            </div></div></div>

         </div> 

        <div class="img_sli s--prev fade"> 

             <div class="slider__slide-content">
                 <h3 class=" subheading2 bel2">Проектирование</h3>
                 <h3 class=" subheading3 bel2">Дизайн</h3>
                 <h3 class=" subheading2 bel2">Программирование</h3>
                 <h2 class="slider__slide-heading zelt bel2">
                 <span>Р</span><span>е</span><span>а</span><span>л</span><span>и</span><span>з</span><span>а</span><span>ц</span><span>и</span><span>я</span>
                 </h2>
                 <p class="slider__slide-readmore">подробнее</p>
            </div>

            <div class="slider__slide-parts">
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>code-web-design.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>code-web-design.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>code-web-design.jpg')">
                </div></div>
                <div class="slider__slide-part">
                <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>code-web-design.jpg')">
            </div></div></div>

        </div>

        <div class="img_sli fade">  
             <div class="slider__slide-content">
                 <h3 class="slider__slide-subheading">Проект готов!</h3>
                 <h2 class="slider__slide-heading red bel2">
                 <span>З</span><span>а</span><span>п</span><span>у</span><span>с</span><span>к</span>
                 </h2>
            </div>

            <div class="slider__slide-parts">
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>space.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>space.jpg')">
                </div></div>
                <div class="slider__slide-part">
                    <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>space.jpg')">
                </div></div>
                <div class="slider__slide-part">
                <div class="slider__slide-part-inner" style="background-image: url('<?php echo IMG_DIR; ?>space.jpg')">
            </div></div></div>
         
        </div>

    </div>

    <div class="sli_control" onclick="plusSlides(-1)"></div>
    <div class="sli_control_right" onclick="plusSlides(1)"></div>

    <div class="div_dot">
        <span class="dot dot_act" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <a href="https://vk.com/frilance77" target="_blank" rel="nofollow" class="icon-link">
  <img src="" data-src="<?php echo IMG_DIR; ?>vk-icon-clipart.png" alt="vkontakte">
  </a>
  
  <a href="https://www.instagram.com/frilance77/" target="_blank" rel="nofollow" class="icon-link icon-link--twitter">
  <img src="" data-src="<?php echo IMG_DIR; ?>instagram-icone.png" alt="instagram">
  </a>

  </div>

</div>

<!--section 2-->
<section class="section2">
    <div class="citata">
        <p>  „Если Вашего бизнеса нет в Интернете, то Вас нет в бизнесе!“</p>
        <p> © Билл Гейтс </p>
    </div>

     <div class="body_sect">
        <div class="left_sect">
        <p><span class="red">Сайт</span>  – это виртуальный офис, работающий круглосуточно и без выходных.
                 В любой момент пользователь может зайти «в него» и получить нужную
                  ему информацию: товары, услуги, статьи, видео-аудио контент.</p>
        </div>
        <div class="right_sect">
                    <p>Это очень удобно для пользователей и полезно для самой компании.      </p>
                    <p>А если бы у вас не было сайта – они бы так и не узнали о вашем существовании.  </p>
                    <p> Сайт- инструмент позволяющий найти клиентов, партнеров, поставщиков.
                   Если же на сайте продумать все детали, предусмотреть форму обратной связи или сразу 
                   установить кнопку для заказа товаров/услуг, эффективность вашего ресурса вырастет в разы!
                   </p>
                    <p>Средство информации: </p> 

                   <?php // <ol type="A | a | I | i | 1">...</ol>
                   //      height: 200px;       ?>
                   <ol type="1">
                   <li> о последних новостях;</li>
                   <li> о проводимых акциях;</li>
                   <li> о существующих скидках и т.д.</li>                 
                   </ol>
                  
                  <p> Недорогой, но эффективный способ рекламы. </p>
         </div>
     </div>

</section>

  <!--section 3 --> 
<section class="section3" >
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
        <p class="cenaTarifHome"> Цена: <span class="CenaViz">5 000</span> р.</p>
        </div>

<!-- flipper ontouchstart="this.classList.toggle('hover');" -->
<div  class="flip-container" >
    <div class="flipper">

      <div  class="front" style="
    background-image: url('<?php echo IMG_DIR; ?>startup-failures-transparency.jpg');">
        <!-- front content -->
        <div class="jet-animated-box__overlay">
            <!-- затемнение -->
		<div class="jet-animated-box__inner">
            <!--  CSS свойство justify-content определяет как браузер распределяет пространство между и вокруг флекс элементов вдоль главной оси контейнера (горизонтально), 
                            или производит выравнивание всего макета сетки по оси строки grid-контейнера. -->
                           
            <div class="jet-animated-box__icon">
                <div class="jet-animated-box-icon-inner"><span class="jet-elements-icon">
                <i class="fa fa-address-card"></i>
                </span>
            </div></div>

            <div class="jet-animated-box__content"><p>Сайт </p><p>Визитка</p>
        </div></div>
        </div> 
      </div>
      
        <div class="back" style="
    background-image: url('<?php echo IMG_DIR; ?>inner.jpg');">
            <!-- back content --> 
        <div class="jet-animated-box__overlay">
            <!-- затемнение -->
            
            <div class="jet-animated-box__inner">
                <div class="jet-animated-box__content"><p></p>
                    <p class=""></p>
                    <p class="">Сайт Визитка - это одностраничный информационный сайт. </p>
                    <a class="zakaz"  data-zakaz="Сайт-визитка" data-toggle="fc_modal" data-target="#modal-visit">
                        <span class="jet-animated-box__button-text">Создать</span>

                        <span class="jet-animated-box__button-icon jet-elements-icon">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
            </div></div>
            </div>

        </div>
    </div>
   </div>
 <!-- end flipper -->

      <div   class="spolireConten" >    
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
        <div class="spolireMega">Раскрыть весь список
        </div>
      </div>            
            <div class="Fulldescription"> 

                <div class="button23">
                    <a class="zakaz"  data-zakaz="Сайт-визитка" data-toggle="fc_modal" data-target="#modal-visit">Заказать</a></div>
                </div>
                
            </div>
    </div>

   <div class="my_div2">
			 
<div class="tablTarif1">
<div class="tarifcolor">
<div class="tarifIMG"><div style="background-image: url('<?php echo IMG_DIR; ?>dartz.jpg')" ></div></div>
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
        <tr><td>5. Прикреплю SSL сертификат безопасности</td></tr>
        </tbody>
        </table>

</div><!--  конец tablTarif1 -->

            </div>

<!--  my_div3  -->
    <div class="my_div3">

        <div class="tablTarif1">
            <div class="tarifcolor">
            <div class="zagolovok"><p class="tarifHeader">LANDING PAGE. Рекламный инструмент для запуска промо акций товаров или услуг. </p>
            </div>
        </div>
            <div class="zagolovok2">
            <h4 class="tariText"> "Лендинг" </h4>
            <p class="cenaTarifHome"> Цена: <span class="CenaViz">15 000</span> р.</p>
            </div>

  <!--3D флип CUB -->
<div class="cub_cont">
        <div class="cub">
            <div class="front_cub side"> 
            <div class="inner_my_font">            

                <div class="side">
                    <div class="front_cub_icon">
                        <span class="f_elem_icon">
                        <i class="fa fa-american-sign-language-interpreting" ></i>

                        </span>
                    <p class="f_title">LANDING </p><p class="">PAGE</p>
                </div>
                </div></div>
                </div>
               
            <div class="back_cub side" style="
    background-image: url('<?php echo IMG_DIR; ?>s1200.jpg');">
          
            <div class="overlay_back side"> </div>           
            
            <div class="inner_my_back">
                    <div class="back_cub_icon back_cont side"><p class="back_cont_title"></p>
                    <p class="back_cont_title">"Лендинг"</p>
                    <p class="back_cont_p"> Рекламный инструмент для запуска промо акций товаров или услуг.</p>
                    
                    <a class="zakaz" data-zakaz="LANDING PAGE" data-toggle="fc_modal" data-target="#modal-visit">
                        <span class="jet-animated-box__button-text">Создать</span><span class="">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </span></a>
                </div></div>
                </div>
           </div>
         </div>           
    
     <!--end 3D флип CUB -->

            <div   class="spolireConten" >    
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
            <div class="spolireMega" >Раскрыть весь список</div>
            </div>            
                    <div class="Fulldescription"> 
                    <div class="button23">
                    <a class="zakaz" data-zakaz="LANDING PAGE" data-toggle="fc_modal" data-target="#modal-visit">
                    Заказать</a></div>
                    </div>
      </div>


    </div>

 <!-- my_div4 -->
            <div class="my_div4"> 
<!--3D флип CUB -->
<div class="cub_cont">
        <div class="cub">
            <div class="front_cub side"> 
            <div class="inner_my_font">            

                <div class="side">
                    <div class="front_cub_icon">
                        <span class="f_elem_icon">
                        <i class="fa fa-cog" ></i>
                        </span>
                    <p class="f_title">СВОЙ </p><p class="">Сайт</p>
                </div>
                </div></div>
                </div>
               
                <div class="back_cub side" style="
    background-image: url('<?php echo IMG_DIR; ?>bulbs.jpg');">
          
            <div class="overlay_back side"> </div>           
            
            <div class="inner_my_back">
                    <div class="back_cub_icon back_cont side"><p class="back_cont_title"></p>
                    <p class="back_cont_title">"СВОЙ - САЙТ"</p>
                    <p class="back_cont_p"> Тариф "СВОЙ - САЙТ" - Вы можете составить "персональный" тариф сайта</p>
                   
                    <a class="zakaz" data-zakaz="СВОЙ - САЙТ" data-toggle="fc_modal" data-target="#modal-visit">
                        <span class="jet-animated-box__button-text">Создать</span><span class="">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </span></a>
                </div></div>
                </div>
           </div>
         </div>           
    
     <!--end 3D флип CUB -->

            <div class="tablTarif1">            
            <div class="zagolovok2">
            <h4 class="tariText"> "СВОЙ - САЙТ" </h4>
            <p class="cenaTarifHome"> Цена: <span class="CenaViz">"договорная"</span> р.</p>
            </div>

            <div   class="spolireConten" >    
                <table class="table5">
                <tbody>
                <tr><td>1. Анимированный слайдер </td></tr>
                <tr><td>2. Несколько форм обратной связи</td></tr>
                <tr><td>3. Нестандартные технические решения</td></tr>
                <tr><td>4. Форма отзывов</td></tr>
                <tr><td>5. Запуск рекламной компании</td></tr>
                <tr><td>6. Техническая поддержка</td></tr>
                </tbody>
                </table>
            </div>
            <div class="spolireHead openSpoler" >
                <div class="spolireMega"  style="background-color: #666;">Раскрыть весь список
                </div>
            </div>            
                  <div class="Fulldescription"> 
                   <div class="button23">
                   <a class="zakaz"  data-zakaz="СВОЙ - САЙТ" data-toggle="fc_modal" data-target="#modal-visit">
                   Заказать</a>
                   </div>
                   
                    <div class="tarifcolor tarifcolor_i">
            <div class="zagolovok"><p class="tarifHeader">"СВОЙ" сайт. Вы можете составить для себя "персональный" тариф сайта.</p>
            </div>
        </div>                
                </div>
                    </div>
     </div>

 <!--my_div5 -->
    <div class="my_div5">

<!-- flipper -->
<div  class="flip-container" >
    <div class="flipper">

      <div  class="front" style="
    background-image: url('<?php echo IMG_DIR; ?>biz_dia.jpg');">
        <!-- front content -->
        <div class="jet-animated-box__overlay">
            <!-- затемнение -->
		<div class="jet-animated-box__inner">
            <!--  CSS свойство justify-content определяет как браузер распределяет пространство между и вокруг флекс элементов вдоль главной оси контейнера (горизонтально), 
                            или производит выравнивание всего макета сетки по оси строки grid-контейнера. -->
                           
            <div class="jet-animated-box__icon">
                <div class="jet-animated-box-icon-inner"><span class="jet-elements-icon">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>

                </span>
            </div></div>

            <div class="jet-animated-box__content"><br><p>Интернет  </p><p>магазин</p>
        </div></div>
        </div> 
      </div>
      
        <div class="back" style="
    background-image: url('<?php echo IMG_DIR; ?>dol2.jpg');">>
            <!-- back content --> 
        <div class="jet-animated-box__overlay">
            <!-- затемнение -->
            
            <div class="jet-animated-box__inner">
                <div class="jet-animated-box__content"><p></p>
                    <p class=""></p>
                    <p class="">Интернет-магазин - сайт, торгующий товарами посредством сети Интернет</p>
                    
                    <a class="zakaz"  data-zakaz="Интернет магазин" data-toggle="fc_modal" data-target="#modal-visit">
                        <span class="jet-animated-box__button-text">Создать</span>
                        <span class="jet-animated-box__button-icon jet-elements-icon">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </span>
                    </a>
            </div></div>
            </div>

        </div>
    </div>
   </div>
 <!-- end flipper -->

     <div class="tablTarif1">            
            <div class="zagolovok2">
            <h4 class="tariText"> "Интернет магазин" </h4>
            <p class="cenaTarifHome"> Цена: <span class="CenaViz">30 000</span> р.</p>
            </div>

            <div   class="spolireConten" >    
                <table class="table5">
                <tbody>
                <tr><td>1. Корзина </td></tr>
                <tr><td>2. "Новинки",  "Акции" на главной странице</td></tr>
                <tr><td>3. Отзывы о товаре</td></tr>
                <tr><td>4. Форма заказа в "один клик"</td></tr>
                <tr><td>5. Форма заказа звонка</td></tr>
                </tbody>
                </table>
            </div>
            <div class="spolireHead openSpoler" >
                <div class="spolireMega"  style="background-color: #666;">Раскрыть весь список
                </div>
            </div>            
                  <div class="Fulldescription"> 
                   <div class="button23">
                   <a class="zakaz"  data-zakaz="Интернет магазин" data-toggle="fc_modal" data-target="#modal-visit">
                   Заказать</a>
                   </div>
                   
                    <div class="tarifcolor tarifcolor_i">
            <div class="zagolovok"><p class="tarifHeader">"Интернет магазин" позволяет сформировать онлайн заказ товаров, услиг.</p>
            </div>
        </div>                
                </div>
                    </div> 
        </div>
        
</div>       
</section>
  <!--end section 3-->

<!--section 4 -->
<section>
<div class="user-slider">
    <p class="zag-rev">    
        <span>
            <mark>Отзывы  </mark>Клиентов	</span>
    </p>

<div class="user-slides">

	<?php
		$reviews = get_posts([
			'post_type'   => 'review'
		]);

	foreach($reviews as $review): ?>
		<div class="user">
            <div class="user__img">
            	<?php echo get_the_post_thumbnail($review->ID, 'size300-200'); ?>
            </div>
            <div class="user__name">
                <?php echo $review->post_title ?>
            </div>
            <!-- 
            <div class="user__job">
            	<?php // echo 'Город: '.get_field('city', $review->ID) ?>
        	</div>
            -->
            <div class="user__post">
            	<?php echo get_field('text', $review->ID) ?>
            </div>
        </div>
	<?php endforeach; ?>
  </div>

</div>
</section>
<!-- end section 4-->

    <div class="pered_f text-c">
        <h5> Разработка сайтов на  CMS (Word Press). </h5>        
        </h6>Заказать сайт в Самаре, в Екатеринбурге, в Нижнем Новгороде, в Тольятти.</h6>
        <p> 
        Заказать сайт можно из любого города России.
        </p> 
    </div>

<?php get_footer(); ?>

<script>
// авто слайдер
interval_sli = setInterval(function auto_sli() {
    plusSlides(1);
    //     interval_inner_css = setInterval(inner_css, 800) // 1000 одна секунда        
}, 5000); // 1000 - одна секунда
</script>
