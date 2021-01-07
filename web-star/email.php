<?php

 include_once ( __DIR__ . '/recaptchalib.php') ;

// Введите свой секретный ключ
$secret = "6LepUAEVAAAAAGT-eGQgaNIfG4EpmxkqGWTR0-SV";
//$secret = "6Ldifv4UAAAAAD802ONPJcnujSeW4wi63K9x7R6x";

// пустой ответ каптчи
$response = null;

// Для проверка вашего секретного ключа
$reCaptcha = new ReCaptcha($secret);
if ($_POST["g-recaptcha-response"]) {
$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

 // $to = "ilyaer84@ya.ru";//Почтовый ящик на который будет отправленно сообщение
  $subject = "Заказ звонка";//Тема сообщения
  $message = "Message, сообщение!";//Сообщение, письмо
  $from = "noreply@web-app-pro.ru"; // кто отправитель
  
  //$headers = "Content-type: text/plain; charset=utf-8 \r\n";//Шапка сообщения, 
  //содержит определение типа письма, от кого, и кому отправить ответ на письмо
  $headers = "Content-type: text/html; charset=\"utf-8\"\r\n";  //         
  $headers .= "From: ".$from." \r\n";  // кто отправитель
  $headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";  // дата
  $headers .= "Precedence: bulk\r\n";  // (если убрать то единичное письмо) не единичное письмо, письмо рассылка( много идентичных писем) - иначе спам


// Проверяем или метод запроса POST
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Поочередно проверяем или были переданные параметры формы, или они не пустые

  if ($response != null && $response->success) { 

    $data['result'] = 'success';

    if(isset($_POST["zakaz_zvonka"])) {
      $zakaz_zvomka = 'Форма заказа звонка';
    }
    if(isset($_POST["username"])) {
      //Если параметр есть, присваеваем ему переданое значение
      $name     =trim(strip_tags($_POST["username"]));
    } else {
      $data['username'] = 'Имя не заполнено';
      $data['result'] = 'error';
    }
    if(isset($_POST["usernumber"]))
    {
      $number   = trim(strip_tags($_POST["usernumber"]));
    } else {
      $data['usernumber'] = 'Телефон не заполнено, или заполнен не правильно!';
      $data['result'] = 'error';
    }
    if (isset( $_POST["mess"])) {       
      $mess   = trim(strip_tags($_POST["mess"]));
    }
    if (isset( $_POST["url_str"])) {
      $url_str   = trim(strip_tags($_POST["url_str"]));
    } 
    if (isset( $_POST["zakaz"])) {
      $zakaz   = trim(strip_tags($_POST["zakaz"]));
    }
    
      // Формируем письмо
      $message  = "<html>";
        $message  .= "<body>";
        $message  .= "Форма: ".$subject;        
        $message  .= "<br />";
        $message  .= "С сайта: ".$url_str;
        $message  .= "<br />";
        $message  .= "Телефон: ".$number;
        $message  .= "<br />";
        $message  .= "Имя: ".$name;
        $message  .= "<br />";
        $message  .= "Сообщение: ".$mess;
        if (!empty( $zakaz)) {
          $message  .= "<br />Заказ: ".$zakaz;
        }
        $message  .= "<br />Дата: ". date('D, d M Y h:i:s O');
        $message  .= "</body>";
      $message  .= "</html>";
      // Окончание формирования тела письма
      // Посылаем письмо
      //mail (TO_EMAIL, $subject, $message, $headers);
      $send = mail (TO_EMAIL, $subject, $message, $headers);
        if ($send == 'true') {
            echo '<p class="success">Спасибо за отправку вашего сообщения!</p>';
        } else {
          echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
        }

       } else {
      echo '<p class="success">Не пройдена каптча! Попробуйте еще раз!</p>';
    }
}


else
{
  header("Location: /");
  exit;
} 

echo json_encode($data);
?>
