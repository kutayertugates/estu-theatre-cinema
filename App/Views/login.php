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
			.login-form {
                width: 100%;
            }
			@media only screen and (min-width: 768px) {
				.login-form {
                    width: 70%;
                }
			}
		</style>
		<title>Yönetim Paneli | Tiyatro & Sinema</title>
	</head>
	<body data-bs-theme="">
		
        <?php $BaseViews->sidebar() ?>
        
        <main class="content">
            <?php $BaseViews->navbar() ?>
            <div class="container-md login-form">
                <div class="row mb-3">
                    <div class="col-12"><h2>Giriş Yap</h2></div>
                </div>
                <form method="POST" action="/login/form" class="row g-2">
                    <div class="col-12">
                        <input type="email" name="email" class="form-control" placeholder="E Posta" required>
                    </div>
                    <div class="col-12">
                        <input type="password" name="password" class="form-control" placeholder="Şifre" required>
                    </div>
                    <div class="col-12"><button type="submit" class="btn btn-outline-primary">Giriş Yap</button></div>
                </form>
            </div>
        </main>
		
        <?php $BaseViews->javascript() ?>
	</body>
</html>