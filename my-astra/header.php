<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<!-- доп шапка  -->
<div class="h-top" >

   <div class="h_left" style="display: flex;">  

     <div class="h_left__1">
     
     

     <?php

// Когда у вас есть ключ, вы можете загрузить объект поля и вывести его значения
/*
$field_key = "field_5f0dd30bb217f"; // ключ
$field = get_field_object($field_key); 
// wtf($field);
// echo '<p>'.$field['label'].'</p>' ; 

if( $field ) { echo '<select id="selectItem" name="' . $field['key'] . '">'; 
   echo '<option value="vibor">Выберите город</option>';
   $i=0;
   foreach( $field['choices'] as $k => $v ) {
   ++$i;
   if( isset($_COOKIE['city']) and $_COOKIE['city'] == $v) {
      echo '<option id="' . $i . '" name="'.$k.'" selected>' . $v . '</option>'; 
      
   } else {
    echo '<option id="' . $i . '" name="'.$k.'">' . $v . '</option>';
    } 
    
   }
   echo '</select>';  
}
*/
?>
 </div> 

<script>
/*
$(document).ready(function () {

$( function() {

if (localStorage.getItem("myKey")) {
    var stored_select = localStorage.getItem("myKey");
    $('#' + stored_select).prop( "selected", true );
    $('.' + stored_select).show();
    } else {
$('.pusto').show();
}
});

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  console.log(document.cookie); // 
  location.reload();
}


$("#selectItem").change(function(){
//    $('.containerss').find('div').hide();
    var selected = $('#selectItem option:selected').attr('id');
    var name = $('#selectItem option:selected').attr('name');
    console.log('selected '+selected); //
    localStorage.setItem("myKey", selected);
    $('.' + selected).show();
    setCookie('city',name);
});

});
*/
</script>

<?php

if (isset($_COOKIE['city']) && $_COOKIE['city'] != 'undefined' ) {
 //  post_type_exists() // Проверяет зарегистрирован ли указанный тип записи.
 query_posts( array(
      'post_type'  =>  'adr_mag',
      'meta_query' => array(
        array(
          'key' 	=> 'city',
          'value' => $_COOKIE['city'] ,
     //     'compare' => 'IN',
     )
     )   
 )
);


 if(have_posts()): // все начинается глобальной функции have_post() без аргументов
                // синтаксис : endif; тоже чтои {}
	
   while(have_posts()):  the_post(); // перебираем посты 
 
      if (get_field('glav_mag') == 1) {  // проверка главный магазин ?
         $zap_glav_mag[]= get_field('tel');
      }

   endwhile; 
endif;
?>

      

<?php
 if( isset($zap_glav_mag[0])) {
 echo "<div class='h_left__1'><span class='small'>Тел.: </span>".$zap_glav_mag[0]."</div>";
 }

wp_reset_query();
}

?>


       
   </div>

   <div class="h_right">
  <?php 
  wp_nav_menu([
           'menu' => 'Верхнее',
           'menu_class' => 'header_list',
  //      	'item_wrap' => 'ul class="%2$s"><div>%3S</ul></div>',
   //        'items_wrap'     => '<ul><div id="item-id">Список: %3$s </div></ul>',

           'item_wrap' => 'ul class="%2$s"><div>%3S</ul></div>',
           'items_wrap'     => '<div class="main-navigation"> <ul id="primary-menu" class="main-header-menu ast-nav-menu ast-flex ast-justify-content-flex-end  submenu-with-border astra-menu-animation-fade ">
            %3$s </ul></div>',
           
         'container'       => 'nav',
         'container_class' => 'ast-flex-grow-1 navigation-accessibility',
//         'depth'           => 1,
           ]);

  //dynamic_sidebar('sidebar-top'); //для вызова по ид сайдбар
  //get_sidebar('top');  // для вызова из фала sidebar-single.php
  ?>
 
   </div>


</div>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>

<?php astra_body_top(); ?>
<?php wp_body_open(); ?>
<div 
	<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?></a>

	<?php astra_header_before(); ?>
   <?php // get_search_form() ; ?>
	<?php astra_header(); ?>

	<?php astra_header_after(); ?>

	<?php astra_content_before(); ?>

	<div id="content" class="site-content">

		<div class="ast-container">

		<?php astra_content_top(); ?>

      <!--  кнопка вверх  -->

      <button class="but__backToTop">
        <svg viewBox="0 0 8 11" class="App__backToTopIcon----3FHO" width="8" height="11">
        <path d="M0 3.99h3V11h2V3.99h3L4 0 0 3.99z"></path></svg></button>
