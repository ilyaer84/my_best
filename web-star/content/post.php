<a href="<?php the_permalink();  // ссылка правильная
                        ?>">
                            <?php the_post_thumbnail('medium'); // вставляем миниатюры
                            ?>
                        </a>

                        <h2> <?php the_title();  ?>  </h2>
                        <!-- выведем короткое описание разными способами  -->
                            <div>
                                <?php // the_content(); по метки more - далее 
                                // the_excerpt();
                                echo get_field('intro');  // 3_2 короткое описание с помощью доп поля и плагин Advanced Custom Fields
                                ?>
                            </div>
                    <!--
                            <span> Автор: <?//=  get_the_author(); 
                            ?> </span>
                            <br>
                   
                            <span>  <?//=  get_the_date(); //   
                            //the_date(); или php echo get_the_date();
                            ?> </span>
                    -->
                        <div>
                            <?php
                                $cats = get_the_category();  // берем данных в массив
                                // print_r($cats);
                                // echo $cats[0]->name;
                               // $cat_link = get_category_link($category_id);
                            ?>
                            Категория:
                            <a href="<?php echo get_category_link($cats[0]->term_id); ?>">
                                <?php  echo $cats[0]->name; ?>
                            </a>
                        </div>

                   