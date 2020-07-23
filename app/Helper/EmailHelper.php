<?php


namespace app\Helper;


use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

abstract class EmailHelper
{
    public static $settings = [
        'site_name' => 'blog.loc',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => '465',
        'smtp_protocol' => 'ssl',
        'smtp_login' => 'a.stanovoi170993@gmail.com',
        'smtp_password' => 'electrohouse93',
    ];


    public static function SendMail(){
        // Create the Transport
        $transport = (new Swift_SmtpTransport(self::$settings['smtp_host'], self::$settings['smtp_port'], self::$settings['smtp_protocol']))
            ->setUsername(self::$settings['smtp_login'])
            ->setPassword(self::$settings['smtp_password']);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        ob_start();
        require APP . '/views/admin/message/mail.php';
        $body = ob_get_clean();

        $message_client = (new Swift_Message("Ответ на ваше обращение №" . $_SESSION['user_message']['id']))
            ->setFrom([self::$settings['smtp_login'] => self::$settings['site_name']])
            ->setTo($_SESSION['user_message']['user_email'])
            ->setBody($body, 'text/html');

        $result = $mailer->send($message_client);
        return true;

    }

}