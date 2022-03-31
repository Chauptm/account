<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mail{
        public function sendMail($email, $username, $subject, $body){
            $mail =new PHPMailer();
            $mail->isSMTP();                               
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;                               
            $mail->Username = 'minhchau737701@gmail.com';               
            $mail->Password = '737701Pc';                      
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;                                  
                    
            $mail->setFrom('minhchau737701@gmail.com', 'Sender');
            $mail->addAddress($email, $username);     
            $mail->isHTML(true);
 
            $mail->Subject = $subject;
            $mail->Body    = $body;

            if($mail->send()) {
                return true;
            } else {
                return false;
            }
        }
    }