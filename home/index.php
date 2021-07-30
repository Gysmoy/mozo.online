<?php
switch($_SERVER['PHP_SELF']){
	case '/home/index.php':
		$url = array('../', '');
		break;
	case '/index.php':
		$url = array('', 'home/');
		break;
	default:
		header('location: /');
		break;
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Mozo en línea</title>
	<link rel="shortcut icon" href="<?php echo $url[1];?>images/pic05.jpg" type="image/png" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo $url[1];?>assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="<?php echo $url[1];?>assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<header id="header">
		<div class="content">
			<h1><a href="/">Mozo en línea</a></h1>
			<p>Una manera simple de ofrecer tus manjares<br />
				por internet. Desarrollado por: <br />
				<a href="http://gysmoy.epizy.com">Gysmoy & Kizzi</a>
			</p>
			<ul class="actions">
				<li><a href="<?php echo $url[0];?>client/login.php" class="button primary icon solid fa-user">Área de cliente</a></li>
				<li><a href="#one" class="button icon solid fa-chevron-down scrolly">Seguir leyendo</a></li>
			</ul>
		</div>
		<div class="image phone">
			<div class="inner"><img src="<?php echo $url[1];?>images/screenshot.jpg" alt="" /></div>
		</div>
	</header>

	<section id="one" class="wrapper style2 special">
		<header class="major">
			<h2>Te presentamos el proyecto Mozo<br />
				en línea, con el fin de facilitar<br />
				la venta de comida en los restaurantes</h2>
		</header>
		<ul class="icons major">
			<li><span class="icon solid fa-camera-retro"><span class="label">Shoot</span></span></li>
			<li><span class="icon solid fa-sync"><span class="label">Process</span></span></li>
			<li><span class="icon solid fa-cloud"><span class="label">Upload</span></span></li>
		</ul>
	</section>

	<section id="two" class="wrapper">
		<div class="inner alt">
			<section class="spotlight">
				<div class="image"><img src="<?php echo $url[1];?>images/pic01.jpg" alt="" /></div>
				<div class="content">
					<h3>Magna sed ultrices</h3>
					<p>Morbi mattis ornare ornare. Duis quam turpis, gravida at leo elementum elit fusce accumsan dui
						libero, quis vehicula lectus ultricies eu. In convallis amet leo non sapien iaculis efficitur
						consequat lorem ipsum.</p>
				</div>
			</section>
			<section class="spotlight">
				<div class="image"><img src="<?php echo $url[1];?>images/pic02.jpg" alt="" /></div>
				<div class="content">
					<h3>Ultrices nullam aliquam</h3>
					<p>Morbi mattis ornare ornare. Duis quam turpis, gravida at leo elementum elit fusce accumsan dui
						libero, quis vehicula lectus ultricies eu. In convallis amet leo non sapien iaculis efficitur
						consequat lorem ipsum.</p>
				</div>
			</section>
			<section class="spotlight">
				<div class="image"><img src="<?php echo $url[1];?>images/pic03.jpg" alt="" /></div>
				<div class="content">
					<h3>Aliquam sed magna</h3>
					<p>Morbi mattis ornare ornare. Duis quam turpis, gravida at leo elementum elit fusce accumsan dui
						libero, quis vehicula lectus ultricies eu. In convallis amet leo non sapien iaculis efficitur
						consequat lorem ipsum.</p>
				</div>
			</section>
			<section class="special">
				<ul class="icons labeled">
					<li><span class="icon solid fa-camera-retro"><span class="label">Ipsum lorem accumsan</span></span>
					</li>
					<li><span class="icon solid fa-sync"><span class="label">Sed vehicula elementum</span></span></li>
					<li><span class="icon solid fa-cloud"><span class="label">Elit fusce consequat</span></span></li>
					<li><span class="icon solid fa-code"><span class="label">Lorem nullam tempus</span></span></li>
					<li><span class="icon solid fa-desktop"><span class="label">Adipiscing amet sapien</span></span>
					</li>
				</ul>
			</section>
		</div>
	</section>

	<section id="three" class="wrapper style2 special">
		<header class="major">
			<h2>Crea una cuenta ahora</h2>
			<p>Empieza a incrementar tus ganancias con nuestro sistema de pedidos<br />
				en línea. Ya no necesitaras de alguién quien muestre la carta, hazlo<br />
				ya con Mozo en línea.</p>
		</header>
		<ul class="actions special">
			<li><a href="<?php echo $url[0];?>client/login.php" class="button primary icon solid fa-user">Área de cliente</a></li>
			<li><a href="<?php echo $url[0];?>client/signup.php" class="button icon solid fa-plus">Crear una cuenta</a></li>
		</ul>
	</section>

	<footer id="footer">
		<ul class="icons">
			<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
			<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
		</ul>
		<p class="copyright">Copyright &copy; Mozo en línea | Version 1.0.0 | Powered by <a href="http://gysmoy.epizy.com">Gysmoy & Kizzi</a></p>
	</footer>

	<script src="<?php echo $url[1];?>assets/js/jquery.min.js"></script>
	<script src="<?php echo $url[1];?>assets/js/jquery.scrolly.min.js"></script>
	<script src="<?php echo $url[1];?>assets/js/browser.min.js"></script>
	<script src="<?php echo $url[1];?>assets/js/breakpoints.min.js"></script>
	<script src="<?php echo $url[1];?>assets/js/util.js"></script>
	<script src="<?php echo $url[1];?>assets/js/main.js"></script>

</body>

</html>