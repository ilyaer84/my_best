<?php
// обработка только ajax запросов (при других запросах завершаем выполнение скрипта)
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    exit();
  }

// обработка данных, посланных только методом POST (при остальных методах завершаем выполнение скрипта)
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit();
  }


/* 1 ЭТАП - НАСТРОЙКА ПЕРЕМЕННЫХ */
const 
  IS_CHECK_MESSAGE  = false, // проверять сообщение 
  IS_CHECK_CAPTCHA = false, // проверять капчу
  IS_SEND_MAIL = true, // отправлять письмо получателю
  IS_SEND_MAIL_SENDER = false, // отправлять информационное письмо отправителю
  IS_WRITE_LOG = true, // записывать данные в лог
  IS_SEND_FILES_IN_BODY = true, // добавить ссылки на файлы в тело письма
  IS_SENS_FILES_AS_ATTACHMENTS = false, // необходимо ли прикреплять файлы к письму
  MAX_FILE_SIZE = 5 * 1048576, //  5* 1 МБ (в байтах) максимальный размер файла 
  ALLOWED_EXTENSIONS = array('jpg', 'jpeg', 'bmp', 'gif', 'png'), // разрешённые расширения файлов
  MAIL_SUBJECT = 'Сообщение с формы обратной связи', // тема письма
  
  MAIL_ADDRESS = 'manager@mydomain.ru', // кому необходимо отправить письмо

  MAIL_SUBJECT_CLIENT = 'Ваше сообщение доставлено'; // настройки mail для информирования пользователя о доставке сообщения
  
  $uploadPath = dirname(dirname(__FILE__)) . '/uploads/users_load/'; // директория для хранения загруженных файлов
  $mail_from = ''; // от какого email будет отправляться письмо
  $mail_from_name = 'Имя_сайта'; // от какого имени будет отправляться письмо

 // mail ($to, $zagolovok, $message,  $headers);



 // 3 ЭТАП - ОТКРЫТИЕ СЕССИИ И ИНИЦИАЛИЗАЦИЯ ПЕРЕМЕННОЙ ДЛЯ ХРАНЕНИЯ РЕЗУЛЬТАТОВ ОБРАБОТКИ ФОРМЫ
$data['result'] = 'success';

