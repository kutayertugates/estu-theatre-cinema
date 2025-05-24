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
            
			<div class="container-md pb-4">
                <section class="row pb-2">
                    <div class="col-12"><h2>Yeni Dönem Başlat</h2></div>
                </section>
                <form method="post" action="period/add" class="row g-3">
                    <div class="col-6">
                        <input class="form-control" type="number" min="2024" name="start_year" placeholder="Dönem Başlangıç Yılı" required>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="number" min="2025" name="finish_year" placeholder="Dönem Başlangıç Yılı" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-success">Başlat</button>
                    </div>
                </form>
            </div>
            
            <div class="container-md pb-4 ">
                <section class="row pb-2">
                    <div class="col-12"><h2>Dönem Değiştir</h2></div>
                </section>
                <section class="row">
                    <div class="col-12">
                        <select id="chagePeriodSelect" class="form-control">
                            <?php foreach ($periods as $period) { ?>
                                        <option value="<?= $period["id"] ?>" <?= $period["id"] == $_COOKIE["period_id"] ? 'selected' : '' ?> >
                                            <?= $period["start_year"] ."-". $period["finish_year"] ?>
                                        </option>
                            <?php } ?>
                        </select>
                    </div>
                </section>
            </div>
        </main>
		
        <?php $BaseViews->javascript() ?>
        <script>
            $("#chagePeriodSelect").on("change", function () {
                let period_id = $(this).val();
                window.location = "/period/change/" + period_id;
            });
        </script>
	</body>
</html>