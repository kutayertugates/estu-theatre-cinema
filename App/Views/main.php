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
		<title>Yönetim Paneli | Tiyatro & Sinema</title>
	</head>
	<body data-bs-theme="">
		
        <?php $BaseViews->sidebar() ?>

        <main class="content">
            <?php $BaseViews->navbar() ?>
			
			<!--
			<section class="container-md">
				<div class="row g3">
					<div class="col border border-start border-success"> dasfasdf</div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
				</div>
			</section>
			-->
        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>