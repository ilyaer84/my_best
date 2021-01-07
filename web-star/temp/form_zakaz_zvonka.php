<?php
$admin_email=get_option('admin_email'); // получить опциии для sample_theme_option

wp_reset_postdata();  // при вызове с другой страницы, сброс
// echo $post->ID;
// echo get_the_title();
//$srttitle= get_the_title();;  // делаем для текущего поста, если сбросили
$url_str = get_permalink();
//$post= get_post($post_id = 4);
if(isset($_POST["zakaz_zvonka"])) {
  include(__DIR__ . '/assets/modul/email.php'); }
      
  ?>

<div>
		<a title="Закрыть" class="close" onClick="div_hide('openModal');" >X</a>
		<p class="p_centr p_mad_title">Перезвоните мне на номер</p>  


<form id="zvonok"  class="forma_zapisi" method="POST">
    <div class="form-zvonok"> 

      <div class="d_zakaz">
          <label>Заказ <span>*</span></label>
          <input type="text" name="zakaz" readonly>  
      </div>

      <label>Имя <span>*</span></label>
      <input id="name" type="text" name="username" class="form-control" value="" placeholder="Имя" minlength="2"
                      maxlength="30" required="required">
                      
      <label>Номер телефона <span>*</span></label>
      <div class="tel7"> 
        <div class="tel7_1">+7</div>
        <div class="tel7_2">               
        <input id="phone" type="tel" name="usernumber" class="form-control" value="(___)___-__-__" pattern="^\(?[0-9]{3}\)?(\s+)?[0-9]{3}-?[0-9]{2}-?[0-9]{2}$">
        </div>
      </div>
      <label>Сообщение</label>
      <textarea id="message" name="mess" class="form-control" rows="3" placeholder="Сообщение" maxlength="500" ></textarea>

      <input type="hidden" name="emailto" class="form-control" value="<?php echo $admin_email ; ?>"  >
      <input type="hidden" name="url_str" class="form-control" value="<?php echo $url_str ; ?>"  >                 
      
      <p> Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, 
      в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных»,
       на условиях и для целей, определенных в Согласии на обработку персональных данных
      </p>

      <input class="bot-send-mail" type='submit' name='zakaz_zvonka' value='Отправить'
      onclick="ym(64554898,'reachGoal','ya_nazat_zakaz_zvonka'); return true;"      
      >

    </div>
          <!-- Кнопка для отправки формы 
          <div class="text-right submit">
            <button type="submit" class="btn btn-primary position-relative" >Послать заявку</button>
          </div>
          -->
         <!--     <img src="<?php // IMG_DIR.'/111.jpg'?>" height="50px" > -->
              <p> <?php // $descr; ?> </p>

</form>
</div>
