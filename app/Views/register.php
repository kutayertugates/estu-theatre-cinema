<!-- register.php -->
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
        <h2>Üye Ol</h2>
        <form action="/user/register" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Ad</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

			<div class="mb-3">
                <label for="name" class="form-label">Soyad</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-Posta</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

			<div class="mb-3">
				<label for="school_number" class="form-label">Okul Numarası</label>
				<input type="text" class="form-control" id="school_number" name="school_number" maxlength="11" pattern="^\d{11}$" required >
			</div>

            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label">Şifre Tekrar</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
            </div>

			<div class="mb-3">
                <label for="department" class="form-label">Telefon Numarası</label>
                <input type="text" class="form-control" id="number" name="number" maxlength="17" required placeholder="0 (5__) ___ __ __">
            </div>

            <div class="mb-3">
				<label for="estu_department_id" class="form-label">Departman</label>
				<select name="estu_department_id" id="estu_department_id" class="form-select" required>
					<option value="">Seçiniz</option>
					<option value="1">Bilgisayar Mühendisliği</option>
					<option value="2">Makine Mühendisliği</option>
					<option value="3">Elektrik-Elektronik</option>
				</select>
			</div>

			<div class="mb-3">
    <label for="grade" class="form-label">Akademik Ortalama (GPA)</label>
    <input type="text" class="form-control" id="grade" name="grade" required maxlength="4" placeholder="Örn: 3.15">
		</div>
            <button type="submit" class="btn btn-danger w-100">Kayıt Ol</button>
        </form>
    </div>
</div>
<?= $GeneralViews->javascripts() ?>
</body>
</html>

