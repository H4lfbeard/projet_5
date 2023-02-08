<?php

require_once 'vues/phpmailer/Exception.php';
require_once 'vues/phpmailer/PHPMailer.php';
require_once 'vues/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

   function contact() {
      require('vues/contact-vues.php');
   }

   function submitContactForm(array $input) {
      if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $message = $_POST['message'];       

         $contact = 'Nom :' . $name . "\n" . 'Adresse email :' . $email . "\n" . 'Téléphone :' . $phone . "\n" . 'Message :' . $message;

         $mail = new PHPMailer(true);

         try {
            // Configuration
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Je veux des infos de débug

            // On configue le SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = 'tomtom.humbert@gmail.com';
            $mail->Password = 'uabxnhtxcxafbucu';

            //Charset
            $mail->Charset ="utf-8";

            //Destinataire
            $mail->addAddress("tomtom.humbert@gmail.com");
            
            $mail->setFrom($email);

            // Contenu
            $mail->Body = $contact ;

            //On envoie
            $mail->send();

            header('Location: index.php?');

         }catch(Exception){
            throw new Exception("Message non envoyé. Erreur: {$mail->ErrorInfo}");
         }

     } else {
         error();
     }
   }

?>


