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
			@media only screen and (min-width: 768px) {}
		</style>
		<title>Yönetim Paneli | Tiyatro & Sinema</title>
	</head>
	<body data-bs-theme="">
		
        <?php $BaseViews->sidebar() ?>
        
        <main class="content">
            <?php $BaseViews->navbar() ?>
            <div class="container-md mb-5">
                <div class="row mb-2">
                    <div class="col-12">
                        <h2>Tüm Etkinlikler</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php
                            if (!empty($events)) {
                                foreach ($events as $event) {
                        ?>
                        <article class="border px-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h5 href="" class="text-dark"><?= $event["title"] ?></h5>
                                <div class="py-3">
                                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#etkinlik1">Detaylar</a>
                                    <a href="/event/application/<?= $event["id"] ?>" class="btn btn-outline-primary">Başvurular</a>
                                    <a href="/event/edit/<?= $event["id"] ?>" class="btn btn-outline-warning">Düzenle</a>
                                    <a href="/event/delete/<?= $event["id"] ?>" class="btn btn-outline-danger">Sil</a>
                                </div>
                            </section>
                            <section class="collapse p-2" id="etkinlik1">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Durum</th>
                                        <td class="<?= $event["status"] == 0 ? "text-danger" : "text-success" ?>">
                                            <?= $event["status"] == 0 ? "Pasif" : "Aktif" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sabit</th>
                                        <td class="<?= $event["is_fixed"] == 0 ? "text-danger" : "text-success" ?>">
                                            <?= $event["is_fixed"] == 0 ? "Hayır" : "Evet" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Üyelik</th>
                                        <td class="<?= $event["required_membership"] == 0 ? "text-danger" : "text-success" ?>">
                                            <?= $event["required_membership"] == 0 ? "Zorunlu Değil" : "Zorunlu" ?>
                                        </td>
                                    </tr>
                                </table>
                            </section>
                        </article>
                        <?php
                                }
                            }
                            else {
                                echo "Bir etkinlik bulunmuyor. Hemen <a href='/event/create'>Oluştur</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>

        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>