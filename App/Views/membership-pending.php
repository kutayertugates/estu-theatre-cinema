<?php
    require_once __DIR__."/base.php";
    $BaseViews = new \App\Views\Base();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<?php $BaseViews->head() ?>
		
		<style>
			
			@media only screen and (min-width: 768px) {
				
			}
		</style>
		<title>Bekleyen Üyelikler | Tiyatro & Sinema</title>
	</head>
	<body data-bs-theme="">
		
        <?php $BaseViews->sidebar() ?>

        <main class="content">
            <?php $BaseViews->navbar() ?>
            
			<div class="overflow-auto mx-3">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Ad</th>
							<th scope="col">Soyad</th>
							<th scope="col">E Posta</th>
							<th scope="col">Numara</th>
							<th scope="col">Dekont</th>
							<th scope="col">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pendingUsers as $user) { ?>
						<tr>
							<th scope="row"><?= $user["id"] ?></th>
							<td><?= $user["name"] ?></td>
							<td><?= $user["surname"] ?></td>
							<td><?= $user["email"] ?></td>
							<td><?= $user["number"] ?></td>
							<td><a href="<?= $user["receipt"] ?>">Görüntüle</a></td>
							<td>
								<a href="/membership/unaccept/<?= $user["id"] ?>" class="btn btn-outline-danger">Red</a>
								<a href="/membership/accept/<?= $user["id"] ?>" class="btn btn-outline-success">Kabul</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>