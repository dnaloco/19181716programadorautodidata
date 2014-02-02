<?php 
namespace Base\Helpers;

final class EmailHelper extends NotInstantiable
{
	static public function SendEmail ($_to, $_subject, $_body)
	{
		$mail = new \PHPMailer();
		$mail->IsSMTP();

		// Configuração de SMTP
		$mail->Host = "ssl://smtp.googlemail.com";
		$mail->SMTPAuth = true;
		$mail->Port = 465;
		$mail->Username = "dnaloco@gmail.com";
		$mail->Password = "artdna7";

		$mail->SetLanguage('br', 'phpmailer/language/');
		$mail->From = "dnaloco@gmail.com";

		$mail->FromName = "Programador Autodidata";

		if (is_array($_to)) {
			foreach ($_to as $email) {
				$mail->AddAddress($email);
			}
		} else {
			$mail->AddAddress($_to);
		}
		$mail->IsHTML(true);
		$mail->CharSet = 'utf-8';
		$mail->Subject = $_subject;


		$mail->Body = $_body;
		$enviado = $mail->Send();

		if ($enviado)
		    return true;
		else
		    return $mail->ErrorInfo;

	}
}