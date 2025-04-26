<!-- login.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $GeneralViews->head() ?>
    <link rel="stylesheet" href="/public/assets/css/index.css">	
    <title>Üye Girişi</title>
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
						<a class="nav-link" href="/home">ANASAYFA</a>
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
					<li class="nav-item">
						<a class="nav-link active" href="login">ÜYE GİRİŞİ</a>
					</li>					
				</ul>
			</div>
		</div>
	</nav>

<div class="container">
    <div class="login-register-container">
        <h2>Üye Girişi</h2>
        <form action="/user/login" method="POST">
            <div class="mb-3">
                <label for="identifier" class="form-label">E-Posta veya Okul Numarası</label>
                <input type="text" class="form-control" id="identifier" name="identifier" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-danger w-100">Giriş Yap</button>
			<a href="/home/register">Üye değil misiniz? Kayıt olun.</a>
        </form>
    </div>
</div>
<?= $GeneralViews->javascripts() ?>
</body>
</html>

