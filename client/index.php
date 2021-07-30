<!DOCTYPE HTML>
<?php
session_start();

if(isset($_SESSION['access'])) {
    // Nothing to do
} else {
    session_unset();
    session_destroy();
    header('location: login.php');
}

?>
<html>
	<head>
		<title>Administración | Mozo en línea</title>
		<link rel="shortcut icon" href="../img/logo.png" type="image/png" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong>Mozo en línea</strong> @<span id="username"></span></a>
									<ul class="icons">
										<li><a href="#" class="icon solid fa-list"><span class="label">Pedidos</span></a></li>
										<li><a class="icon solid fa-chevron-left"><span class="label">Configuración</span></a></li>
										<li><a href="#" class="icon solid fa-cog"><span class="label">Configuración</span></a></li>
										<li><a href="#" class="icon solid fa-user-cog"><span class="label">Configuración de cuenta</span></a></li>
										<li><a class="icon solid fa-chevron-right"><span class="label">Configuración</span></a></li>
										<li><a href="login.php?logout=true" class="icon solid fa-sign-out-alt"><span class="label">Cerrar sesión</span></a></li>
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1><span id="title"></span> <span class="btn-edit icon solid fa-edit" data-id='{"id": "#title", "function": "setTitle"}'></span></h1>
											<p><span id="idPage"></span> <span class="btn-edit icon solid fa-edit" data-id='{"id": "#idPage", "function": "setidPage"}'></span></p>
										</header>
										<hr>
										<h2>Configuración básica de colores</h2>
										<div class="row">
											<div class="col-6 col-12-xsmall">
												<div class="row inputColor">
													<div class="col-7">
														Primario
													</div>
													<div class="col-5">
														<input type="color" id="primaryColor">
													</div>
												</div>
											</div>
											<div class="col-6 col-12-xsmall">
												<div class="row inputColor">
													<div class="col-7">
														Primario [Carrito]
													</div>
													<div class="col-5">
														<input type="color" id="carritoColor">
													</div>
												</div>
											</div>
											<div class="col-6 col-12-xsmall">
												<div class="row inputColor">
													<div class="col-7">
														Letras
													</div>
													<div class="col-5">
														<input type="color" id="letrasColor">
													</div>
												</div>
											</div>
											<div class="col-6 col-12-xsmall">
												<div class="row inputColor">
													<div class="col-7">
														Letras [Contraste]
													</div>
													<div class="col-5">
														<input type="color" id="letrasColorContrast">
													</div>
												</div>
											</div>
											<div class="col-6 col-12-xsmall">
												<div class="row inputColor">
													<div class="col-7">
														Precio
													</div>
													<div class="col-5">
														<input type="color" id="priceColor">
													</div>
												</div>
											</div>
											<div class="col-6 col-12-xsmall">
												<div class="row inputColor">
													<div class="col-7">
														Precio [Carrito]
													</div>
													<div class="col-5">
														<input type="color" id="priceColorCarrito">
													</div>
												</div>
											</div>
										</div>
										<br>
										<ul class="actions">
											<li><button id="guardarGeneralConfig" class="button big">Guardar cambios</button></li>
										</ul>
									</div>
									<span class="image object" style="box-shadow: 0 0 10px grey;">
										<iframe id="pageIframe" src=""
											frameborder="0" width="100%" height="100%"></iframe>
									</span>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Configuración avanzada de colores</h2>
									</header>
									<div class="features">
										<article>
											<span class="icon fa-gem"></span>
											<div class="content">
												<h3>Portitor ullamcorper</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-paper-plane"></span>
											<div class="content">
												<h3>Sapien veroeros</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-rocket"></span>
											<div class="content">
												<h3>Quam lorem ipsum</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-signal"></span>
											<div class="content">
												<h3>Sed magna finibus</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Ipsum sed dolor</h2>
									</header>
									<div class="posts">
										<article>
											<a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
											<h3>Interdum aenean</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic02.jpg" alt="" /></a>
											<h3>Nulla amet dolore</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
											<h3>Tempus ullamcorper</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
											<h3>Sed etiam facilis</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
											<h3>Feugiat lorem aenean</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
											<h3>Amet varius aliquam</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">Lista de pedidos</a></li>
										<li>
											<span class="opener">Configuración [Colores]</span>
											<ul>
												<li><a href="#">Básica</a></li>
												<li><a href="#">Avanzada</a></li>
											</ul>
										</li>
										<li>
											<span class="opener">Configuración [Platos]</span>
											<ul>
												<li><a href="#">Ver lista</a></li>
												<li><a href="#">Agrupadores</a></li>
												<li><a href="#">Individuales</a></li>
												<li><a href="#">Feugiat Veroeros</a></li>
											</ul>
										</li>
										<li><a href="#">Maximus Erat</a></li>
										<li><a href="#">Sapien Mauris</a></li>
										<li><a href="#">Amet Lacinia</a></li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
										<li class="icon solid fa-phone">(000) 000-0000</li>
										<li class="icon solid fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery-3.6.0.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

		<!-- Personal Scripts -->
			<script src="assets/js/runFunction.js"></script>
			<script src="assets/js/runAjax.js"></script>
			<script src="assets/js/setData.js"></script>
			<script src="assets/js/getData.js"></script>
			
	</body>
</html>