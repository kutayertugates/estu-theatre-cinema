<?php

namespace App\Views;

use App\Models\Periods;
use App\Core\Database;

class Base {
    public function head() {
?>
        <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
		<!-- Swiper CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
		<!-- fontawesome -->
		
		<link rel="stylesheet" href="/assets/css/main.css">
		<!-- Main CSS -->
<?php
    }

    public function javascript() {
?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<!-- jquery -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<!-- bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
		<!-- Swiper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
		<!-- fontawesome -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.13.0/beautify-html.js"></script>
		<!-- Beautify JS  -->
		<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
		<!-- Marked JS -->

		<script src="/assets/js/main.js"></script>
		<!-- Main JS  -->
<?php
	}

	public function sidebar() {
		$pdo = Database::connect();
		$periodModel = new Periods($pdo);
?>
		<aside class="sidebar">
			<div class="d-flex justify-content-between align-items-center py-3">
				<img class="logo img-fluid" src="/assets/static/logo.png" alt="">
				<div class="d-md-none" data-bs-theme="dark">
					<button class="btn btn-close" id="sidebar-close-btn"></button>
				</div>
			</div>
			<ul class="nav nav-pills flex-column sidebar__menu">
				<li class="nav-item">
					<a href="/" class="nav-link">
						<span><i class="bi bi-speedometer2"></i> Yönetim Paneli</span>
					</a>
				</li>
				<hr/>
				<li class="nav-item">
					<a href="/period" class="nav-link">
						<span><i class="bi bi-calendar4-week"></i> Dönem</span>
					</a>
				</li>
				<hr/>

				<li class="nav-item sidebar__menu__title">
					<a href="#" class="nav-link">Üye & Rol</a>
				</li>
				<li class="nav-item sidebar__menu__item">
					<a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#SidebarMenuItemMembership">
						<span><i class="bi bi-people"></i> Üyelik</span>
						<i class="bi bi-chevron-right sidebar__menu__dropicon"></i>
					</a>
					<div class="collapse sidebar__menu__dropmenu" id="SidebarMenuItemMembership">
						<ul class="li nav flex-column">
							<li class="nav-item"><a href="/membership/all" class="nav-link">Tüm Üyeler</a></li>
							<li class="nav-item"><a href="/membership/pending-applications" class="nav-link">Bekleyen Başvurular</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item sidebar__menu__item">
					<a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#SidebarMenuItemRole">
						<span><i class="bi bi-pen"></i> Roller</span>
						<i class="bi bi-chevron-right sidebar__menu__dropicon"></i>
					</a>
					<div class="collapse sidebar__menu__dropmenu" id="SidebarMenuItemRole">
						<ul class="li nav flex-column">
							<li class="nav-item"><a href="/roles" class="nav-link">Tüm Roller</a></li>
							<li class="nav-item"><a href="/role/add" class="nav-link">Rol Ekle</a></li>
							<li class="nav-item"><a href="/role/authorization" class="nav-link">Yetkilendirme</a></li>
						</ul>
					</div>
				</li>
				<hr/>

				<li class="nav-item sidebar__menu__title">
					<a href="#" class="nav-link">Etkinlik & Galeri</a>
				</li>
				<li class="nav-item sidebar__menu__item">
					<a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#SidebarMenuItemEvent">
						<span><i class="bi bi-calendar-event"></i> Etkinlikler</span>
						<i class="bi bi-chevron-right sidebar__menu__dropicon"></i>
					</a>
					<div class="collapse sidebar__menu__dropmenu" id="SidebarMenuItemEvent">
						<ul class="li nav flex-column">
							<li class="nav-item"><a href="/event/all" class="nav-link">Tüm Etkinlikler</a></li>
							<li class="nav-item"><a href="/event/create" class="nav-link">Etkinlik Oluştur</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item sidebar__menu__item">
					<a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#SidebarMenuItemGallery">
						<span><i class="bi bi-card-image"></i> Resimler</span>
						<i class="bi bi-chevron-right sidebar__menu__dropicon"></i>
					</a>
					<div class="collapse sidebar__menu__dropmenu" id="SidebarMenuItemGallery">
						<ul class="li nav flex-column">
							<li class="nav-item"><a href="/gallery/all" class="nav-link">Tüm Resimler</a></li>
							<li class="nav-item"><a href="/gallery/upload" class="nav-link">Resim Ekle</a></li>
						</ul>
					</div>
				</li>
				<hr/>

				<li class="nav-item sidebar__menu__title">
					<a href="#" class="nav-link">Anlaşmalar & Bölümler & Departmanlar </a>
				</li>
				<li class="nav-item">
					<a href="/agreements" class="nav-link">
						<span><i class="bi bi-file-earmark"></i> Anlaşmalar</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="/departments" class="nav-link">
						<span><i class="bi bi-hospital"></i> Bölümler</span>
					</a>
				</li>
				<li class="nav-item sidebar__menu__item">
					<a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#SidebarMenuItemUnits">
						<span><i class="bi bi-building"></i> Departmanlar</span>
						<i class="bi bi-chevron-right sidebar__menu__dropicon"></i>
					</a>
					<div class="collapse sidebar__menu__dropmenu" id="SidebarMenuItemUnits">
						<ul class="li nav flex-column">

							<li class="nav-item"><a href="/units/all" class="nav-link">Tüm Departmanlar</a></li>
							<li class="nav-item"><a href="/units/create" class="nav-link">Departman Ekle</a></li>
						</ul>
					</div>
				</li>
			</ul>
			<div class="mt-4">
				<p class="text-center"><?= Date("Y") ?> &copy; Kutay Ertuğ Ateş & Muhammed Salih Koç Tüm Hakları Saklıdır</p>
			</div>
		</aside>
<?php
	}

	public function navbar() {
?>
		<nav class="d-flex justify-content-between px-3 py-2 shadow-sm mb-3">
			<button class="btn p-1" id="sidebar-btn"><i class="bi bi-list fs-4"></i></button>
			<ul class="nav">
				<li class="nav-item">
					<button type="button" class="btn" data-bs-toggle="dropdown"><i class="bi bi-person fs-5"></i></button>
					<ul class="dropdown-menu dropdown-menu-end">
						<li><a href="/logout" class="dropdown-item" type="button">Hesap</a></li>
						<li><a href="/logout" class="dropdown-item text-danger" type="button">Çıkış Yap</a></li>
					</ul>
				</li>
			</ul>
		</nav>
<?php
	}
}
