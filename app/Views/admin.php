<!-- admin.php -->
<!DOCTYPE html>
<html lang="en">

<head>
	<?= $GeneralViews->head() ?>
	<title>Admin Paneli</title>
	<?= $GeneralViews->head() ?>
</head>

<body>
	<?= $GeneralViews->navbar() ?>
	<header class="myback py-2">
		<div class="mybackinside container-md py-2">
			<h1 class="myback text-center mb-4">Hoşgeldin, <?= htmlspecialchars($_SESSION['user_name']) ?> 👋</h1>
		</div>
	</header>
	<div class="container py-5">
		<div class="container py-5">
		</div>
		<h3 class="mb-4 text-center">Onay Bekleyen Üyeler</h3>
		<?php if (!empty($pendingUsers)) { ?>
			<?php foreach ($pendingUsers as $user) { ?>
				<div class="card mb-3">
					<div class="card-body d-flex justify-content-between align-items-center">
						<div>
							<strong><?= htmlspecialchars($user['name']) ?></strong>
						</div>
						<div>
							<button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse"
								data-bs-target="#details<?= $user['id'] ?>" aria-expanded="false"
								aria-controls="details<?= $user['id'] ?>">
								Ayrıntılar
							</button>
							<a href="/admin/approve/<?= $user['id'] ?>" class="btn btn-success btn-sm">Onayla</a>
							<a href="/admin/reject/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Reddet</a>
						</div>
					</div>

					<div class="collapse" id="details<?= $user['id'] ?>">
						<div class="card card-body">
							<p><strong>Ad Soyad:</strong> <?= htmlspecialchars($user['name']) ?></p>
							<p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
							<p><strong>Okul Numarası:</strong> <?= htmlspecialchars($user['school_number']) ?></p>
							<p><strong>Telefon:</strong> <?= htmlspecialchars($user['number']) ?></p>
							<p><strong>Departman:</strong> <?= htmlspecialchars($user['estu_department_id']) ?></p>
							<p><strong>Akademik Ortalama:</strong> <?= htmlspecialchars($user['grade']) ?></p>
							<p><strong>Tiyatroya İlgi:</strong> <?= $user['theatre_interest'] == 1 ? 'Var' : 'Yok'; ?></p>
							<p><strong>Tiyatroya İlgi:</strong> <?= $user['cinema_interest'] == 1 ? 'Var' : 'Yok'; ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } else { ?>
			<div class="alert alert-info">
				Şu anda onay bekleyen üye bulunmamaktadır.
			</div>
		<?php } ?>
	</div>
	<div class="mt-4 col-md-11 text-end">
		<a href="/user/logout" class="btn btn-danger">Çıkış Yap</a>
	</div>
	<?= $GeneralViews->javascripts() ?>
</body>
<footer><?= $GeneralViews->footer() ?></footer>

</html>