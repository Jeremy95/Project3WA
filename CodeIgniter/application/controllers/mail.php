<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller
{


    public function send()
    {
        require "application/vendor/autoload.php";

        $subject = "coucou";
        $body = "Ceci est le corps du mail.";

        $message = new Swift_Message($subject);
        $message->setFrom("jerem.b95@gmail.com");
        $message->setTo("jerem.b95@gmail.com");

        $transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
        $transport->setUsername("jerem.b95@gmail.com");
        $transport->setPassword("Ae4fmBOtVDvrSi7Dt9uUww");

        $swift = Swift_Mailer::newInstance($transport);
        $swift->send($message);


        $worked = $swift->send($message, $errors);

        if ($worked)
        {
            echo "ok ! :-)";
        }
        else
        {
            echo "ko :-(";
        }

        var_dump($errors);
    }
}