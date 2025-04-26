<!-- register.php -->
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
					<input type="text" class="form-control" id="school_number" name="school_number" maxlength="11"
						pattern="^\d{11}$" required>
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
					<input type="text" class="form-control" id="number" name="number" maxlength="17" required
						placeholder="0 (5__) ___ __ __">
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
					<input type="text" class="form-control" id="grade" name="grade" required maxlength="4"
						placeholder="Örn: 3.15">
				</div>
				<button type="submit" class="btn btn-danger w-100">Kayıt Ol</button>
			</form>
		</div>
	</div>
	<?= $GeneralViews->javascripts() ?>
</body>
<footer><?= $GeneralViews->footer() ?></footer>

</html>