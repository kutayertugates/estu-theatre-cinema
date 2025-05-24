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

			<table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Rol Adı</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Tüm Üyelere Eriş</th>
                        <th scope="col">Üyeleri Kabul Et</th>
                        <th scope="col">Rolleri Gör</th>
                        <th scope="col">Rol Ekle</th>
                        <th scope="col">Rol Ver</th>
                        <th scope="col">Websiteyi Düzenle</th>
                        <th scope="col">Etkinlikleri Gör</th>
                        <th scope="col">Etkinlik Ekle</th>
                        <th scope="col">Dönem Sistemine Erişim</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($roles !== false) {
                            foreach ($roles as $role) {
                    ?>
                                <tr>
                                    <td class="" scope="row"><?= $role["name"] ?></td>
                                    <td class="<?= $role["auth_admin"] == 1 ? "table-success" : "table-danger" ?>" class="">
                                        <?= $role["auth_admin"] ?>
                                    </td>
                                    <td class="<?= $role["auth_access_members"] == 1 ? "table-success" : "table-danger" ?>" >
                                        <?= $role["auth_access_members"] ?>
                                    </td>
                                    <td class="<?= $role["auth_accept_members"] == 1 ? "table-success" : "table-danger" ?>">
                                        <?= $role["auth_accept_members"] ?>
                                    </td>
                                    <td class="<?= $role["auth_access_roles"] == 1 ? "table-success" : "table-danger" ?>">
                                        <?= $role["auth_access_roles"] ?>
                                    </td>
                                    <td class="<?= $role["auth_add_role"] == 1 ? "table-success" : "table-danger" ?>">
                                        <?= $role["auth_add_role"] ?>
                                    </td>
                                    <td class="<?= $role["auth_add_role_to_member"] == 1 ? "table-success" : "table-danger" ?>">
                                        <?= $role["auth_add_role_to_member"] ?>
                                    </td>
                                    <td class="<?= $role["auth_edit_website"] == 1 ? "table-success" : "table-danger" ?>">
                                        <?= $role["auth_edit_website"] ?>
                                    </td>
                                    <td class="<?= $role["auth_access_events"] == 1 ? "table-success" : "table-danger" ?>">
                                        <?= $role["auth_access_events"] ?>
                                    </td>
                                    <td class="<?= $role["auth_add_event"] == 1 ? "table-success" : "table-danger" ?>">
                                        <?= $role["auth_add_event"] ?>
                                    </td>
                                    <td class="<?= $role["auth_access_period"] == 1 ? "table-success" : "table-danger" ?>">
                                        <?= $role["auth_access_period"] ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary my-1">Düzenle</button>
                                        <button class="btn btn-outline-danger">Sil</button>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                        else {
                            echo '<th colspan="11">Herhangi bir rol bulunamadı</th>';
                        }
                    ?>
                </tbody>
            </table>
		</main>
        
        <?php $BaseViews->javascript() ?>
	</body>
</html>