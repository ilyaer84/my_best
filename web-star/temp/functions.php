<?php

// работа с сессиями
add_action('init', 'start_session', 1);

function start_session() {
if(!session_id()) {
session_start();
}
}
add_action('wp_logout', 'end_session');
add_action('wp_login', 'end_session');
add_action('end_session_action', 'end_session');

function end_session() {
session_destroy ();
}
// end  работа с сессиями

define('IMG_DIR', get_template_directory_uri() . '/assets/img/'); // константа глобально доступна для файлов темы
define('FEED_DIR', get_template_directory_uri() . '/feedback'); 

define('CREATED', '2020');

define('FROM_EMAIL', 'ilyaer84@ya.ru');
define('TO_EMAIL', 'ilyaer84@ya.ru');



include_once(__DIR__ . '/inc/reviews.php'); //! Под каждый тип записи можно моздавть отдельный файл где все описана целиком :регистраци и то как его получаем
// __DIR__ - работа от текущей папки functiopn подключен к к индексу <-

include_once(__DIR__ . '/inc/test-widget-recent-posts.php'); 

//include_once(__DIR__ . '/inc/seo_cod.php'); // однократного включения, заточка под seo 
//include_once(__DIR__ . '/inc/creat_tebl_seo.php'); // Создание таблицы !!! + заточка под seo в админке

include_once(__DIR__ . '/inc/feedback_my.php');

include_once(__DIR__ . '/assets/modul/seo/seo_open_graph.php');

/* это попадает в то место где прописан wp_head / паралель с джава скриптом
и именно здесь wp готов к тому что мы зарегистрировали стили, скрипты ...
add_action('wp_enqueue_scripts', function(){
    echo 'gggg dd 7';
} );

add_action - подписаться на хук
*/

// обработчик аякс запроса
add_action('wp_ajax_form_obr'       , 'func_form');
add_action('wp_ajax_nopriv_form_obr', 'func_form');

// end 

function func_form(){
	include(__DIR__ .'/assets/mytest.php');
// include(__DIR__ . '/assets/modul/process.php');   
   
}

// создаем ссылки 
function js_variables(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'), // вид ссылки window.wp_data.ajax_url
    	'is_mobile' => wp_is_mobile()
        // Тут обычно какие-то другие переменные
    );
    echo '<script type="text/javascript">window.wp_data = '.
        json_encode($variables).   ';</script>'  ;
}
add_action('wp_head','js_variables');

// end  аякс 

add_action('wp_enqueue_scripts', function(){
    //прежде пользумся ивентовой моделью
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/styles.css'); // (название , адресс) get_template_directory_uri - расположение темы 
	wp_enqueue_style('glav_style', get_template_directory_uri() . '/assets/css/glav.css');
//	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css');
	wp_enqueue_style('menu_css', get_template_directory_uri() . '/assets/css/menu.css');
	wp_enqueue_style('jet_css', get_template_directory_uri() . '/assets/css/jet.css');


		wp_deregister_script('jquery'); // прибиваем стандартный wp jquery

		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
		wp_enqueue_script('jquery_fullpage', get_template_directory_uri() . '/assets/js/jquery.fullPage.min.js');

		wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js');
		
//		wp_enqueue_script('form_sv', get_template_directory_uri() . '/feedback/js/process-forms.js');
//		wp_enqueue_script('form_sv_bootstrap', get_template_directory_uri() . '/feedback/vendors/bootstrap/js/bootstrap.bundle.min.js');

		wp_enqueue_script('feedback_script', get_template_directory_uri() . '/assets/modul/feedback/feedback_script.js');
		
//		wp_enqueue_script('my_script', get_template_directory_uri() . '/assets/js/my_script_v1.js');
		wp_enqueue_script('main_script', get_template_directory_uri() . '/assets/js/main.js');

		wp_enqueue_script('test', get_template_directory_uri() . '/assets/js/test.js');
		// для стороны клиента, для того чтобы из php в java script при загрузке странице передать данные
		// надо динамически на лету создать ассоциативный массив в php, который в java привратится в объект
/*		wp_localize_script('script', '_PHP', [  // ('script' - тк хочу чтобы вывелось перед моим скриптом с тким id 'script' -> кот выше
			// '_PHP' - название глобально переменой кот будет сделана для java 
			'ajaxUrl' => admin_url('admin-ajax.php'),  //в ключ ajaxUrl из ф-я admin-ajax - получит нужный url
		//	'aa' => '2' // aa - пример- перечисляем ключи - любые данные при загрузки страницы со стороны сервера
			'is_mobile' => wp_is_mobile(),
		]); 
*/
} );

function wtf($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}

/**** Подключение reCAPTCHA api.js */

