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
                        <h2>Bölüm Düzenle</h2>
                    </div>
                </div>
                <form method="POST" action="/departments/editdepartment" class="row g-2">
                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Bölüm Kimlik</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="id" class="form-control" value="<?= $department["id"] ?>" readonly>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Fakülte</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="faculty" class="form-control" value="<?= $department["faculty"] ?>" maxlength="128" required>
                    </div>
                    
                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Bölüm</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="department" class="form-control" value="<?= $department["department"] ?>" maxlength="128" required>
                    </div>

                    <div class="col-12"><button type="submit" class="btn btn-outline-primary">Düzenle</button></div>
                </form>
            </div>

        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>