<?php
if(!function_exists('send_mail')){
    function send_mail(array $mails,string $subject,string $message):bool{
        if(config('mail.encrypt') === 'smtp'){
            ini_set('SMTP', config('mail.smtp_domain'));
            ini_set('smtp_port', config('mail.smtp_port'));
        }
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: ".config('mail.form_name')." <".config('mail.form_address').">\r\n";

           $result = mail($mails[0], $subject, $message, $headers);
        // echo $headers;
        return $result;

    }
}
