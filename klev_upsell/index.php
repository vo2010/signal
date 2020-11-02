<?php
//***************** Страница с завершением заказа ******************
session_start();
// формируем массив с товарами в заказе (если товар один - оставляйте только первый элемент массива)
$products_list = array(
    1 => array(
            'product_id' => $_GET['product_id'],    //код товара (из каталога CRM)
            'price'      => $_GET['price'], //цена товара 1
            'count'      => $_GET['count']                      //количество товара 1
    )
);
$products = urlencode(serialize($products_list));
$sender = urlencode(serialize($_SERVER));
// параметры запроса
$data = array(
    'key'             => '8af07b7b363ed146b12bd51b6314db37', //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => 'UA',                      // Географическое направление заказа
    'office'          => 'отдел',                   // Офис (id в CRM)
    'products'        => $products,                 // массив с товарами в заказе
    'bayer_name'      => $_GET['name'],             // покупатель (Ф.И.О)
    'phone'           => $_GET['phone'],           // телефон
    'email'           => $_GET['email'],           // электронка
    'comment'         => $_GET['product_name'],    // комментарий
    'site'            => $_SERVER['SERVER_NAME'],  // сайт отправляющий запрос
    'ip'              => $_SERVER['REMOTE_ADDR'],  // IP адрес покупателя
    'delivery'        => $_GET['delivery'],        // способ доставки (id в CRM)
    'delivery_adress' => $_GET['delivery_adress'], // адрес доставки
    'payment'         => 'способ оплаты',          // вариант оплаты (id в CRM)
    'sender'          => $sender,
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'] // utm_campaign
);

// запрос
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://vo2010.lp-crm.biz/api/addNewOrder.html');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);
//$out – ответ сервера в формате JSON
?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

    <title>Спецпредложение от нашего интернет-магазина, товары по супер цене! Скидки до 80%.</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">



    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery.placeholder.js"></script>
    <script type="text/javascript" src="init.js"></script>
    <script>
        var comments = JSON.parse('[]');
        var openedComments = 0;
    </script>

<link media="all" href="index.css" type="text/css" rel="stylesheet">
<style>
	.man .added {
  background: #999 none repeat scroll 0 0;
  border: 0 none;
  text-shadow: none;
}
</style>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-181033782-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-181033782-1');
</script>

</head>
<body class="man">


<div class="section block-1">
    <div class="wrap">
        <img src="call-girl.png" alt="">

        <div class="top-title">
            <h2>Спасибо, Ваш заказ принят!</h2>

            <div>Наш оператор свяжется с вами в течение в ближайшее время</div>
            <p>Артём Андреевич, старший менеджер отдела продаж</p>
        </div>
    </div>
</div>
<div class="section block-2">
    <div class="wrap">
        <h1>Для всех новых клиентов у нас есть эксклюзивные предложения!</h1>

        <p>Вы можете добавить эти товары с супер-скидками к&nbsp;заказу&nbsp;прямо&nbsp;сейчас:</p>
    </div>
</div>

