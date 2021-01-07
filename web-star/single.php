single
<?php get_header(); // типо include header.php 
// на эту страницу попадает когда пост точно есть


    
if ( has_post_thumbnail()) {  
    $background_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); // получаем ссылку картинки
// print_r($background_url);
} else {
    $background_url[0]='';
}

  the_post(); // the_post - функция которая все функции глобально перенастраивать с одного поста на другой
                
?>
<div class="content-single">

<div class="title-bar  has-effect overlay-color" style= "background-image:
         url('<?php   echo $background_url[0];    ?>')">        
            <div class="titles">
                <h1 class="htitle zel2" itemprop="headline"> <?php the_title(); ?> </h1>
            </div>        
        </div>

            <main class="m_single">
            <!-- <h1> <php the_title();  > </h1>  -->
            
                     <p class="p_head"> <?php the_title();  ?>  </p>                      
               
                <div>
                    <?php the_content();  ?> 
                </div>
                
            </main>

            <?php // dynamic_sidebar(); //для вызова по ид сайдбар
                   // get_sidebar('single');  // для вызова из фала sidebar-single.php
                ?>  
</div>
<?php  comments_template(); ?>
<?php get_footer(); ?>