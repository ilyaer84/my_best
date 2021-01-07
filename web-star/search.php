
<?php get_header(); // типо include header.php 
?>

<section>
    <div class="body_ind"> 
            <!-- <h1> <php the_title();  > </h1>  -->
            <h1> Ваш поисковы запрос: < <span class="search_span"> <?php the_search_query() ?> </span> > </h1>
            <b class="b_search">Результат поиска: </b>
            <?php if(have_posts()): // все начинается глобальной функции have_post() без аргументов
                // синтаксис : endif; тоже чтои {}
                ?> 

                 <?php while(have_posts()):  the_post(); // перебираем посты
                 ?> 
                    <article class="posyItem">
                     <?php  get_template_part('content/post', get_post_format());  //  
                        // ( расположение файла) ,
                        ?>
                    </article>
                 <?php  endwhile; ?>

            <?php else: ?>
               <span class="s_res"> По вашему запросу ничего не найдено </span>

            <?php  endif; ?>  
               
                <div class="">
                
                <?php the_posts_pagination([
                    'show_all'     => false, // показаны все страницы участвующие в пагинации
                    'end_size'     => 1,     // количество страниц на концах
                    'mid_size'     => 1,     // количество страниц вокруг текущей
                    'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    'prev_text'    => 'Назад',
                    'next_text'    => 'Вперед',
                    'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                    'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                    'screen_reader_text' => __( 'Posts navigation' ),
                ]); ?>
               
                </div>
                <?php // dynamic_sidebar(); //для вызова по ид сайдбар
                    get_sidebar();  // для вызова из фала sidebar.php
                ?>            
         </div>      
      
</section>

<?php get_footer(); ?>