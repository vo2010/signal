<?php
			
			$success_url = './success';
			
			$server = $_SERVER['HTTP_HOST'];
			$name = $_POST['name'];
			
			if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
			if (empty($phone))
			{
				echo "I can not send!";
				exit;
			}
			
			if (isset($_POST['theme'])) {$theme = '<br><strong>-</strong> '.($_POST["theme"]);}
			
			//$utm = $_SERVER['HTTP_REFERER'];
			//$ip = $_SERVER['REMOTE_ADDR'];
			//$success_url = './upsell/index.php?name='.$_POST['name'].'&phone='.$_POST['phone'].''; 
			//<br> <strong>UTM:</strong> $utm 
			//IP-адрес посетителя: '.@$_SERVER['REMOTE_ADDR'].'
//Время заказа: '.date("Y-m-d H:i:s").'
//$mess .= '<b>Заявка пришла со страницы:</b> ' . $_SERVER["HTTP_REFERER"];
			
			$mail_header = "MIME-Version: 1.0\r\n";
			$mail_header.= "Content-type: text/html; charset=UTF-8\r\n";
			$mail_header.= "From: $server <informer@$server>\r\n";
			$mail_header.= "Reply-to: Reply to Name <reply@$server>\r\n";
			
			$to = "wmt.lawrenyuk@yandex.ru";
			$subject = "Заявка с сайта: $server";
			
			$message = "<strong>Имя:</strong> $name<br><strong>Телефон:</strong> $phone  $theme ";
			if (mail($to,$subject,$message,$mail_header))
			header('Location: '.$success_url);
			else echo 'failed';
		?>