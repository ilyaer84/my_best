<?php
$admin_email=get_option('admin_email'); // получить опциии для sample_theme_option

wp_reset_postdata();  // при вызове с другой страницы, сброс
// echo $post->ID;
// echo get_the_title();

//$srttitle= get_the_title();;  // получаем название страницы, делаем для текущего поста, если сбросили
$url_str = get_permalink();  // получаем полный адресс страницы
//$post= get_post($post_id = 4);

?>
  
  
  <div class="containerf">
    <div class="card mx-auto mb-4 rounded-0" style="max-width: 35rem;">
      <div class="card-body position-relative">

        <!-- Форма обратной связи action="<?php //__DIR__  ?>/feedback/process/process.php" novalidate -->
        <form id="feedback-form"  enctype="multipart/form-data" >
          <div class="form-row">
            <div class="col-sm-6">

              <!-- Имя пользователя -->
              <div class="form-group">
                <label for="name" class="control-label">Имя</label>
                <input id="name" type="text" name="name" class="form-control" value="" placeholder="Имя" minlength="2"
                  maxlength="30" required="required">
           <!--       required   Устанавливает поле формы обязательным -->
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="col-sm-6">
              <!-- Email пользователя -->
              <div class="form-group">
                <label for="email" class="control-label">Email-адрес</label>
                <input id="email" type="email" name="email"  
                class="form-control" value=""
                  placeholder="Email-адрес">
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>

          <!-- Телефон пользователя -->
          <div class="form-group">
            <label for="phone" class="control-label">Телефон</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"></div>
              </div>
              <input id="phone" type="tel" name="phone" class="form-control" value="(___)___-__-__" pattern="^\(?[0-9]{3}\)?(\s+)?[0-9]{3}-?[0-9]{2}-?[0-9]{2}$">
              <div class="invalid-feedback"></div>
            </div>
          </div>

          <!-- Сообщение пользователя required="required -->
          <div class="form-group">
            <label for="message" class="control-label">Сообщение (не менее 20 символов)</label>
            <textarea id="message" name="message" class="form-control" rows="3" placeholder="Сообщение (не менее 20 символов)"
              minlength="20" maxlength="500" "></textarea>
            <div class="invalid-feedback"></div>
          </div>

          <!-- Файлы, для прикрепления к форме -->
          <div class="form-group">
            <p style="font-weight: 700; margin-bottom: 0;">Прикрепить к сообщению файлы (до <span class="countFiles">5</span>):</p>
            <p class="text-secondary">jpg, jpeg, bmp, gif, png (до 5.5 Мбайт)</p>
            <div class="attachments" data-counts="5">
              <div class="form-group">
                <div class="custom-file">
                  <input name="attachment[]" type="file" class="custom-file-input" id="validatedCustomFile" lang="ru">
                  <label class="custom-file-label" for="validatedCustomFile">Выберите файл...</label>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Капча 
          <div class="form-group captcha">
            <img class="img-captcha" src="/feedback/captcha/captcha.php" data-src="/feedback/captcha/captcha.php">
            <div class="btn btn-light position-relative refresh-captcha">Обновить</div>
            <div class="form-group">
              <label for="captcha" class="control-label">Код, показанный на изображении</label>
              <input type="text" name="captcha" maxlength="6" required="required" id="captcha" class="form-control captcha"
                placeholder="******" autocomplete="off" value="">
              <div class="invalid-feedback"></div>
            </div>
          </div>
-->
          <!-- Пользовательское солашение -->
          <div class="form-group agreement">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="agree" class="custom-control-input" id="customCheck">
              <label class="custom-control-label" for="customCheck">Нажимая кнопку, я принимаю условия <a href="#">Пользовательского
                  соглашения</a> и даю своё согласие на обработку моих персональных данных, в соответствии с
                Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных».</label>
            </div>
          </div>

          <!-- Сообщение при ошибке -->
          <div class="alert alert-danger form-error d-none">
            Исправьте данные и отправьте форму ещё раз.
          </div>

          <!-- Индикация отправки данных формы на сервер -->
          <div class="progress d-none mb-2">
            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0"
              aria-valuemin="0" aria-valuemax="100" style="width: 0">
              <span class="sr-only">0%</span>
            </div>
          </div>

          <!-- невидымые данные, от кого , с какой страницы -->
          <input type="hidden" name="emailto" class="form-control" value="<?php echo $admin_email ?>" placeholder="Кому отправить" >
                        
          <input type="hidden" name="srttitle" class="form-control" value="<?php echo $url_str ?>" placeholder="адресс страницы запроса" >                 


          
          <!-- Кнопка для отправки формы  disabled="disabled" -->
          <div class="text-right submit">
            <button type="submit" class="btn btn-primary position-relative">Отправить сообщение</button>
          </div>

        </form>

        <!-- Сообщение об успешной отправки формы -->
        <div class="form-result-success d-none text-center justify-content-center align-items-center" style="position: absolute;
        top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,.6); color: #fff; font-size: 1.25rem; z-index: 1000;">
          <div class="alert alert-success rounded-0" style="z-index: 1001;">Форма успешно отправлена. Нажмите на
            <a class="alert-link" href="#" data-reloadform="#feedback-form">ссылку</a>, чтобы отправить ещё одно
            сообщение.</div>
        </div>

    </div>
  </div>