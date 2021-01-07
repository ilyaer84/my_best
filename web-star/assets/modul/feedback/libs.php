<?php

class Exception extends \Exception
{
    /**
     * Prettify error message output.
     *
     * @return string
     */
    public function errorMessage()
    {
        return '<strong>' . htmlspecialchars($this->getMessage()) . "</strong><br />\n";
    }
}


class Mail {
	static $subject = 'Тема письма: ';  // тема письма
	static $from = 'noreply@mydomain.ru';  // от кого можно доб в константы
	static $to = 'ilyaer84@yandex.ru'; // кому
	static $body ='Шаблонное письмо';	//текст письма
	static $headers ='';	//текст письма
	static $encoding = 'ENCODING_BASE64';
	
public function addAttachment($path, $name = '', $encoding, $type = '', $disposition = 'attachment')
{
    try {
        if (!static::isPermittedPath($path) || !@is_file($path)) {
            throw new Exception($this->lang('file_access') . $path, self::STOP_CONTINUE);
        }

        // If a MIME type is not specified, try to work it out from the file name
        if ('' == $type) {
            $type = static::filenameToType($path);
        }

        $filename = basename($path);
        if ('' == $name) {
            $name = $filename;
        }

        $this->attachment[] = [
            0 => $path,
            1 => $filename,
            2 => $name,
            3 => $encoding,
            4 => $type,
            5 => false, // isStringAttachment
            6 => $disposition,
            7 => $name,
        ];
    } catch (Exception $exc) {
        $this->setError($exc->getMessage());
        $this->edebug($exc->getMessage());
        if ($this->exceptions) {
            throw $exc;
        }

        return false;
    }

    return true;
}

	static function send() {
		
		self::$subject = '=?utf-8?b?'. base64_encode(self::$subject) .'?='; // спец для понимания кодировки в теме письма
		self::$headers = "Content-type: text/html; charset=\"utf-8\"\r\n";  // для кодировки
		
		self::$headers .= "From: ".self::$from." \r\n";  // кто отправитель
		self::$headers .= "MIME-Version: 1.0\r\n";  // тип версии пиьма
		self::$headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";  // дата
		self::$headers .= "Precedence: bulk\r\n";  // (если убрать то единичное письмо) не единичное письмо, письмо рассылка( много идентичных писем) - иначе спам
		
		return mail(self::$to, self::$subject, self::$body, self::$headers);
		//return mail(self::$to, self::$subject, self::$body);
		if(mail(self::$to, self::$subject, self::$body, self::$headers)) {
			return true;  // возращает правда
		} else {
			echo 'Письмо не дошло'; // возращает лож
		} 
	}
