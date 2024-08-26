<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccessNewsController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\AccessEventsController;
use App\Http\Controllers\AccessProfileController;
use App\Http\Controllers\TypePotentialController;
use App\Http\Controllers\AccessDownloadController;
use App\Http\Controllers\AccessServicesController;
use App\Http\Controllers\VillageProfileController;
use App\Http\Controllers\AccessGalleriesController;
use App\Http\Controllers\VillagePotentialController;
use App\Http\Controllers\VillageGovernmentController;
use App\Http\Controllers\AccessAnnouncementController;
use App\Http\Controllers\AccessPemerintahanController;
use App\Http\Controllers\AdminAccessAccountController;
use App\Http\Controllers\VillageInformationController;
use App\Http\Controllers\AccessVillagePotentialController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('/')->group(function () {
  Route::get('/profil-desa', [VillageProfileController::class, 'index'])->name('profile.index');
  Route::get('/sejarah-desa', [VillageProfileController::class, 'history'])->name('profile.sejarah');
});

Route::prefix('/')->group(function () {
  Route::get('pemerintahan-desa', [VillageGovernmentController::class, 'index'])->name('government');
  Route::get('sotk-desa', [VillageGovernmentController::class, 'sotk'])->name('sotk');
});

Route::prefix('potensi-desa')->group(function () {
  Route::get('', [VillagePotentialController::class, 'index'])->name('potential.index');
  Route::get('{typePotential:type}', [VillagePotentialController::class, 'detail'])->name('potential.detail');
  Route::get('show/{potential:uuid}', [VillagePotentialController::class, 'show'])->name('potential.show');
});

Route::prefix('informasi')->group(function () {
  Route::get('news', [VillageInformationController::class, 'news'])->name('information.news');
  Route::get('news/{news:uuid}', [VillageInformationController::class, 'detailNews'])->name('information.detail.news');

  Route::get('events', [VillageInformationController::class, 'events'])->name('information.events');
  Route::get('events/{event:uuid}', [VillageInformationController::class, 'detailEvent'])->name('information.detail.event');

  Route::get('announcements', [VillageInformationController::class, 'announcements'])->name('information.announcements');
  Route::get('announcements/{announcement:uuid}', [VillageInformationController::class, 'announcementShow'])->name('information.announcements.show');

  Route::get('gallery', [VillageInformationController::class, 'gallery'])->name('information.gallery');
  Route::get('gallery/{gallery:uuid}', [VillageInformationController::class, 'galleryShow'])->name('information.gallery.show');

  Route::get('downloads', [VillageInformationController::class, 'downloads'])->name('information.downloads');
  Route::get('downloads/{allFile:uuid}', [VillageInformationController::class, 'downloadFile'])->name('information.download.file');
  Route::get('downloads/{allFile:uuid}/detail', [VillageInformationController::class, 'detailFile'])->name('information.download.detail');

  Route::get('pelayanan', [VillageInformationController::class, 'services'])->name('information.services');
});



