<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

?>

<?php astra_entry_before(); ?>

	<?php // astra_entry_top(); ?>

   <?php 



// соберем все метаполя в объект $meta
$meta = new stdClass;
foreach( (array) get_post_meta( $post->ID ) as $k => $v ) $meta->$k = $v[0];

// Теперь, допустим у записи есть метаполе 'city'
// Получаем его так:
//echo $meta->city;


if( isset($meta->city) && $meta->city == $_COOKIE['city']) {

 //  echo 'echo $meta->city; = '.$meta->city;
 ?>

 <article 
    <?php
       echo astra_attr(
          'article-blog',
          array(
             'id'    => 'post-' . get_the_id(),
             'class' => join( ' ', get_post_class() ),
          )
       );		?>
       >
       <?php
  astra_entry_top();

 astra_entry_content_blog(); ?>

<?php
}
if( !isset($meta->city) || $meta->city == "") {
   ?>

<article 
	<?php
		echo astra_attr(
			'article-blog',
			array(
				'id'    => 'post-' . get_the_id(),
				'class' => join( ' ', get_post_class() ),
			)
		);	?>
      >
      <?php
	
  astra_entry_top();

   astra_entry_content_blog(); 

}

 //  astra_entry_content_blog(); ?>

	<?php astra_entry_bottom(); ?>

</article><!-- #post-## -->

<?php astra_entry_after(); ?>







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

    ////////////////////////////

    <div class="accordion" style="margin-top: 100px">

<select id="selectItem2">
<option id="no_vibor">Выберите город</option>

<?php  
			$i=0;
			// вытаскиваем все рубрики в массив $categories, описание параметров функции смотрите чуть ниже
 $cyti = get_terms('cyti', 'orderby=name&hide_empty=0');
 $count = count($cyti);	

//		echo 'count = '.$count;	
//   wtf($cyti);	
		
      if($cyti){ 
		
         // обращаемся к каждому объекту массива (в данном случае рубрика)
         foreach ($cyti as $cat) {
             ++$i; 
            // выводим элемент списка, где атрибут value равен ID рубрики, а $cat->name - название рубрики
            if($cat->parent == 0) {

            // print_r( $cyti );               
               echo "<option id='".$cat->slug."'>".$cat->name."</option>";
         //      ' <p>'.$cat->name.'</p>    
        //       <p>'.$cat->slug.'</p>  ';
              
            // echo "<option value='{$cat->term_id}'>{$cat->name}'parent= '{$cat->parent}</option>";
               
      //!!  еще вариант вывести только подкатегории if( $cat->parent )
            }
         }
      }
?>
</select>

<style>.containerss div {display: none;}</style>


<div class="containerss1">

<?php  
			// вытаскиваем все рубрики в массив $categories, описание параметров функции смотрите чуть ниже
 $cyti = get_terms('cyti', 'orderby=name&hide_empty=0');
      if($cyti){ 		
         // обращаемся к каждому объекту массива (в данном случае рубрика)
         foreach ($cyti as $cat) {
             ++$i; 
            // выводим элемент списка, где атрибут value равен ID рубрики, а $cat->name - название рубрики
            if($cat->parent == 0) {                    
               echo "<div class='".$cat->slug."'><span class='small'>Тел.:</span> НОМЕР ТЕЛЕФОНА<br><span class='small'>Email:</span> </div>";

            }
         }
      }
?>

</div>
<script type="text/javascript">
<!--
/*
$( function() {

if (localStorage.getItem("myKey")) {
    var stored_select = localStorage.getItem("myKey");
    $('#' + stored_select).prop( "selected", true );
    $('.' + stored_select).show();
    } else {
$('.chelyabinsk').show();
}
});

$("#selectItem").change(function(){
    $('.containerss').find('div').hide();
    var selected = $('#selectItem option:selected').attr('id');
    localStorage.setItem("myKey", selected);
    $('.' + selected).show();
});  
-->
*/
</script>

////////////////////////