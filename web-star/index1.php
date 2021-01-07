index
<?php get_header(); // типо include header.php 
?>

<div class="content-wrapper clearfix">
            <main class="clearfix">
            <!-- <h1> <php the_title();  > </h1>  -->
            
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

            <?php  endif; ?>  
               
                <div class="main-footer clearfix">
                
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
                
            </main>
                <?php // dynamic_sidebar(); //для вызова по ид сайдбар
                    get_sidebar();  // для вызова из фала sidebar.php
                ?>            
             <!--
                <div class="tw-wrapper clearfix">
                    <div class="tw-inner">
                        <div class="tw-text">
                            <span>Free Wood Design PSD Template. For more freebies and photoshop tutorials follow @webdesignfan.</span>
                        </div>
                        <div class="follow">
                            <span>Follow Us on Twitter</span>
                        </div>
                    </div>
                </div>
                <div class="secondery-navigation">
                    <h2 class="menu">Navigation</h2>
                    <ul>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Web Apps</a></li>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Print Design</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Design Partners</a></li>
                        <li><a href="#">Online Shops</a></li>
                        <li><a href="#">Online Marketing</a></li>
                    </ul>
                </div>
                <div class="contacts">
                    <h2>Contact Us</h2>
                    <ul>
                        <li>E-mail: hello@wooddesign.info</li>
                        <li>Phone: +370 6411 9028</li>
                        <li>Twitter: @wooddesigninfo</li>
                    </ul>
                </div>
            -->
        </div>


<?php get_footer(); ?>