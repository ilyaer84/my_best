        <footer>

        <div class="fot_top">
            <p class="">
            <span>©&nbsp;</span><span class="copyright-year">
                <?php
                if (date("Y") > CREATED) {
                    echo CREATED.' - '.date("Y");
                } else {
                    echo CREATED;
                }        
                ?>      
            </span><span>.&nbsp;</span><span style="color:red">ER</span><span>.&nbsp;</span><span>All Rights Reserved</span></p>
            <a href="https://www.hostland.ru/order/hosting/?r=31c497a2"  target="_blank">Заказать хостинг</a>
       
        </div>

            <div class="footer-cont">


                <div class="footer-cont_h">
                 <p class="p_centr"> Контакты: </p>
                

                <div class="footer-cont_2">
                
                <div class="f_cont_2l">
                <p> Социальные сети: </p>
                    <a href="https://vk.com/frilance77" target="_blank" rel="nofollow"
                     class="icon-fot">
                        <img class="icon-fot" src= '' data-src="<?php echo IMG_DIR; ?>vk-icon-clipart.png" alt="vkontakte">
                        <span>vk</span>
                    </a>
                <br>
                    <a href="https://www.instagram.com/frilance77/" target="_blank" rel="nofollow" class="icon-fot">
                        <img class="icon-fot  icon-fot2" src= '' data-src="<?php echo IMG_DIR; ?>instagram-icone.png" alt="instagram">
                        <span>Instagram</span>
                    </a> 
                    </div>
                    <div class="f_centr">
                    <p>Телефон (Viber, Telegram) :</p>
                <br>
                <img class="icon-fot" src= '' data-src="<?php echo IMG_DIR; ?>Phone.png"  alt="Phone">
                <br>
                <img class="my-tel" src= '' data-src="<?php echo IMG_DIR; ?>my_tel_ser.png" alt="tel">
                
                </div>
                    </div>

                </div>


                <div class="f_r">
                    <img src= '' class="icon-pis" data-src="<?php echo IMG_DIR; ?>pis.png">
                </div>

            </div>
 

        </footer>
    
<script src='<? echo get_template_directory_uri() .'/assets/js/lazy_load.js' ; ?>' >

</script>

</body>

</html>