//Подключение нового скрипта
add_action( 'wp_enqueue_scripts', 'add_recaptcha_js', 5, 1 );
function add_recaptcha_js() {
// Регистрация reCAPTHCA api.js, version - null, in footer - false
wp_register_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js?hl=ru', array(), null, false );
// Подключение reCAPTHCA api.js
wp_enqueue_script( 'recaptcha' );
}

// Добавление HTML-кода блока в коментарии
//При этом блок будет отображаться только неавторизованным пользователям.
add_action('comment_form_after_fields', "recaptchadiv");
function recaptchadiv($post_id) {
global $user_ID;
$recaptcha_site_key = '6Lfbgf4UAAAAABKqu_i8rpe-RGwynUTXwMXDy-LB';
if ($user_ID) {
return $post_id;
}
echo '<div class="g-recaptcha" data-sitekey="'.$recaptcha_site_key.'"></div>';
return $post_id;
}

//Интеграция на стороне сервера
function verify_recaptcha_response() {
    $recaptcha_secret_key = '6Lfbgf4UAAAAAIXXqJg1TscPmxCMuV-E5RbiYFw_';
    $recaptcha_site_key = '6Lfbgf4UAAAAABKqu_i8rpe-RGwynUTXwMXDy-LB';
    if ( isset ( $_POST['g-recaptcha-response'] ) ) {
    $captcha_response = $_POST['g-recaptcha-response'];
    } else {
    return false;
    }
    // Verify the captcha response from Google
    $response = wp_remote_post(
    'https://www.google.com/recaptcha/api/siteverify',
    array(
    'body' => array(
    'secret' => $recaptcha_secret_key,
    'response' => $captcha_response
    )
    )
    );
    $success = false;
    if ( $response && is_array( $response ) ) {
    $decoded_response = json_decode( $response['body'] );
    $success = $decoded_response->success;
    }
    return $success;
    }

// Функция предварительной обработки комментария
    add_action('preprocess_comment', "preprocess_comment_cb");
    function preprocess_comment_cb($commentdata) {
    global $user_ID;
    if ($user_ID) {
    return $commentdata;
    }
    if ( ! verify_recaptcha_response() ) {
    echo '<p style="font-size: 1rem;">Вы не прошли защиту от спама Google reCAPTCHA. Вернитесь на <a href="#" onclick="history.go(-1);">предыдущую страницу</a> и повторите попытку.';
    exit;
    }
    return $commentdata;
    }	
/**** end Подключение reCAPTCHA api.js */

add_action('after_setup_theme', function(){  
    register_nav_menu('top', 'Верхнее меню'); // регистрируем меню, можно несколько
    add_theme_support('post-thumbnails'); // разрешить использование миниатюр
    add_theme_support('title-tag'); 	 // работа с title и потом гдето хуками фильтрами подписываются на изменение title 
    add_theme_support('post-formats', ['aside',	'chat',	'gallery',	'image', 'link',
	'quote', 'status',	'video',	'audio']); 
	// регистрируем форматы постов, и после приминения на посте 
    // и на странице блога в индексе посты распараленены на свои типы  что позволит использовать get_template_part() 

		add_image_size('size100-100', 100, 100, false); // регистрация своего рамера!
		add_image_size('size300-200', 300, 200, false); 
		add_image_size('size600-400', 600, 400, false); 
		add_image_size('size768-512', 768, 512, false); 
		add_image_size('size1536-1024', 1536, 1024, false);  // регистрация своего рамера!
});



function extra_setup() {
	register_nav_menu ('primary mobile', __( 'Navigation Mobile'));
	}
	add_action( 'after_setup_theme', 'extra_setup' );

/***для использования пути  в js ***/
	add_action( 'wp_enqueue_scripts', 'mythemeurl', 99 );
	function mythemeurl(){
	wp_localize_script( 'jquery', 'mytheme', array( 
		//( 'jquery' Название скрипта, перед которым будут добавлены данные. Скрипт должен быть зарегистрирован заранее.
		//, 'mytheme', Название Javascript объекта, который будет содержать данные.
		'template_url' => get_template_directory_uri(), 
	) );
	}



/*
// пример обработки фильтра
add_filter( 'nav_menu_css_class', function($classes, $item, $args, $depth){
    var_dump($classes); // посмотрим набор классов
    return $classes;
}, 15, 4);  // 4 (кол-во передаваемых аргументов)- обязат, 10 - приоритет фильтра

*/
/*
	add_filter( 'nav_menu_css_class', function($classes, $item, $args, $depth){
		// print_r($classes);  print_r($item);	print_r($args);
		//$classes[] = 'menuArea_item'; // так добавили тегу li свой класс, $classes[] - добавление элемента в конец массива
 
   if($args->theme_location === 'top'){ // только в этом случае переопределим классы
    $newclasses = [
        'menuArea_item'
	];
	 // прибили все классы, остается один 'menuArea_item' или несколько перечисленных
 
        if(in_array('current_page_item', $classes)) { // проверка если есть стандарт класс wp для выделени текущего-дейчтвующего меню
            $newclasses[] = 'menuArea_item-active';
		}		
    return $newclasses;
   }   
	return $classes;	
}, 10, 4);  // 4 (кол-во передаваемых аргументов)- обязат, 10 - приоритет фильтра
*/

