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

                <section class="row">
                    <div class="col">
                        <h2 class="mb-3">Rol Ekle</h2>
                    </div>
                </section>
                <form method="POST" action="/role/add-role" class="row g-2">
                    <div class="col-12">
                        <input type="text" class="form-control" name="role_name" placeholder="Role Adı">
                    </div>
                    <div class="col-12">
                        <h5>Yetkiler</h5>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-danger">Admin</th>
                                <td><input type="checkbox" name="auth_admin" value="1"></td>
                            </tr>
                            <tr>
                                <th>Üyeleri Gör</th>
                                <td><input type="checkbox" name="auth_see_members" value="1"></td>
                            </tr>
                            <tr>
                                <th>Üye Başvurularını Kabul Et</th>
                                <td><input type="checkbox" name="auth_accept_members" value="1"></td>
                            </tr>
                            <tr>
                                <th>Rollere Eriş</th>
                                <td><input type="checkbox" name="auth_access_roles" value="1"></td>
                            </tr>
                            <tr>
                                <th>Rol Ekle</th>
                                <td><input type="checkbox" name="auth_add_role" value="1"></td>
                            </tr>
                            <tr>
                                <th>Rol Ver</th>
                                <td><input type="checkbox" name="auth_add_role_to_member" value="1"></td>
                            </tr>
                            <tr>
                                <th>Websiteyi Düzenle</th>
                                <td><input type="checkbox" name="auth_edit_website" value="1"></td>
                            </tr>
                            <tr>
                                <th>Veritabanına Eriş</th>
                                <td><input type="checkbox" name="auth_access_sql" value="1"></td>
                            </tr>
                            <tr>
                                <th>Dönem Sistemine Eriş</th>
                                <td><input type="checkbox" name="auth_access_sql" value="1"></td>
                            </tr>
                        </table>
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