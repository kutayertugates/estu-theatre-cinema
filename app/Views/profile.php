<!-- profile.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $GeneralViews->head() ?>
    <link rel="stylesheet" href="/public/assets/css/index.css">	
    <title>Profilim</title>
</head>
<body>
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
							<a class="nav-link active" href="#">ANASAYFA</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">KULÜP</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Hakkımızda</a></li>
								<li><a class="dropdown-item" href="#">Vizyon ve Misyon</a></li>
								<li><a class="dropdown-item" href="/home/login">Kulüp Üyeliği</a></li>
								<li><a class="dropdown-item" href="#">İndirimli Anlaşma Noktalarımız</a></li>
								<li><a class="dropdown-item" href="#">Sponsorlarımız / Destekçilerimiz</a></li>
								<li><a class="dropdown-item" href="#">Üye Kartı</a></li>								
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">YÖNETİM</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Kulüp Danışman Hocamız</a></li>
								<li><a class="dropdown-item" href="#">Yönetim Kurulumuz 2024-2025</a></li>						
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ETKİNLİKLER</a>
						</li>
					</ul>
					<a class="navbar-brand mx-auto d-none d-md-block" href="/home">
						<img class="logo" src="/public/uploads/logo.png" alt="Logo" />
					</a>
					<ul class="navbar-nav ms-auto">
					<li class="nav-item">
							<a class="nav-link" href="#">MOVIE NIGHT KAYIT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ONLINE İŞLEMLER</a>
						</li>
						<li class="nav-item dropdown">
							<?php if (isset($_SESSION['user_id'])): ?>
								<a class="nav-link" href="/user/profile">PROFİL</a>
							<?php else: ?>
								<a class="nav-link" href="/home/login">ÜYE GİRİŞİ</a>
							<?php endif; ?>
						</li>									
					</ul>
				</div>
			</div>
		</nav>
<div class="container py-5">
    <h2 class="text-center mb-4">Hoş Geldin, <?= htmlspecialchars($_SESSION['user_name']) ?> 👋</h2>

    <div class="card shadow p-4 mx-auto" style="max-width: 500px;">
        <h4 class="mb-3">Kullanıcı Bilgileri</h4>
        <ul class="list-group">
            <li class="list-group-item"><strong>Ad Soyad:</strong> <?= htmlspecialchars($_SESSION['user_name']) ?></li>
            <li class="list-group-item"><strong>E-Posta:</strong> <?= htmlspecialchars($_SESSION['user_email']) ?></li>
        </ul>
        <div class="mt-4 text-end">
            <a href="/user/logout" class="btn btn-danger">Çıkış Yap</a>
        </div>
    </div>
</div>
<?= $GeneralViews->javascripts() ?>
</body>
</html>