/* 4 ЭТАП - ВАЛИДАЦИЯ ДАННЫХ (ЗНАЧЕНИЙ ПОЛЕЙ ФОРМЫ) */
// проверка поля name
if (isset($_POST['name'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING); // защита от XSS
    $nameLength = mb_strlen($name, 'UTF-8');
    if ($nameLength < 2) {
      $data['name'] = 'Текст должен быть не короче 2 симв. Длина текста сейчас: '. $nameLength .' симв.';
      $data['result'] = 'error';
    } else if ($nameLength > 30) {
      $data['name'] = 'Длина текста не должна превышать 30 симв. (сейчас '. $nameLength .' симв.).';
      $data['result'] = 'error';
    }
  } else {
    $data['name'] = 'Заполните это поле.';
    $data['result'] = 'error';
  }



  // проверка поля email
  if (isset($_POST['email'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // защита от XSS
      $data['email'] = 'Адрес электронной почты не корректный';
      $data['result'] = 'error';
    } else {
      $email = $_POST['email'];
    }
  } else {
    $data['email'] = 'Заполните это поле.';
    $data['result'] = 'error';
  }



  // проверка поля phone
  if (isset($_POST['phone'])) {
    $phone = preg_replace('/\D/', '', $_POST['phone']); //получить номер телефона (цифры) из строки
    if (!preg_match('/^(\d{10})$/', $phone)) {
      $data['phone'] = 'Поле Телефон содержит не корректный номер!';
      $data['result'] = 'error';
    }
  }

  // проверка поля message  
  if (IS_CHECK_MESSAGE == true) {
  if (isset($_POST['message'])) {
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING); // защита от XSS
    $messageLength = mb_strlen($message, 'UTF-8');
    if ($messageLength < 20) {
      $data['message'] = 'Текст должен быть не короче 20 симв. Длина текста сейчас: '. $messageLength .' симв.';
      $data['result'] = 'error';
    } else if ($messageLength > 500) {
      $data['message'] = 'Длина текста не должна превышать 500 симв. (сейчас '. $messageLength .' симв.)';
      $data['result'] = 'error';
    }
  } else {
    $data['message'] = 'Заполните это поле.';
    $data['result'] = 'error';
  }
}
//  echo '<br>$data[message] = '.$data['result'];

   // проверка поля emailto переданного невидимым полем от кого отправить
  if (isset($_POST['emailto'])) {
    $mail_from = $_POST['emailto'];
  }
    // проверка поля srttitle переданного невидимым полем с какой страницы

 if (isset($_POST['url_str'])) { 
  $url_str = $_POST['url_str']; 
  }


  /* 5 ЭТАП - ПРОВЕРКА КАПЧИ */
if (IS_CHECK_CAPTCHA == true) {
    if (isset($_POST['captcha']) && isset($_SESSION['captcha'])) {
      $captcha = filter_var($_POST['captcha'], FILTER_SANITIZE_STRING); // защита от XSS
      if ($_SESSION['captcha'] != $captcha) { // проверка капчи
        $data['captcha'] = 'Код не соответствует изображению.';
        $data['result'] = 'error';
      }
    } else {
      $data['captcha'] = 'Ошибка при проверке кода.';
      $data['result'] = 'error';
    }
  }

  echo '<br>$data[captcha] = '.$data['result'];

  // 6 ЭТАП - ВАЛИДАЦИЯ ФАЙЛОВ
if (isset($_FILES['attachment'])) {
    // перебор массива $_FILES['attachment']
    foreach ($_FILES['attachment']['error'] as $key => $error) {
        // если файл был успешно загружен на сервер (ошибок не возникло), то...
        if ($error == UPLOAD_ERR_OK) {
            // получаем имя файла
            $fileName = $_FILES['attachment']['name'][$key];
            // получаем расширение файла в нижнем регистре
            $fileExtension = mb_strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            // получаем размер файла
            $fileSize = $_FILES['attachment']['size'][$key];
            // результат проверки расширения файла
            $resultCheckExtension = true;
            // проверяем расширение загруженного файла
            if (!in_array($fileExtension, ALLOWED_EXTENSIONS)) {
                $resultCheckExtension = false;
                $data['attachment'][$key] = 'Файл имеет не разрешённый тип.';
                $data['result'] = 'error';
            }
            // проверяем размер файла
            if ($resultCheckExtension && ($fileSize > MAX_FILE_SIZE)) {
                $data['attachment'][$key] = 'Размер файла превышает допустимый.';
                $data['result'] = 'error';
            }
        } else {
          $data['attachment'][$key] = 'Ошибка при загрузке файла.';
          $data['result'] = 'error';
        }
    }
    // если ошибок валидации не возникло, то...
    if ($data['result'] == 'success') {
        // переменная для хранения имён файлов
        $attachments = array();
        // перемещение файлов в директорию $uploadPath
        foreach ($_FILES['attachment']['name'] as $key => $attachment) {
            // получаем имя файла
            $fileName = basename($_FILES['attachment']['name'][$key]);
            // получаем расширение файла в нижнем регистре
            $fileExtension = mb_strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            // временное имя файла на сервере
            $fileTmp = $_FILES['attachment']['tmp_name'][$key];
            // создаём уникальное имя
            $fileNewName = uniqid('upload_', true) . '.' . $fileExtension;
            // перемещаем файл в директорию
            if (!move_uploaded_file($fileTmp, $uploadPath . $fileNewName)) {
                // ошибка при перемещении файла
                $data['attachment'][$key] = 'Ошибка при загрузке файла.';
                $data['result'] = 'error';
            } else {
                $attachments[] = $uploadPath . $fileNewName;
            }
        }
    }
  }
//  echo '<br>$data[file] = '.$data['result'];
  
/* 6 ЭТАП - ОТПРАВКА ПИСЬМА ПОЛУЧАТЕЛЮ */
if ($data['result'] == 'success' && IS_SEND_MAIL == true) {
    // получаем содержимое email шаблона
    $bodyMail = file_get_contents('email.tpl');
    // выполняем замену плейсхолдеров реальными значениями
    // str_replace — Заменяет все вхождения строки поиска на строку замены
    $bodyMail = str_replace('%email.title%', MAIL_SUBJECT, $bodyMail);
    $bodyMail = str_replace('%email.nameuser%', isset($name) ? $name : '-', $bodyMail); // isset Определяет, была ли установлена переменная значением отличным от NULL
    $bodyMail = str_replace('%email.message%', isset($message) ? $message : '-', $bodyMail);
    $bodyMail = str_replace('%email.emailuser%', isset($email) ? $email : '-', $bodyMail);
    $bodyMail = str_replace('%email.date%', date('d.m.Y H:i'), $bodyMail);
    $bodyMail = str_replace('%email.phone%', isset($phone) ? $phone : 'не указан', $bodyMail);
  
    // добавление файлов в виде ссылок
    if (IS_SEND_FILES_IN_BODY) {
      if (isset($attachments)) {
        $listFiles = '<ul>';
        foreach ($attachments as $attachment) {
            $fileHref = substr($attachment, strpos($attachment, 'feedback/uploads/'));
            $fileName = basename($fileHref);
            $listFiles .= '<li><a href="' . $startPath . $fileHref . '">' . $fileName . '</a></li>';
        }
        $listFiles .= '</ul>';
        $bodyMail = str_replace('%email.attachments%', $listFiles, $bodyMail);
      } else {
        $bodyMail = str_replace('%email.attachments%', '-', $bodyMail);
      }
    }
    // устанавливаем параметры
/*    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->IsHTML(true);
    $fromName = '=?UTF-8?B?'.base64_encode(MAIL_FROM_NAME).'?=';
    $mail->setFrom(MAIL_FROM, $fromName);
    $mail->Subject = '=?UTF-8?B?'.base64_encode(MAIL_SUBJECT).'?=';
    $mail->Body = $bodyMail;
    $mail->addAddress(MAIL_ADDRESS);
 */
      // прикрепление файлов к письму
    if (IS_SENS_FILES_AS_ATTACHMENTS) {
      if (isset($attachments)) {
        foreach ($attachments as $attachment) {
            $mail->addAttachment($attachment);
        }
      }
    }
     
    $message = "ИМЯ: ".$name."\n"."Телефон:".$phone."\n"."E-mail: ".$email."\n"."Со страницы: ".$srttitle ; //Сообщение, письмо
   
    $headers = "Content-type: text/plain; charset=utf-8 \r\n"; //Шапка сообщения, 
    mail ($mail_from, MAIL_SUBJECT, $bodyMail, $headers);
    
    // отправляем письмо
 /*   if (!$mail->send()) {
      $data['result'] = 'error';
    }
    */
  }
  