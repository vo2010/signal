<?php
			
 
			
			$server = $_SERVER['HTTP_HOST'];
			$theme = $_POST['theme'];
			$name = $_POST['name'];
			
			if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
			if (empty($phone))
			{
				echo "I can not send!";
				exit;
			}
			 
			if (isset($_POST['size'])) {$theme = '<br><strong>- </strong> '.($_POST["size"]);}
			
$success_url = './klev_upsell/index.php?name='.$_POST['name'].'&phone='.$_POST['phone'].'&product_id='.$_POST['product_id'].'&price='.$_POST['price'].'&count='.$_POST['count'].'&product_name='.$_POST['product_name'].'&utm_source='.$_POST['utm_source'].'&utm_medium='.$_POST['utm_medium'].'&utm_term='.$_POST['utm_term'].'&utm_content='.$_POST['utm_content'].'&utm_campaign='.$_POST['utm_campaign'].''; 
			
			$mail_header = "MIME-Version: 1.0\r\n";
			$mail_header.= "Content-type: text/html; charset=UTF-8\r\n";
			$mail_header.= "From: Oonies <informer@$server>\r\n";
			$mail_header.= "Reply-to: Reply to Name <reply@$server>\r\n";
			
			$to = "realshopinua@gmail.com";
			$subject = "Заявка с сайта: $server";
			
			$message = "<strong>Имя:</strong> $name<br><strong>Телефон:</strong> $phone <br> </br>$theme";
			if (mail($to,$subject,$message,$mail_header))
			header('Location: '.$success_url);
			else echo 'failed';
		?>