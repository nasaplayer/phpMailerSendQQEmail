<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$fromAddress = 'nasaplayer@qq.com';
$password = 'qjcchssmwrhtdegc';//授权码或密码
$toAddress = '2919386060@qq.com';//收件人

$mail = new PHPMailer(true);                              //传递`true` 启用异常
try {
    //服务器设置
    $mail->SMTPDebug = 2;                                 // 启用详细的调试输出
    $mail->isSMTP();                                      // 设置mailer 使用 SMTP
    $mail->Host = 'smtp.qq.com';  // 指定主要的和备用的SMTP服务器
    $mail->SMTPAuth = true;                               // 启用SMTP认证
    $mail->Username = $fromAddress;                 // SMTP 用户名
    $mail->Password = $password;                           // SMTP 密码
    $mail->SMTPSecure = 'tls';                            // 启用TLS加密，“SSL”也被接受
    $mail->Port = 587;                                    // 连接到的TCP端口

    //收件人
    $mail->setFrom($fromAddress, '发件人名称');
    $mail->addAddress('2919386060@qq.com');     // 添加一个收件人
    //$mail->addAddress('ellen@example.com');               //第二个收件人
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com'); //抄送
    $mail->addBCC('bcc@example.com');//暗抄送

    //附件
    $mail->addAttachment('PHPMailer-master.zip');         // 添加附件
    $mail->addAttachment('qrcode.jpg', '公众号二维码.jpg');    // 重命名,注意后缀一致
    //内容
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '主题文本';
    $mail->Body    = '这是HTML信息体 <b>加粗!</b>';
    $mail->AltBody = '这是文本信息体当客户端不识别HTML时显示';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