// 3_2 регистрация sidebar 
add_action('widgets_init', function(){  // widgets_init название хука
    register_sidebar([
		'name'          => 'Сайдбар справа',
		'id'            => 'sidebar-right',
		'description'   => 'Для главной странице блога',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<div class="menu">',
		'after_title'   => "</div>\n",
     ]);

     register_sidebar([
		'name'          => 'Сайдбар для страниц',
		'id'            => 'sidebar-single',
		'description'   => 'Боковая одной записи в блоге',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<div class="menu">',
		'after_title'   => "</div>\n",
     ]);

     register_widget('Test_Widget_Recent_Posts'); // вызов своего виджета с указание соего класса - в отдельном файле
});

//4_1 
// данный способ может вызвать проблемв с формированием title страницы( при обращении к bloginfo несколько раз на странице) 
/*
add_filter( 'bloginfo', function($output, $show){ // bloginfo- имя события за которое мы цепляемся
 // output - значение, show -  тип значения
 //  var_dump($output); // посмотрим что происходит
 //  var_dump($show); // посмотрим что происходит
    if($show == 'name'){ // для заголовка сайта
        $words =explode(' ', $output); // разбили массив на слова
        $last = count($words) - 1; // определяем индекс последнего элемента
        $words[$last] = "<span>{$words[$last]}</span>"; // последнее слово окружим тегом span
        $output = implode(' ', $words);
    }

    return $output;
}, 10, 2);  // 2 (кол-во передаваемых аргументов)- обязат, 10 - приоритет фильтра
*/

function formatLogo(){  // своя функция получает имя сайта, и форматирует
    $name = get_bloginfo('name'); // get - вызывает функцию и возвращает, потом где надо echo
    $words =explode(' ', $name); // разбили массив на слова
    $last = count($words) - 1; // определяем индекс последнего элемента
    $words[$last] = "<span>{$words[$last]}</span>"; // последнее слово окружим тегом span
    return implode(' ', $words);
}

// 4_1 свой тип записи
/* перенес в плагин
add_action('init', function(){ // в какой момент выполнять

    register_post_type('video', array( // регистрация своего типа записи
        'labels' => array(  // перечисляем надписи для шаблона
            'name'               => 'Видео',
            'singular_name'      => 'Видео',
            'add_new'            => 'Добавить видео',
            'add_new_item'       => 'Добавление видео',
            'edit_item'          => 'Редактирование видео',
            'new_item'           => 'Новое видео',
            'view_item'          => 'Смотреть видео',
            'search_items'       => 'Искать видео',
            'not_found'          => 'Не найдено',
            'not_found_in_trash' => 'Не найдено в корзине',
            'menu_name'          => 'Видео'
        ),
        'public'              => true,  // доступ на клиентской части сайта + формируется ссылка
        // формировать url адреса вида: video/[slug], у public много аргументов можно менять
        'menu_icon'           => 'dashicons-format-video',
        'supports'            => array('title'),  // какие стандартные поля будут использованы register_post_type, ('title','editor','author','thumbnail','excerpt','comments')
        'has_archive'         => true // для данного типа записи будет создана страница архива, котороя позволит отбразитьвсе посты
    ) );

});
*/



// remove_action('wp_head', 'wp_print_script'); // ?

	// отключение админ бара
add_action('show_admin_bar', '__return_false');



/* // фильтр для the_excerpt(); обрезает кол-во символов - короткое описание
add_filter( 'excerpt_length', function(){
    return 7; // возвращаем 7 символов
} );
*/

