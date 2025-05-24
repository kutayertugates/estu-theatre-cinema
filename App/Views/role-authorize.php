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

		<title>Tüm Üyeler | Tiyatro & Sinema</title>
	</head>
	<body data-bs-theme="">
		
        <?php $BaseViews->sidebar() ?>

        <main class="content">
            <?php $BaseViews->navbar() ?>

            <div class="container-md">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3">Yetkilendirme</h2>
                    </div>
                </div>
                <form method="POST" action="/role/Authorize" class="row g-3">
                    <div class="col-6">
                        <select name="role" class="form-control">
                            <?php
                                foreach ($roles as $role) {
                                    echo '<option value="'.$role["id"].'">'. $role["name"] .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="user" class="form-control">
                        <?php
                            foreach ($users as $user) {
                                echo '<option value="'.$user["id"].'">'. $user["school_number"] .' '.  $user["name"] .' '. $user["surname"] .'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Yetkilendir</button>
                    </div>
                </form>
            </div>
		</main>
        
        <?php $BaseViews->javascript() ?>
	</body>
</html>