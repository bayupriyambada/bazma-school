<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\Auth\Login;
use App\Http\Livewire\Frontend\{Home, DonationPage};
use App\Http\Livewire\Frontend\Pages\Career\DetailPage as CareerDetailPage;
use App\Http\Livewire\Frontend\Pages\CareerPage;
use App\Http\Livewire\Frontend\Pages\ContactPage;
use App\Http\Livewire\Frontend\Pages\GalleryImagesPage;
use App\Http\Livewire\Frontend\Pages\GalleryPage;
use App\Http\Livewire\Frontend\Pages\StudentsPage;
use App\Http\Livewire\Frontend\Pages\TeacherPage;
use App\Http\Livewire\Frontend\Pages\VisionMissionPage;

Route::get('/', Home::class)->name('home');
Route::prefix('p')->name('p.')->group(function () {
    Route::get('/donation', DonationPage::class)->name('donation');
    Route::get('/vision-mission', VisionMissionPage::class)->name('vision-mission');
    Route::get('/gallery', GalleryPage::class)->name('gallery');
    Route::get('/gallery-images', GalleryImagesPage::class)->name('gallery.images');
    Route::get('/teachers', TeacherPage::class)->name('teachers');
    Route::get('/students', StudentsPage::class)->name('students');
    Route::get('/career', CareerPage::class)->name('career');
    Route::get('/career/c/{slug}', CareerDetailPage::class)->name('career.details');
});
Route::get('/contact', ContactPage::class)->name('contact');
Route::group(['middleware' => ['guest']], function () {
    Route::get('/authentication/bazma/login', Login::class)->name('auth.login');
});

require 'backend.php';
