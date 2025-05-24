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
            
			<div class="overflow-auto mx-3">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Departman</th>
							<th scope="col">Ad</th>
							<th scope="col">Soyad</th>
							<th scope="col">E Posta</th>
							<th scope="col">Numara</th>
							<th scope="col">Bölüm</th>
                            <th scope="col">Sınıf</th>
                            <th scope="col">TC</th>
                            <th scope="col">Tiyatro İlgisi</th>
                            <th scope="col">Sinema İlgisi</th>
                            <th scope="col">Başvuru Tarihi</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $user) { ?>
						<tr class="<?= $user["status"] == 2 ? "table-danger" : "table-success" ?>">
							<th scope="row"><?= $user["id"] ?></th>
							<td><?= $user["unit_name"] == null ? "-" : $user["unit_name"]  ?></td>
							<td><?= $user["name"] ?></td>
							<td><?= $user["surname"] ?></td>
							<td><?= $user["email"] ?></td>
							<td><?= $user["number"] ?></td>
							<td><?= $user["faculty"] ." - ". $user["department"]  ?></td>
                            <td><?= $user["grade"] ?></td>
                            <td><?= $user["school_number"] ?></td>
                            <td><?= $user["theatre_interest"] ?> / 5</td>
                            <td><?= $user["cinema_interest"] ?> / 5</td>
                            <td><?= $GeneralModel->validTimestamp($user["send_time"]) ?></td>
							<td>
								<a href="/membership/edit/<?= $user["id"] ?>" class="btn btn-outline-primary my-1">Düzenle</a>
								<a href="/membership/delete/<?= $user["id"] ?>" class="btn btn-outline-danger">Sil</a>
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