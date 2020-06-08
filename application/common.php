<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/********************************Email**********************************/

//邮发方法的定义
function s_mail($sendto, $title, $response) {
    //导入函数包的类class.phpmailer.php
    
    // 参数说明(发送到的邮箱地址, 邮件主题, 邮件内容, 接受方的的姓名)
    //填写要发送给管理员的邮件接受地址，请改为正确的地址
    $sendto_mail = $sendto;
    //邮件主题
    $subject = $title;
    //意见内容
    $body = $response;
    //发送邮件
 
    smtp_mail ( $sendto_mail, $subject, $body );
  }
  
  //下面定义一个发送邮件的函数,已经测试通过。
  //$sendto_email：邮件发送地址
  //$subject：邮件主题
  //$body:邮件正文内容
  //$sendto_name邮件接受方的姓名，发送方起的名字。一般可省。
  function smtp_mail($sendto_email, $subject = null, $body = null, $sendto_name = null) {
    //新建一个邮件发送类对象
    $mail = new PHPMailer ();
    // send via SMTP
    $mail->IsSMTP ();
    // SMTP 邮件服务器地址，这里需要替换为发送邮件的邮箱所在的邮件服务器地址
    $mail->Host = "smtp.qq.com";
    //邮件服务器验证开
    $mail->SMTPAuth = true;
    // SMTP服务器上此邮箱的用户名，有的只需要@前面的部分，有的需要全名。请替换为正确的邮箱用户名
    $mail->Username = "umgzs@foxmail.com";
    // SMTP服务器上该邮箱的密码，请替换为正确的密码
    $mail->Password = "";
    // SMTP服务器上发送此邮件的邮箱，请替换为正确的邮箱 ,与$mail->Username 的值是对应的。
    $mail->From = "umgzs@foxmail.com";
    // 真实发件人的姓名等信息，这里根据需要填写
    $mail->FromName = "[".date('Y-m-d H:i:s',time ())."]需求系统邮件";
    // 这里指定字符集！
    $mail->CharSet = "utf-8";
    $mail->Encoding = base64;
    // 收件人邮箱和姓名
    $mail->AddAddress ( $sendto_email, $sendto_name );
    //这一项根据需要而设
    $mail->AddReplyTo ( 'xxxx@qq.com', "admin" );
    // set word wrap
    //$mail->WordWrap = 50;
    // 附件处理
    //$mail->AddAttachment("/var/tmp/file.tar.gz");
    //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");
    // 发送 HTML邮件
    $mail->IsHTML ( false );
    // 邮件主题
    $mail->Subject = $subject;
    // 邮件内容
    $mail->Body = $body;
    $mail->AltBody = "text/html";
  
    if (! $mail->Send ()) {
      return 0;
    } else {
      return 1;
    }
  }
