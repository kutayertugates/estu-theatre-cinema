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
		<link rel="stylesheet" href="/assets/css/pages/period-start.css">

		<title>Departmanlar | Tiyatro & Sinema</title>
	</head>
	<body data-bs-theme="">
		
        <?php $BaseViews->sidebar() ?>

        <main class="content">
            <?php $BaseViews->navbar() ?>
            
            <div class="overflow-auto mx<-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Departman Adı</th>
                            <th scope="col">Departman Açıklaması</th>
                            <th scope="col">Baş Görevli</th>
                            <th scope="col">Yardımcı Görevli</th>
                            <th scope="col">Eklenme Tarihi</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($units)) {
                                foreach ($units as $unit) {
                        ?>
                                    <td scope="row"><?= $unit["name"] ?></td>
                                    <td><?= $unit["description"] ?></td>
                                    <td>
                                        <a href="/membership/edit/<?= $unit["attendant_id"] ?>">
                                            <?= $unit["attendant_name"] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/membership/edit/<?= $unit["vice_attendant_id"] ?>">
                                            <?= $unit["vice_attendant_name"] ?>
                                        </a>
                                    </td>
                                    <td><?= $unit["add_time"] ?></td>
                                    <td>
                                        <a href="/units/edit/<?= $unit["id"] ?>" class="btn btn-outline-primary">Düzenle</a>
                                        <a href="/units/delete/<?= $unit["id"] ?>" class="btn btn-outline-danger">Sil</a>
                                    </td>
                        <?php
                                }
                            }
                            else {
                                echo '<th colspan="6">Bir departman bulunamıyor.</th>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
		</main>
        
        <?php $BaseViews->javascript() ?>
	</body>
</html>