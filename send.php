<?php
//Принимаем постовые данные
    $otkuda=$_POST['otkuda'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];

//Тут указываем на какой ящик посылать письмо
    $to = "denis.budnik3197@gmail.com";
//Далее идет тема и само сообщение
    $subject = "Заявка с сайта";
    $message = "Письмо отправлено из моей формы<br />
    Откуда пришла заявка: ".htmlspecialchars($otkuda)."<br />
    Имя: ".htmlspecialchars($name)."<br />
    Телефон: ".htmlspecialchars($phone)."<br />
    Email: ".htmlspecialchars($email);
    $headers = "From: mysaytik.ua <no-reply@mysite.ru>\r\nContent-type: text/html; charset=utf-8 \r\n";
    mail ($to, $subject, $message, $headers);
    header('Location: thanks.html');
exit;
?>
