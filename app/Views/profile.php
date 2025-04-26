<!-- profile.php -->
<!DOCTYPE html>
<html lang="tr">

<head>
	<?= $GeneralViews->head() ?>
	<title>Profilim</title>
</head>

<body>
	<?= $GeneralViews->navbar() ?>
	<header class="myback py-2">
		<div class="mybackinside container-md py-2">
			<h1 class="myback text-center mb-4">Hoşgeldin, <?= htmlspecialchars($_SESSION['user_name']) ?> 👋</h1>
		</div>
	</header>
	<div class="container py-5">
		<div class="card shadow p-4 mx-auto" style="max-width: 500px;">
			<h4 class="mb-3">Kullanıcı Bilgileri</h4>
			<ul class="list-group">
				<li class="list-group-item"><strong>Ad Soyad:</strong> <?= htmlspecialchars($_SESSION['user_name']) ?>
				</li>
				<li class="list-group-item"><strong>E-Posta:</strong> <?= htmlspecialchars($_SESSION['user_email']) ?>
				</li>
			</ul>
			<div class="mt-4 text-end">
				<a href="/user/logout" class="btn btn-danger">Çıkış Yap</a>
			</div>
		</div>
	</div>
	<?= $GeneralViews->javascripts() ?>
</body>
<footer><?= $GeneralViews->footer() ?></footer>

</html>