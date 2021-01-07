<?php

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
    
    if(isset($_POST["zakaz_zvonka"])) {
      $zakaz_zvomka = 'Форма заказа звонка';
    }
    if(isset($_POST["username"])) {
      //Если параметр есть, присваеваем ему переданое значение
      $name     =trim(strip_tags($_POST["username"]));
    }
    if(isset($_POST["usernumber"]))
    {
      $number   = trim(strip_tags($_POST["usernumber"]));
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
      mail (TO_EMAIL, $subject, $message, $headers);
     
}
/*
else
{
  header("Location: /");
  exit;
} */
?>