<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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
<<<<<<< HEAD
function send_mail($sendto, $title, $response) {
  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions 
  try { 
      //服务器配置 
      $mail->CharSet ="UTF-8";                     //设定邮件编码 
      $mail->SMTPDebug = 0;                        // 调试模式输出 
      $mail->isSMTP();                             // 使用SMTP 
      $mail->Host = 'smtp.qq.com';                // SMTP服务器 
      $mail->SMTPAuth = true;                      // 允许 SMTP 认证 
      $mail->Username = 'umgzs@foxmail.com';      // SMTP 用户名  即邮箱的用户名 
      $mail->Password = 'kwvvsbfasscbbfea';                        // SMTP 密码  部分邮箱是授权码(例如163邮箱，不明白看下面有说明) 
      $mail->SMTPSecure = 'ssl';                   // 允许 TLS 或者ssl协议 
      $mail->Port = 465;                           // 服务器端口 25 或者465 具体要看邮箱服务器支持 

      $mail->setFrom('umgzs@foxmail.com', 'UMWEB');  //发件人 
      $mail->addAddress($sendto, 'User');  // 收件人 
      //$mail->addAddress('ellen@example.com');  // 可添加多个收件人 
      $mail->addReplyTo('umgzs@foxmail.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致 
      //$mail->addCC('cc@example.com');                    //抄送 
      //$mail->addBCC('bcc@example.com');                    //密送 

      //发送附件 
      // $mail->addAttachment('../xy.zip');         // 添加附件 
      // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名 

      //Content 
      $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容 
      $mail->Subject = $title; 
      $mail->Body    = $response; 
      $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容'; 

      $mail->send(); 
      echo '邮件发送成功'; 
  } catch (Exception $e) { 
      echo '邮件发送失败: ', $mail->ErrorInfo; 
}
}
=======
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
>>>>>>> b98ef94694c70e998f6f579e1a734d03503625db
