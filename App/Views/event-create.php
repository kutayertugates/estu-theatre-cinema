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
                <div class="row">
                    <div class="col-12">
                        <h2>Etkinlik Oluştur</h2>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="nav nav-tabs" id="menu-tab">
                            <button class="nav-link active" id="nav-form-tab" data-bs-toggle="tab" data-bs-target="#nav-form">Form</button>
                            <button class="nav-link" id="nav-view-tab" data-bs-toggle="tab" data-bs-target="#nav-view">Ön İzleme</button>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-form">
                        <form method="POST" action="/event/add" class="row g-2">
                            <div class="col-12">
                                <input type="text" class="form-control" name="title" placeholder="Başlık">
                            </div>
                            <div class="col-12">
                                <div class="btn-toolbar">
                                    <div class="btn-group me-2" role="group">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="dropdown">H</button>
                                            <div class="dropdown-menu">
                                                <div class="btn-group d-flex justify-content-center px-2">
                                                    <button class="btn btn-primary" onclick="create_mark('##')" type="button">
                                                        <i class="bi bi-type-h2"></i>
                                                    </button>
                                                    <button class="btn btn-primary" onclick="create_mark('###')" type="button">
                                                        <i class="bi bi-type-h3"></i>
                                                    </button>
                                                    <button class="btn btn-primary" onclick="create_mark('####')" type="button">
                                                        <i class="bi bi-type-h4"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-primary" onclick="create_mark('** **')" type="button">
                                            <i class="bi bi-type-bold"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group me-2" role="group">
                                        <button type="button" class="btn btn-outline-primary" onclick="create_mark('1. Eleman bir\n2. Eleman iki')">
                                            <i class="bi bi-list-ol"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary"><i class="bi bi-chat-right-quote"></i></button>
                                        <button type="button" class="btn btn-outline-primary"><i class="bi bi-card-image"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="content_marked" id="content-area" rows="10" placeholder="İçerik"></textarea>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="content_html" id="content-area" rows="10" placeholder="İçerik" readonly></textarea>
                            </div>
                            <div class="col-12"><button type="submit" class="btn btn-outline-success">Ekle</button></div>
                        </form>
                    </div>
                    <div class="tab-pane fade p-2" id="nav-view"></div>
                </div>
            </div>

        </main>
		
        <?php $BaseViews->javascript() ?>
        <script>
            $("#nav-view-tab").click(function () {
                let content = $("#content-area").val();
                let html = marked.parse(content);
                $("#nav-view").html(html);
            });

            function create_mark(mark) {
                if ($("#content-area").val() == "") {
                    $("#content-area").val($("#content-area").val() + mark); 
                }
                else {
                    $("#content-area").val($("#content-area").val() + "\n" + mark); 
                }
            }

            $("textarea[name=content_marked]").keyup(function () {
                let mark = $(this).val();
                $("textarea[name=content_html]").val(marked.parse(mark));
            });
        </script>
	</body>
</html>