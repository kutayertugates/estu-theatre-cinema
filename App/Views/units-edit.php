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
                <div class="row mb-3">
                    <div class="col-12">
                        <h2>Depatman Düzenle</h2>
                    </div>
                </div>
                <form method="POST" action="/units/editunits" class="row g-2">
                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Departman Kimlik</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="id" class="form-control" value="<?= $unit["id"] ?>" readonly>
                    </div>


                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Departman Adı</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="name" class="form-control" value="<?= $unit["name"] ?>" maxlength="128" required>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Açıklaması</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="description" class="form-control" value="<?= $unit["description"] ?>" maxlength="128" required>
                    </div>
                    
                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Baş Görevli</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <select name="attendant" class="form-control">
                            <?php foreach ($users as $user) { ?>
                                <option <?= $user["id"] == $unit["attendant"] ? "selected" : "" ?> value="<?= $user["id"] ?>"><?= $user["name"] ." ".$user["surname"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Yardımcı Görevli</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <select name="vice_attendant" class="form-control">
                            <?php foreach ($users as $user) { ?>
                                <option <?= $user["id"] == $unit["vice_attendant"] ? "selected" : "" ?> value="<?= $user["id"] ?>"><?= $user["name"] ." ".$user["surname"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12"><button type="submit" class="btn btn-outline-primary">Düzenle</button></div>
                </form>
            </div>

        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>