<!doctype html>

	<html <?php language_attributes(); ?> >
	
	<head>		
		<meta charset="<?php  bloginfo('charset'); // установим кодировку
				 ?>">
		
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<!-- яндекс googl -->

		<meta name="yandex-verification" content="00d2ec17f64722d3" />

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js", "ym");

   ym(64554898, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/64554898" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

		<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168656958-1"></script>
			<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-168656958-1');
			</script>

		<!-- end  яндекс googl -->

<?php seo_er(); //title, description, robots, Keywords / Open Graph ?>
<!--
<script  src='https://www.google.com/recaptcha/api.js'></script>
-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
	<!--	<link href="css/styles.css" rel="stylesheet">
		<script type ="text/javascript" src="js/script.js"></script> -->

<?php 
		// remove basic title call
		remove_action( 'wp_head', '_wp_render_title_tag', 1 );
	//	add_action( 'wp_head', [ __CLASS__, 'render_seo_tags' ], 1 );

wp_head(); // для wordPress
 ?>
	</head>
	
	<body 
	<?php body_class();  
				do_action( 'wp_body_open' );
				?> > 
			<!-- body_class() для wordPress  чтобы подсказывал с помощью каких классов на какой
			 стринице находишся -->			
			
			<header id="header" >
				<div class="head">
				
					<div class="logo-container">
						<a class="logo" href="<?php echo home_url(); ?> "> 
						<?php  echo formatlogo(); ?>  </a>
						<a class="" href="<?php echo home_url(); ?> "> 
						<!--  <img src='<?php // echo IMG_DIR; ?>/logo.png' alt="LOGO"> -->	
						</a>
					</div>

					<div class="header_burger"> 
						<span></span>
						<!-- onClick="div_hide('vert')"
						<i class="material-icons ico_sin ico_top">assignment</i> <br>
-->
					</div>

				  <nav class="header_menu">	

					<div id="vert" > 
						<?php 	
						/*	 if( wp_is_mobile() ){ 
								wp_nav_menu([
									'theme_location' => 'top',
									'menu_class' => 'header_list',
								//	'item_wrap' => 'ul class="%2$s"><div>%3S</ul></div>',
								//	'items_wrap'     => '<ul><div id="item-id">Список: %3$s </div></ul>',
								'container' => 'div', // parent container 
								'container_id' => 'my_nav', //parent container ID
								
								'items_wrap' => '%3$s', // removes ul
									]);
							  } else {
						*/
						wp_nav_menu([
									'theme_location' => 'top',
									'menu_class' => 'header_list',
								//	'item_wrap' => 'ul class="%2$s"><div>%3S</ul></div>',
								//	'items_wrap'     => '<ul><div id="item-id">Список: %3$s </div></ul>',
								'container' => '', // parent container 
									]);
					//	}
									
						?>
					</div>	

				  </nav>

					<div class="header-tools">
					
					<?php  get_search_form() ; ?>
					</div>
				</div>				
</header>

        <button class="but__backToTop">
        <svg viewBox="0 0 8 11" class="App__backToTopIcon----3FHO" width="8" height="11">
        <path d="M0 3.99h3V11h2V3.99h3L4 0 0 3.99z"></path></svg></button>
		
<!-- Модальное окно Заказ звонка  -->
	<div id="openModal" class="modalDialog">  
		<?php get_template_part('form_zakaz_zvonka'); ?>   
	</div>

<!-- Кнопка Заказ звонка  -->
<div type="button" class="callback-bt">
	<a class="tools_button no-after" data-zakaz="" >
		<div class="text-call">		
			<i class="fa fa-phone"></i>
			<span>Заказать<br>звонок</span>		
		</div>
	</a>
</div>

	<?php // dynamic_sidebar(); //для вызова по ид сайдбар
   		get_sidebar('dialog');  // для вызова из фала sidebar-single.php
   	?>  
		
