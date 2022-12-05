<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

    

class email_model extends CI_Model
{

    public function __construct() {

        parent::__construct();
        $this->load->model('config_model');
        $this->load->model('user_model');
    
    
    }
    

    public function sendRecovery($user)
    {
        // ok
        // print_r($user);

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $this->config_model->getConfigEmail()['email_host'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->config_model->getConfigEmail()['email_user'];                     //SMTP username
            $mail->Password   = $this->config_model->getConfigEmail()['email_password'];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $this->config_model->getConfigEmail()['email_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($this->config_model->getConfigEmail()['user_email'], 'Bookify');
            $mail->addAddress($user['user_email'], $user['user_name']." ".$user['user_surname']);     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Recuperação de Senha';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if ($mail->send()) {
                return true;
                echo 'Message has been sent';
            } else {
                echo "envio falhou";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    public function welcome($user)
    {
         //Create an instance; passing `true` enables exceptions
         $mail = new PHPMailer(true);

         try {
             //Server settings
             $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
             $mail->isSMTP();                                            //Send using SMTP
             $mail->Host       = $this->config_model->getConfigEmail()['email_host'];                     //Set the SMTP server to send through
             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
             $mail->Username   = $this->config_model->getConfigEmail()['email_user'];                     //SMTP username
             $mail->Password   = $this->config_model->getConfigEmail()['email_password'];                               //SMTP password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
             $mail->Port       = $this->config_model->getConfigEmail()['email_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
             //Recipients
             $mail->setFrom($this->config_model->getConfigEmail()['user_email'], 'Bookify');
             $mail->addAddress($user['user_email'], $user['user_name']." ".$user['user_surname']);     //Add a recipient
 
 
             //Content
             $mail->isHTML(true);                                  //Set email format to HTML
             $mail->Subject = 'Bem-vindo ao Bookify';
             $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
             if ($mail->send()) {
                 return true;
                 echo 'Message has been sent';
             } else {
                 echo "envio falhou";
             }
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }

    }

    public function register($user, $payment)
    {
        // ok
         //Create an instance; passing `true` enables exceptions
         $mail = new PHPMailer(true);

         try {
             //Server settings
             $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
             $mail->isSMTP();                                            //Send using SMTP
             $mail->Host       = $this->config_model->getConfigEmail()['email_host'];                     //Set the SMTP server to send through
             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
             $mail->Username   = $this->config_model->getConfigEmail()['email_user'];                     //SMTP username
             $mail->Password   = $this->config_model->getConfigEmail()['email_password'];                               //SMTP password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
             $mail->Port       = $this->config_model->getConfigEmail()['email_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
             //Recipients
             $mail->setFrom($this->config_model->getConfigEmail()['user_email'], 'Bookify');
             $mail->addAddress($user['user_email'], $user['user_name']." ".$user['user_surname']);     //Add a recipient
 
 
             //Content
             $mail->isHTML(true);                                  //Set email format to HTML
             $mail->Subject = 'Confirmação de registro';
             $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
             if ($mail->send()) {
                 return true;
                 echo 'Message has been sent';
             } else {
                 echo "envio falhou";
             }
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }

    }
    public function canceledSubscribe($user, $plan, $cancel_request)
    {
        // ok
         //Create an instance; passing `true` enables exceptions
         $mail = new PHPMailer(true);

         try {
             //Server settings
             $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
             $mail->isSMTP();                                            //Send using SMTP
             $mail->Host       = $this->config_model->getConfigEmail()['email_host'];                     //Set the SMTP server to send through
             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
             $mail->Username   = $this->config_model->getConfigEmail()['email_user'];                     //SMTP username
             $mail->Password   = $this->config_model->getConfigEmail()['email_password'];                               //SMTP password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
             $mail->Port       = $this->config_model->getConfigEmail()['email_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
             //Recipients
             $mail->setFrom($this->config_model->getConfigEmail()['user_email'], 'Bookify');
             $mail->addAddress($user['user_email'], $user['user_name']." ".$user['user_surname']);     //Add a recipient
 
 
             //Content
             $mail->isHTML(true);                                  //Set email format to HTML
             $mail->Subject = 'Assinatura Cancelada';
             $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
             if ($mail->send()) {
                 return true;
                 echo 'Message has been sent';
             } else {
                 echo "envio falhou";
             }
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
    }

    public function paymentSuccess($user)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $this->config_model->getConfigEmail()['email_host'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->config_model->getConfigEmail()['email_user'];                     //SMTP username
            $mail->Password   = $this->config_model->getConfigEmail()['email_password'];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $this->config_model->getConfigEmail()['email_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($this->config_model->getConfigEmail()['user_email'], 'Bookify');
            $mail->addAddress($user['user_email'], $user['user_name']." ".$user['user_surname']);     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Pagamento Confirmado';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if ($mail->send()) {
                return true;
                echo 'Message has been sent';
            } else {
                echo "envio falhou";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function paymentFailed($user, $message)
    {
        // ok
         //Create an instance; passing `true` enables exceptions
         $mail = new PHPMailer(true);

         try {
             //Server settings
             $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
             $mail->isSMTP();                                            //Send using SMTP
             $mail->Host       = $this->config_model->getConfigEmail()['email_host'];                     //Set the SMTP server to send through
             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
             $mail->Username   = $this->config_model->getConfigEmail()['email_user'];                     //SMTP username
             $mail->Password   = $this->config_model->getConfigEmail()['email_password'];                               //SMTP password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
             $mail->Port       = $this->config_model->getConfigEmail()['email_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
             //Recipients
             $mail->setFrom($this->config_model->getConfigEmail()['user_email'], 'Bookify');
             $mail->addAddress($user['user_email'], $user['user_name']." ".$user['user_surname']);     //Add a recipient
 
 
             //Content
             $mail->isHTML(true);                                  //Set email format to HTML
             $mail->Subject = 'Pagamento Falhou';
             $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
             if ($mail->send()) {
                 return true;
                 echo 'Message has been sent';
             } else {
                 echo "envio falhou";
             }
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
    }
    public function newSubscription($user, $plan)
    {

         //Create an instance; passing `true` enables exceptions
         $mail = new PHPMailer(true);

         try {
             //Server settings
             $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
             $mail->isSMTP();                                            //Send using SMTP
             $mail->Host       = $this->config_model->getConfigEmail()['email_host'];                     //Set the SMTP server to send through
             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
             $mail->Username   = $this->config_model->getConfigEmail()['email_user'];                     //SMTP username
             $mail->Password   = $this->config_model->getConfigEmail()['email_password'];                               //SMTP password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
             $mail->Port       = $this->config_model->getConfigEmail()['email_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
             //Recipients
             $mail->setFrom($this->config_model->getConfigEmail()['user_email'], 'Bookify');
             $mail->addAddress($user['user_email'], $user['user_name']." ".$user['user_surname']);     //Add a recipient
 
 
             //Content
             $mail->isHTML(true);                                  //Set email format to HTML
             $mail->Subject = 'Assinatura Concluida';
             $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
             if ($mail->send()) {
                 return true;
                 echo 'Message has been sent';
             } else {
                 echo "envio falhou";
             }
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
    }
}
