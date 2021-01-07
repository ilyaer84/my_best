Задания
2) Формы обратной связи, Форма заказа звонка 
3)Триггеры Доверия. Отзывы довольных клиентов, успешные кейсы, сертификаты и грамоты
2) СМС уведомления


- блок выбора тарифа
- Триггеры Доверия
- блок Этапы создания сайта 
- Триггеры Доверия
- галерея примеров сайтов
_______
доп:
1) схема проезда - на карту от вас к пункту компании

*************
для scss 
npm i --save-dev gulp gulp-sass browser-sync
*************
Короткий, понятный и уникальный заголовок, привлекающий внимание и мотивирующий к скроллингу страницы;
    Изложение преимуществ оффера и выгод для потребителя, если он его приобретет;
    Call-to-action - призыв к действию с демонстрацией ценности, способной заставить человека сделать целевое действие здесь и сейчас, лидогенерирующие кнопки;
    Форма обратной связи;
    Красивые тематические картинки или фото продукта, видео;
    Блок доверия.








<div id="fullpage">

<?php 
    global $post;
 
    $i=0;
    $postslist = get_posts( array( 'posts_per_page' => 2, 'category'=>'sozdanie_saitov' ) );
    
    foreach ( $postslist as $post ){
//        my_filter_function($post);
    setup_postdata($post); // Устанавливает глобальные данные поста. Нужен для удобного использования Тегов шаблона связанных с оформление поста: the_title(), the_permalink() 
    ++$i;
    
    if ( has_post_thumbnail()) {  
        $background_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); // получаем ссылку картинки
    // print_r($background_url);
    } else {
        $background_url[0]='';
    }
  ?>
        <div class="section" data-anchor="block<?php echo $i; ?>"style= "background-image:
            url('<?php   echo $background_url[0];    ?>')">
            <?php the_date(); ?> - выводит дату новости 
            <?php the_title(); ?> - выводит заголовок новости
            <?php the_excerpt(); ?> - выводит краткое описание 
            <?php the_post_thumbnail('thumbnail'); ?> - выводит превью новости - картинку 
            <?php //the_content(); 
            ?> 
        </div>
  <?php
}
wp_reset_postdata();  ?>
      
    </div>