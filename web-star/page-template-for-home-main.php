MAIN page-template-for-home
<?php 
/*
    Template Name: page-template-for-home-main
*/
?>
Уникальный шаблон для главно страницы
<?php get_header(); // типо include header.php 
// на эту страницу попадает когда пост точно есть
?>

<div> 
<!-- стратегия
1 получить все записи нужного типа
2 standert funv wp  || вручную
-->
    <?php /*
        $reviews = get_posts([ // get_posts - Получает записи (посты, страницы, вложения) из базы данных по указанным критериям. Можно выбрать любые посты и отсортировать их как угодно.
            'post_type' => 'review'
            // сдесь можно сформировать сколько отзывов и сортировку
        ]);
        */
        // print_r($reviews);
        // неочень  1 вариант настриаиваем все функции глобально на каждый тип записи 
        //() 'post_type' => 'review') поотдельности, и работаем этими функциями( кот a цикле the_title... )
        /*
        foreach ($reviews as $review) {
            setup_postdata($review); // Устанавливает глобальные данные поста. Нужен для удобного использования Тегов шаблона связанных с оформление поста: the_title(), the_permalink()
           the_title();
        }
        wp_reset_postdata(); // сброс, возврат на код который ниже
        */

        // 2 вариант 

   /*     foreach($reviews as $review): 
        //print_r($review); // наглядно что взять
        //echo get_field('city'); // будет искать у страницы - глобально настроеного поста
        ?>    
            <div class="user">
                <div class="user__img">
                    <?php echo get_the_post_thumbnail($review->ID, 'reviews-large'); // reviews-large - свой размер
                    // get_the_post_thumbnail('medium'); -- ищет на этой странице - на глобальной настроена
                    // настриваем на  нужную $review->ID
                    // не забываем в function edrfpfnm в типе записи 'supports' => array('title', 'thumbnail')
                    ?>
                </div>
                <div class="user__name">
                    <?php echo $review->post_title ?>
                </div>
                <div class="user__job">
                    <?php echo get_field('city', $review->ID) // укажим где искать поле city 
                    ?> 
                </div>
                <div class="user__post">
                    <?php echo get_field('text', $review->ID) // укажим где искать поле 
                    ?>
                </div>
            </div>
        <?php endforeach; ?>

</div> 
*/

// ***** 3 вариант работы с уже вытащенными даннми из  БАЗЫ *******
?> 

<div class="user-slides">				
            	<?php foreach(getReviews() as $review): ?>			
	                <div class="user">			
	                    <div class="user__img">			
	                    	<img src="<?php echo $review['img'] ?>" alt="User">		
	                    </div>			
	                    <div class="user__name">			
		                    <?php echo $review['name'] ?>		
		                </div>		
	                    <div class="user__job">			
	                    	<?php echo $review['job'] ?>		
	                	</div>		
	                    <div class="user__post">			
	                    	<?php echo $review['text'] ?>		
                        </div>		
                        <div class="user__post">			
	                    	<?php echo 'Город: '.$review['city'] ?>		
	                    </div>		
	                    <div class="user__quotes">&#8221;</div>			
	                </div>			
	            <?php endforeach; ?>			
            </div>				


<div class="content-wrapper clearfix">
            <main class="clearfix">

            <?php  the_post(); // the_post - функция которая все функции глобально перенастраивать с одного поста на другой
                 ?>                 
                     <h1> <?php the_title();  ?>  </h1>                      
               
                <div>
                    <?php the_content();  ?> 
                </div>
                
            </main>

            <?php // dynamic_sidebar(); //для вызова по ид сайдбар
                 //   get_sidebar('single');  // для вызова из фала sidebar-single.php
                ?>  
</div>

<?php get_footer(); ?>