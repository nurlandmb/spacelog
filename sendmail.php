<?php
    require('phpmailer/PHPMailerAutoload.php');


    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);

    if($name && $phone){
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'space.log@mail.ru';                 // SMTP username
        $mail->Password = 'Q3wkrsndM2gHv5pB1xAy';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('space.log@mail.ru');
        $mail->addAddress('office@spacelog.kz');     // Add a recipient
        // $mail->addAddress('info@spacelog.kz');     // Add a recipient
        $mail->addReplyTo($email, $name);
        $mail->addBcc($email);
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'Новая заявка на сайте SPACELOG';
        $mail->Body    = 'Имя: ' . $name . ' <br />Его номер: ' . $phone;
        $mail->CharSet = "UTF-8";
        if(!$mail->send()) {
            echo json_encode('Error');
        } else {
            $isSuccess = true;
            $msg = 'Успех';
        }
    }
    $data = array(
        'isSuccess' => $isSuccess,
        'msg' => $msg
    );

    echo json_encode('Success');
?>
