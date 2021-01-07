<?php 


/*
    get_stylesheet_directory_uri() — получает URL текущей темы (дочерней, не родительской).

    get_template_directory_uri() — получает URL текущей темы (родительской, не дочерней).

    get_stylesheet_directory() — получает путь до текущей темы (дочерней, не родительской).

    get_template_directory() — получает путь до текущей темы (родительской, не дочерней).

    get_stylesheet() — получает название каталога текущей темы (дочерней, не родительской).

    get_template() — получает название каталога текущей темы (родительской, не дочерней).
    get_stylesheet_uri() — получает готовый URL на файл стилей style.css текущей темы. Если используется дочерняя тема, то получит ссылку на стили доч. темы. В этом случае для родительской темы такой функции в WordPress нет.

    */

// перевод для дочерней - своей темы
   function my_child_theme_setup() {
      load_child_theme_textdomain( 'my_child_theme', get_stylesheet_directory() . '/languages' );
   }
   add_action( 'after_setup_theme', 'my_child_theme_setup' );
//  Также, нужно создать файл перевода в дочерней теме: languages/en_US.mo.
// Теперь можно использовать функции локализации WordPress в подтеме:
// _e( 'Это нужно перевести на англ.', 'my_child_theme' );
// Так, для дочерней темы у нас будут отдельные файлы перевода, а для родительской будет использоваться родные файлы.


// Лучше подключить файлы стилей по-отдельности в HTML: сначала стили родительской темы, а затем дочерней, чтобы они были ниже в HTML коде и перебивали родительские стили. Делается это так:
   add_action('wp_enqueue_scripts', 'my_theme_styles' );
   function my_theme_styles() {
      wp_enqueue_style('parent-theme-css', get_template_directory_uri() .'/style.css' );
      // не обязательно, правильная родительская тема подключит его сама.
      wp_enqueue_style('child-theme-css', get_stylesheet_directory_uri() .'/style.css', array('parent-theme-css') );
   }

   	// отключение админ бара
add_action('show_admin_bar', '__return_false');