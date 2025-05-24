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
                        <h2>Etkinlik Düzenle</h2>
                    </div>
                </div>
                <form method="POST" action="/event/editpost" class="row g-2">
                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Etkinlik Kimlik</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="event_id" class="form-control" value="<?= $event["id"] ?>" readonly>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Durum</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <select name="status" class="form-control">
                            <option value="0" <?= $event["status"] == 0 ? "selected" : "" ?>>Pasif</option>
                            <option value="1" <?= $event["status"] == 1 ? "selected" : "" ?>>Aktif</option>
                        </select>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Sabit</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <select name="is_fixed" class="form-control">
                            <option value="0" <?= $event["is_fixed"] == 0 ? "selected" : "" ?>>Sabitleme</option>
                            <option value="1" <?= $event["is_fixed"] == 1 ? "selected" : "" ?>>Sabitle</option>
                        </select>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Üyelik</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <select name="required_membership" class="form-control">
                            <option value="0" <?= $event["required_membership"] == 0 ? "selected" : "" ?>>Zorunlu Değil</option>
                            <option value="1" <?= $event["required_membership"] == 1 ? "selected" : "" ?>>Zorunlu</option>
                        </select>
                    </div>

                    <div class="col-4 col-md-4 col-lg-2 fw-bold">Başlık</div>
                    <div class="col-8 col-md-8 col-lg-10">
                        <input type="text" name="title" class="form-control" value="<?= $event["title"] ?>">
                    </div>
                    
                    <div class="col-12 fw-bold">İçerik</div>
                    <div class="col-12">
                        <textarea name="content_marked" class="form-control" rows="10"><?= $event["content_marked"] ?></textarea>
                    </div>
                    
                    <div class="col-12 fw-bold">HTML İçerik</div>
                    <div class="col-12">
                        <textarea name="content_html" class="form-control" rows="10" readonly><?= $event["content_html"] ?></textarea>
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