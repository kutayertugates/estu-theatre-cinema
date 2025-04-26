<?php


class GeneralViews
{

	public $db;

	function __construct($db)
	{
		$this->db = $db;
	}

	public function head()
	{
		?>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/public/assets/css/index.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
		<link
			href="https://fonts.googleapis.com/css2?family=Gidole&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
			rel="stylesheet">
		<link rel="stylesheet" href="/public/assets/css/main.css">
		<?php
	}

	public function javascripts()
	{
		?>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
			crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.13.0/beautify-html.js"></script>
		<script src="/public/assets/js/main.js"></script>
		<?php
	}
	public function footer()
	{
		?>
		<footer class="footer myback text-white mt-5 pt-4 pb-2">
			<div class="container">
				<div class="row text-center text-md-start">
					<div class="col-md-3 mb-4">
						<h5 class="fw-bold">BİZİ TAKİP EDİN</h5>
						<div class="d-flex justify-content-center justify-content-md-start gap-2 mt-2 text-md-start">
							<a href="https://www.instagram.com/estutiyatrovesinema/"><img
									src="/public/uploads/instagram-logo.png" width="32" alt="Instagram" /></a>
						</div>
					</div>
					<div class="col-md-6 mb-4 d-flex flex-column align-items-center">
						<div class="bg-secondary text-white fw-bold py-2 px-3 mb-2 ">HOSTING SPONSOR ALANI</div>
						<div>hakları saklıdır, Muhammed Salih Koç, Kutay Ertuğ Ateş, 2025 copyright</div>
					</div>
					<div class="col-md-3 mb-4 text-md-end">
						<h5 class="fw-bold">İLETİŞİM</h5>
						<p class="mb-0">tiyatrosinemakulubu@ogr.eskisehir.edu.tr</p>
						<p>Eskişehir, Türkiye</p>
					</div>

				</div>
			</div>
		</footer>
		<?php
	}
	public function navbar(): void
	{
		?>
		<nav class="navbar navbar-expand-lg sticky-top">
			<div class="container-md">
				<a class="navbar-brand d-md-none" href="#">
					<img class="logo" src="/public/uploads/logo.png" />
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MainNavbarMenu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="MainNavbarMenu">
					<ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a class="nav-link" href="/home">ANASAYFA</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/home/club">KULÜP</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" href="/home/management">YÖNETİM</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/home/events">ETKİNLİKLER</a>
						</li>
					</ul>
					<a class="navbar-brand mx-auto d-none d-md-block" href="/home">
						<img class="logo" src="/public/uploads/logo.png" alt="Logo" />
					</a>
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<a class="nav-link" href="/home/movie">MOVIE NIGHT KAYIT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/home/online">ONLINE İŞLEMLER</a>
						</li>

						<li class="nav-item dropdown">
							<?php if (isset($_SESSION['user_id'])) {
								if ($_SESSION['is_admin'] == 1) { ?>
									<a class="nav-link" href="/admin">ADMIN PANEL</a>
								<?php } else { ?>
									<a class="nav-link" href="/user/profile">PROFİL</a>
								<?php }
							} else { ?>
								<a class="nav-link" href="/home/login">ÜYE GİRİŞİ</a>
							<?php } ?>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<?php

	}

}
