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
		<title>Tüm Resimler | Tiyatro & Sinema Yönetim Sistemi</title>
	</head>
	<body data-bs-theme="">
		
        <?php $BaseViews->sidebar() ?>
        
        <main class="content">
            <?php $BaseViews->navbar() ?>
            
            <div class="container-md">
                <div class="row">
                    <div class="col-12"><h2>Tüm Fotoğraflar</h2></div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-2">
                    <?php if (!empty($images)) { ?>
                        <?php foreach ($images as $image) { ?>
                            <section class="col">
                                <div class="card">
                                    <img src="/gallery/get/<?= $image["name"] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="/gallery/delete/<?= $image["id"] ?>" class="btn btn-primary">Sil</a>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#ImageCollapse<?= $image["name"] ?>">
                                            Detaylar
                                        </a>
                                    </div>
                                    <div class="collapse" id="ImageCollapse<?= $image["name"] ?>">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Ad</th>
                                                <td class="text-break"><?= $image["name"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tür</th>
                                                <td class="text-break"><?= $image["mimetype"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Boyut</th>
                                                <td class="text-break"><?= $GeneralModel->formatBytes($image["size"]) ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        <?php } ?>
                    <?php } else { echo '<div class="col"> Herhangi bir Resim Bulunamadı. Hemen <a href="/gallery/upload">Yükle</a> </div>'; } ?>
                </div>
            </div>

        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>