add_shortcode('test_shortcode', function($atts){
    var_dump($atts);
    return '------';
});
/*
add_shortcode('test_postsRecent', 'test_postsRecent'); // свой шорткод сделеам для вывода свежих постов
    // (название шорткода, название функциии )
	function test_postsRecent($atts){ // сюда приходит ассоциативный массив $atts
		$atts = shortcode_atts([  // мотод shortcode_atts куда может прийти пустай строка, если атрибуты не указаны
			'cnt' => 3 // обьявлены разрешенные атрибуты и дефолтные значения
		], $atts);  // ф-я от баработала  совмещает дефолтные значения и присланные, и формирует массив итоговый

		$posts = get_posts([
			'post_type'   => 'post', // вытаскивает из базы все посты
			'numberposts' => $atts['cnt'], // ограничение по кол-ву постов, cnt - прописываемв админке в  атрубутах шорт кода
			'orderby'     => 'date', // сортировка по дате
			'order'       => 'DESC', // сортировка сначла последнии
		]);
		
		$output = '<div class="widget"><div class="menu">Свежие</div><ul>'; // изначально переменная output

        //var_dump($posts); // посмотрим все данные для вывода
       
		foreach($posts as $post){
			$link = get_permalink($post->ID);  // переменная для ссылки

			$output .= "<li>
				<span>+</span>
				<a href=\"$link\">{$post->post_title}</a>
			</li>";
		}

		$output .= '</ul></div>';  // добавляем к переменной output

		return $output;
	}


    register_post_type('flats', [  // регистрируем свою запись
		'labels' => array(
			'name'               => 'Квартиры',
			'singular_name'      => 'Квартира',
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавление квартиры',
			'edit_item'          => 'Редактирование квартиры',
			'new_item'           => 'Новая квартира',
			'view_item'          => 'Смотреть квартиру',
			'search_items'       => 'Искать квартиры',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Квартиры',
		),
		'public'              => true, // доступ на клиентской части сайта + формируется ссылка
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-category', 
		'hierarchical'        => false,  //  нет родительских элементов
        'supports'            => array('title', 'editor', 'thumbnail'), // какие стандартные
        // поля будут использованы register_post_type , ('title','editor','author','thumbnail','excerpt','comments')
		'has_archive'         => true // есть архивная страница 
	]);


    // таксономии - раздылы, признаки 
	register_taxonomy('city', ['flats'], [ // имя таксономии city, ['flats'] к  какому типу поста привязываем хоть к станд post
               
        'labels' => array(  // массив
			'name'              => 'Города',
			'singular_name'     => 'Город',
			'search_items'      => 'Найти город',
			'all_items'         => 'Все города',
			'view_item '        => 'Посмотреть город',
			'edit_item'         => 'Редактировать город',
			'update_item'       => 'Обновить город',
			'add_new_item'      => 'Добавить новый город',
			'new_item_name'     => 'Добавить новый',
			'menu_name'         => 'Города',
		),
		'description'           => 'Где квартира',
		'public'              => true,
		'hierarchical'        => false // не иерархичекая таксоомия
	]);

	register_taxonomy('rooms', ['flats'], array(
		'labels'                => array(
			'name'              => 'Количество комнат',
			'singular_name'     => 'Количество комнат',
			'search_items'      => 'Количество комнат',
			'all_items'         => 'Все варианты',
			'view_item '        => 'Посмотреть к',
			'edit_item'         => 'Редактировать к',
			'update_item'       => 'Обновить к',
			'add_new_item'      => 'Добавить новый к',
			'new_item_name'     => 'Добавить новый',
			'menu_name'         => 'Количество комнат'
		),
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => false
	));
*/

	/*
	slug — по ярлыку,
	
		post_type - все записи данного типа
		post_type/post_slug - одна запись данного типа

		taxonomy_name/taxonomy_slug

		taxonomy_name - funct
		taxonomy_slug - из админки

		flats
		flats/moscow
        flats/moscow/id
        **********

        flats?city=moscow&rooms=3
        get запрос 
        на странице flats  или др
        с помощью ф-ии get_post выбирать все данные данного типа

function test_postsRecent($atts){  // пример нужное ниже
		$atts = shortcode_atts([    //
			'cnt' => 3              //
		], $atts);                  //

		$posts = get_posts([        <----------
			'post_type'   => 'post',    
			'numberposts' => $atts['cnt'],  
			'orderby'     => 'date',
            'order'       => 'DESC',
                                        <---- добавляем ключ meta_query 
		]);

	*/


// аякс запросы обращаются на адресс wp-admin.php
// название хуков wp_ajax_*  *- свое названия экшена кот хотим зарегистрировать
add_action('wp_ajax_likepost', 'ajaxLikePost'); // если оставить один этот хук когда обычный пользователь зайдет это рабоать не будет 
add_action('wp_ajax_nopriv_likepost', 'ajaxLikePost');  // если оставить один этот хук то когда мы авторизованы то работать не будет

//*** обработчик аякс запроса*** 
	function ajaxLikePost(){
		$id = (int)$_POST['id']; // параметр который передали, тут через java 

// до проверки к тому ли передаем типу записи или на существование
// также в сесию пользователя добавить что уже лайкнул, и если в сессии есть отметка, то кнопку не показваем
		$likes_fl = (int)get_field('likes_fl', $id); // получаем кол-во лайков из базы
		$likes_fl++;

		update_field('likes_fl', $likes_fl, $id); // ф-я плагина обновить данные (для поля, новое значение, сделать для id поста кот пришел)

		echo $likes_fl;
		wp_die();  // wp отрубись - чтобы больше ничего не выводил после echo? кот выше
	}

