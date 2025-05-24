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
                <section class="row mb-2">
                    <div class="col-12">
                        <h2>Anlaşma Ekle</h2>
                    </div>
                </section>

                <form method="POST" action="/agreements/add" class="row mb-4">
                    <div class="col-md-6 col-lg-7 col-xl-8">
                        <input type="text" name="company_name" class="form-control" placeholder="İş Yeri Adı" required>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-2">
                        <input type="number" name="percent" class="form-control" min="0" max="100" step="0.01" placeholder="Yüzdelik" required>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2">
                        <button type="submit" class="btn btn-outline-primary">Ekle</button>
                    </div>
                </form>
                
                <section class="row mb-2">
                    <div class="col-12">
                        <h2>Tüm Anlaşmalar</h2>
                    </div>
                </section>
                <section class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">İş Yeri Adı</th>
                                    <th scope="col">Yüzde</th>
                                    <th scope="col">Eklenme Tarihi</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (!empty($agreements)) {
                                        foreach ($agreements as $agreement) {
                                ?>
                                            <tr>
                                                <td scope="row"><?= $agreement["company_name"] ?></td>
                                                <td><?= $agreement["percent"] ?>%</td>
                                                <td><?= $agreement["add_time"] ?></td>
                                                <td>
                                                    <a href="/agreements/delete/<?= $agreement["id"] ?>" class="btn btn-outline-danger">Sil</a>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                    else {
                                        echo '<tr><th colspan="4">Bir anlaşma bulunmuyor.</th></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>