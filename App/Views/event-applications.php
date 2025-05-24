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
		<title>Tüm Üyeler | Tiyatro & Sinema</title>
	</head>
	<body data-bs-theme="">
		
        <?php $BaseViews->sidebar() ?>

        <main class="content">
            <?php $BaseViews->navbar() ?>
            
			<div class="overflow-auto mx<-3">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Ad</th>
							<th scope="col">Soyad</th>
							<th scope="col">Numara</th>
							<th scope="col">Okul Numarası</th>
                            <th scope="col">Başvuru Tarihi</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($applications as $app) { ?>
						<tr class="<?= $app["status"] == 0 ? "table-danger" : ($app["status"] == 1 ? "table-success" : "table-warning") ?>">
							<th scope="row"><?= $app["id"] ?></th>
							<td><?= $app["name"] ?></td>
							<td><?= $app["surname"] ?></td>
							<td><?= $app["number"] ?></td>
							<td><?= $app["school_number"] ?></td>
							<td><?= $app["add_time"] ?></td>
							<td>
								<a href="/event/application/accept/<?= $event_id ?>/<?= $app["id"] ?>" class="btn btn-outline-primary my-1">Kabul</a>
								<a href="/event/application/unaccept/<?= $event_id ?>/<?= $app["id"] ?>" class="btn btn-outline-danger">Red</a>
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