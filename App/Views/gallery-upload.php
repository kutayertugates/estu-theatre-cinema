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
                    <div class="col-12"><h2>Fotoğraf Ekle</h2></div>
                </div>
                <form method="POST" action="/gallery/add" enctype="multipart/form-data" class="row g-2">
                    <div class="col-12"><h5>Dosya</h5></div>
                    <div class="col-12">
                        <input type="file" class="form-control" name="UploadFile" />
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Ekle</button>
                    </div>
                </form>
            </div>

        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>