<div class="section block-3">
    <div class="wrap">
                    <div class="tov-item tov-rate-2 clearfix"> <!--rating 4,5-->
                <span class="tov-item-sale">-60%</span>

                <div class="tov-left-cont">
                    <div class="tov-gal clearfix">
                        <div class="tov-gal-big">
                            <img src="011.jpg" class="image0" alt="">
                        </div>
                          <div class="tov-gal-list">

                         <span class="active animate" data-target=".image0"><img src="011.jpg" alt=""></span>
                         <span class="active animate" data-target=".image0"><img src="012.jpg" alt=""></span>



                                                    </div>
                    </div>
                    <ul class="tov-adv clearfix">
                        <li class="hint hint--top  hint--info" data-hint="Гарантия возврата 14 дней"></li>
                        <li class="hint hint--top  hint--info" data-hint="Доставка в течение 1-2 рабочих дней"></li>
                        <li class="hint hint--top  hint--info" data-hint="Оплата товара при получении"></li>
                    </ul>
					<br>
					<iframe width="100%" height="230" src="https://www.youtube.com/embed/PuOu-wrMHMM" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="tov-info">
                    <h3>Smart-watch V8 + Powerbank и наушники в подарок </h3>

                    <div class="tov-info-rate"></div>
                    <div class="tov-info-cost">
                        <span class="old-cost">874                         <small>грн</small></span>
                        <span class="new-cost">399                         <small>грн</small></span>
                    </div>
                    <p class="tov-info-text">
				Smart Watch - это качественные умные часы с цветным дисплеем по низкой цене. Внешне они выглядят очень стильно и дорого, имеют функции, аналогичные дорогим часам, но при этом Smart Watch имеют разумную цену! Наши часы совместимы со всеми смартфонами, имеющими Bluetooth модуль для подключения.
				<p><br>Функции:</br> интернет, будильник, браузер, калькулятор, календарь, уведомления, контакты, шагомер, контроль сна и др. </p>



</p>



<center><a class="tov-button animate"  href="../success/index.php?name=<?php echo $name = $_GET['name']; ?>&phone=<?php echo $phone = $_GET['phone']; ?>&product_id=39&price=399&count=1" target="_blank" >Добавить к заказу</a></center>






					<center>
<div style="color: #000; font-size: 18px; margin-bottom: 8px;"> До конца акции осталось:</div>
<script src="http://megatimer.ru/s/8e536b7e4d0369a4ccb749266904795c.js"></script>
</center>
                </div>
            </div>



					  <div class="tov-item tov-rate-2 clearfix"> <!--rating 4,5-->
                <span class="tov-item-sale">-60%</span>

                <div class="tov-left-cont">
                    <div class="tov-gal clearfix">
                        <div class="tov-gal-big">
                            <img src="01.jpg" class="image1" alt="">
                        </div>
                          <div class="tov-gal-list">

                         <span class="active animate" data-target=".image1"><img src="01.jpg" alt=""></span>
                            <span class="active animate" data-target=".image1"><img src="02.jpg" alt=""></span>

                                                    </div>
                    </div>
                    <ul class="tov-adv clearfix">
                        <li class="hint hint--top  hint--info" data-hint="Гарантия возврата 14 дней"></li>
                        <li class="hint hint--top  hint--info" data-hint="Доставка в течение 1-2 рабочих дней"></li>
                        <li class="hint hint--top  hint--info" data-hint="Оплата товара при получении"></li>
                    </ul>
					<br>

                </div>
                <div class="tov-info">
                    <h3>Набор из 9 мужских носков Tommy Hilfiger</h3>

                    <div class="tov-info-rate"></div>
                    <div class="tov-info-cost">
                        <span class="old-cost">469                         <small>грн</small></span>
                        <span class="new-cost">219                       <small>грн</small></span>
                    </div>
                    <p class="tov-info-text">
Мужские носки Tommy Hilfiger – это практичные удобные изделия, которые обеспечивают состояние уюта на протяжении всего дня, а также помогают создать безупречный имидж.

</p>
                    <center><a class="tov-button animate" href="../success/index.php?name=<?php echo $name = $_GET['name']; ?>&phone=<?php echo $phone = $_GET['phone']; ?>&product_id=29&price=219&count=1" target="_blank" >Добавить к заказу</a></center>
					<center>
<div style="color: #000; font-size: 18px; margin-bottom: 8px;"> До конца акции осталось:</div>
<script src="http://megatimer.ru/s/8e536b7e4d0369a4ccb749266904795c.js"></script>
</center>
                </div>
            </div>



			<center><a href="../" target="_blank">На главную</a></center>


    </div>
</div>

<div class="section footer">

</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js", "ym");

   ym(52045404, "init", {
        id:52045404,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/52045404" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>