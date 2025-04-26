<!-- login.php -->
<!DOCTYPE html>
<html lang="tr">

<head>
	<?= $GeneralViews->head() ?>
	<title>Üye Girişi</title>
</head>

<body>
	<?= $GeneralViews->navbar() ?>
	<div class="container">
		<div class="login-register-container">
			<h2>Üye Girişi</h2>
			<?php if (isset($_SESSION['login_error'])): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= $_SESSION['login_error'] ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<?php unset($_SESSION['login_error']); endif; ?>

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
<footer><?= $GeneralViews->footer() ?></footer>

</html>