// LOGIN
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// ADMIN
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('index', [AdminIndexController::class, 'index'])->name('admin.index');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('profile/visi-misi', [AccessProfileController::class, 'visiMisi'])->name('visiMisi');
  Route::post('profile/visi-misi', [AccessProfileController::class, 'visiMisiUpdate']);

  Route::get('profile/village-history', [AccessProfileController::class, 'VillageHistory'])->name('villageHistory');
  Route::post('profile/village-history-store', [AccessProfileController::class, 'VillageHistoryStore'])->name('villageHistoryStore');
  Route::put('profile/village-history-update', [AccessProfileController::class, 'VillageHistoryUpdate'])->name('villageHistoryUpdate');

  Route::get('profile/demografi', [AccessProfileController::class, 'demografi'])->name('demografi');
  Route::post('profile/demografi-store', [AccessProfileController::class, 'demografiStore'])->name('demografi.store');
  Route::put('profile/demografi-update', [AccessProfileController::class, 'demografiUpdate'])->name('demografi.update');
});


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('pemerintahan/desa', [AccessPemerintahanController::class, 'pemerintahanDesa'])->name('pemerintahan');
  Route::post('pemerintahan/desa/store', [AccessPemerintahanController::class, 'pemerintahanDesaStore'])->name('pemerintahan.store');
  Route::get('pemerintahan/desa/{pemerintahanDesa:uuid}', [AccessPemerintahanController::class, 'pemerintahanEdit'])->name('pemerintahan.edit');
  Route::put('pemerintahan/desa/{pemerintahanDesa:uuid}/update', [AccessPemerintahanController::class, 'pemerintahanUpdate'])->name('pemerintahan.update');

  Route::get('pemerintahan/sotk', [AccessPemerintahanController::class, 'sotk'])->name('admin.sotk');
  Route::post('pemerintahan/sotk/store', [AccessPemerintahanController::class, 'sotkStore'])->name('admin.sotk.store');
  Route::put('pemerintahan/sotk/update', [AccessPemerintahanController::class, 'sotkUpdate'])->name('admin.sotk.update');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('potensi/desa', [AccessVillagePotentialController::class, 'index'])->name('admin.potential.index');
  Route::get('potensi/desa/create', [AccessVillagePotentialController::class, 'create'])->name('admin.potential.create');
  Route::post('potensi/desa/create', [AccessVillagePotentialController::class, 'store'])->name('admin.potential.store');
  Route::get('potensi/desa/{potential:uuid}/edit', [AccessVillagePotentialController::class, 'edit'])->name('admin.potential.edit');
  Route::put('potensi/desa/{potential:uuid}/update', [AccessVillagePotentialController::class, 'update'])->name('admin.potential.update');
  Route::delete('potensi/desa/{potential:uuid}/delete', [AccessVillagePotentialController::class, 'destroy'])->name('admin.potential.delete');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::post('type/potential', [TypePotentialController::class, 'store'])->name('type.store');
  Route::get('type/potential/{typePotential:uuid}/edit', [TypePotentialController::class, 'edit'])->name('type.edit');
  Route::put('type/potential/{typePotential:uuid}/update', [TypePotentialController::class, 'update'])->name('type.update');
  Route::delete('type/potential/{typePotential:uuid}/delete', [TypePotentialController::class, 'destroy'])->name('type.delete');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('information/news', [AccessNewsController::class, 'index'])->name('admin.news.index');
  Route::get('information/news/create', [AccessNewsController::class, 'create'])->name('admin.news.create');
  Route::post('information/news/store', [AccessNewsController::class, 'store'])->name('admin.news.store');
  Route::get('information/news/{news:uuid}/edit', [AccessNewsController::class, 'edit'])->name('admin.news.edit');
  Route::put('information/news/{news:uuid}/update', [AccessNewsController::class, 'update'])->name('admin.news.update');
  Route::delete('information/news/{news:uuid}/delete', [AccessNewsController::class, 'destroy'])->name('admin.news.delete');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('information/announcement', [AccessAnnouncementController::class, 'index'])->name('admin.announcement.index');
  Route::get('information/announcement/create', [AccessAnnouncementController::class, 'create'])->name('admin.announcement.create');
  Route::post('information/announcement/store', [AccessAnnouncementController::class, 'store'])->name('admin.announcement.store');
  Route::get('information/announcement/{announcement:uuid}', [AccessAnnouncementController::class, 'show'])->name('admin.announcement.show');
  Route::get('information/announcement/{announcement:uuid}/edit', [AccessAnnouncementController::class, 'edit'])->name('admin.announcement.edit');
  Route::put('information/announcement/{announcement:uuid}/update', [AccessAnnouncementController::class, 'update'])->name('admin.announcement.update');
  Route::delete('information/announcement/{announcement:uuid}/delete', [AccessAnnouncementController::class, 'destroy'])->name('admin.announcement.delete');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('information/event', [AccessEventsController::class, 'index'])->name('admin.event.index');
  Route::get('information/event/create', [AccessEventsController::class, 'create'])->name('admin.event.create');
  Route::post('information/event/store', [AccessEventsController::class, 'store'])->name('admin.event.store');
  Route::get('information/event/{event:uuid}/edit', [AccessEventsController::class, 'edit'])->name('admin.event.edit');
  Route::put('information/event/{event:uuid}/update', [AccessEventsController::class, 'update'])->name('admin.event.update');
  Route::delete('information/event/{event:uuid}/delete', [AccessEventsController::class, 'destroy'])->name('admin.event.delete');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('information/gallery', [AccessGalleriesController::class, 'index'])->name('admin.gallery.index');
  Route::get('information/gallery/create', [AccessGalleriesController::class, 'create'])->name('admin.gallery.create');
  Route::post('information/gallery/store', [AccessGalleriesController::class, 'store'])->name('admin.gallery.store');
  Route::get('information/gallery/{gallery:uuid}', [AccessGalleriesController::class, 'show'])->name('admin.gallery.show');
  Route::get('information/gallery/{gallery:uuid}/edit', [AccessGalleriesController::class, 'edit'])->name('admin.gallery.edit');
  Route::put('information/gallery/{gallery:uuid}/update', [AccessGalleriesController::class, 'update'])->name('admin.gallery.update');
  Route::delete('information/gallery/{gallery:uuid}/delete', [AccessGalleriesController::class, 'destroy'])->name('admin.gallery.delete');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('information/download', [AccessDownloadController::class, 'index'])->name('admin.download.index');
  Route::get('information/download/create', [AccessDownloadController::class, 'create'])->name('admin.download.create');
  Route::post('information/download/store', [AccessDownloadController::class, 'store'])->name('admin.download.store');
  Route::get('information/download/{allFile:uuid}/edit', [AccessDownloadController::class, 'edit'])->name('admin.download.edit');
  Route::put('information/download/{allFile:uuid}/update', [AccessDownloadController::class, 'update'])->name('admin.download.update');
  Route::delete('information/download/{allFile:uuid}/delete', [AccessDownloadController::class, 'destroy'])->name('admin.download.delete');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('information/services', [AccessServicesController::class, 'index'])->name('admin.services.index');
  Route::post('information/services/store', [AccessServicesController::class, 'indexStore'])->name('admin.services.store');
});

// ADMIN CHANGE USERNAME/PASSWORD
Route::prefix('admin')->middleware(['auth', 'verify.admin.password'])->group(function () {
  Route::get('account/setting', [AdminAccessAccountController::class, 'index'])->name('admin.account.index');
  Route::put('account/setting', [AdminAccessAccountController::class, 'update'])->name('admin.account.update');
});
Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/admin/account/verify', [AdminAccessAccountController::class, 'verify'])->name('admin.password.confirm');
  Route::post('/admin/account/verify', [AdminAccessAccountController::class, 'verifyConfirm'])->name('admin.password.confirm.post');
});
