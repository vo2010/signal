<?php
			
			$success_url = './success';
			
			$server = $_SERVER['HTTP_HOST'];
			$theme = $_GET['theme'];
			$name = $_GET['name'];
			if (isset($_GET['phone'])) {$phone = $_GET['phone'];}
			if (empty($phone))
			{
				echo "I can not send!";
				exit;
			}
			
			
			
			$mail_header = "MIME-Version: 1.0\r\n";
			$mail_header.= "Content-type: text/html; charset=UTF-8\r\n";
			$mail_header.= "From: Oonies <informer@$server>\r\n";
			$mail_header.= "Reply-to: Reply to Name <reply@$server>\r\n";
			
			$to = "realshopinua@gmail.com";
			$subject = "Upsell с сайта: $server";
			
			$message = "<strong>Имя:</strong> $name<br><strong>Телефон:</strong> $phone<br><strong>Товар:</strong> $theme ";
			if (mail($to,$subject,$message,$mail_header))
			echo '';
			else echo 'failed';
		?>