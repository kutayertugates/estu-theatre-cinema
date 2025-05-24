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
                        <h2>Kullanıcı Düzenle</h2>
                    </div>
                </div>
                <form method="POST" action="/membership/edituser" class="row g-2">
                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Kullanıcı Kimlik</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="user_id" class="form-control" value="<?= $user["id"] ?>" readonly>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Departman</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <select name="unit_id" class="form-control">
                            <?php foreach ($units as $unit) { ?>
                                <option <?= $user["unit_id"] == $unit["id"] ? "selected" : "" ?> value="<?= $unit["id"] ?>"><?= $unit["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Ad</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="name" class="form-control" value="<?= $user["name"] ?>" maxlength="128" required>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Soyad</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="surname" class="form-control" value="<?= $user["surname"] ?>" maxlength="128" required>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">E-Posta</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="email" name="email" class="form-control" value="<?= $user["email"] ?>" maxlength="128" required>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Telefon Numarası</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="number" class="form-control" value="<?= $user["number"] ?>" maxlength="11" required>
                    </div>
                    
                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Bölüm</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <select name="estu_department_id" class="form-control">
                            <?php foreach ($departments as $department) { ?>
                                <option <?= $user["estu_department_id"] == $department["id"] ? "selected" : "" ?> value="<?= $department["id"] ?>"><?= $department["full_department"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Sınıf</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="number" name="grade" class="form-control" value="<?= $user["grade"] ?>" min="0" max="5" required>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Okul Numarası</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="school_number" class="form-control" value="<?= $user["school_number"] ?>" maxlength="11" required>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Tiyatro İlgisi</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="number" name="theatre_interest" class="form-control" value="<?= $user["theatre_interest"] ?>" min="0" max="5" required>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Sinema İlgisi</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="number" name="cinema_interest" class="form-control" value="<?= $user["cinema_interest"] ?>" min="0" max="5" required>
                    </div>

                    <div class="col-12"><button type="submit" class="btn btn-outline-primary">Düzenle</button></div>
                </form>
            </div>

        </main>
		
        <?php $BaseViews->javascript() ?>
        <script>
            $("textarea[name=content_marked]").keyup(function () {
                let mark = $(this).val();
                let html = marked.parse(mark);
                $("textarea[name=content_html]").val(html);
            });
        </script>
	</body>
</html>