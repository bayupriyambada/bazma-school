<?php

use App\Http\Controllers\Files\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\Pages\{AboutSchool, VisionMision, Donation};
use App\Http\Livewire\Backend\Pages\Agenda\{Index as AgendaIndex, Edit as AgendaEdit, Create as AgendaCreate};
use App\Http\Livewire\Backend\Pages\Career\{Create as CareerCreate, Edit as CareerEdit, Index as CareerIndex};
use App\Http\Livewire\Backend\Pages\Gallery\{Index as GalleryIndex, Create as GalleryCreate, Edit as GalleryEdit};
use App\Http\Livewire\Backend\Pages\GalleryImages\{Index as GalleryImagesIndex, Edit as GalleryImagesEdit, Create as GalleryImagesCreate};
use App\Http\Livewire\Backend\Pages\Information\{Index as InformationIndex, Edit as InformationEdit, Create as InformationCreate};
use App\Http\Livewire\Backend\Pages\Lesson\{Index, Edit, Create};
use App\Http\Livewire\Backend\Pages\Teacher\{Index as TeacherIndex, Edit as TeacherEdit, Create as TeacherCreate};

Route::group(['middleware' => ['auth']], function () {
    Route::post('upload-images-editor', [UploadController::class, 'uploadImageEditor'])->name('uploadImageEditor');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/donation', Donation::class)->name('donation');
        Route::get('/vision-mission', VisionMision::class)->name('vision-mission');
        // Route::get('/career', Career::class)->name('career');
        Route::prefix('lesson')->name('lesson.')->group(function () {
            Route::get('/', Index::class)->name('index');
            Route::get('/create', Create::class)->name('create');
            Route::get('/{uuid}/edit', Edit::class)->name('edit');
        });
        Route::prefix('career')->name('career.')->group(function () {
            Route::get('/', CareerIndex::class)->name('index');
            Route::get('/create', CareerCreate::class)->name('create');
            Route::get('/{slug}/edit', CareerEdit::class)->name('edit');
        });
        Route::prefix('teacher')->name('teacher.')->group(function () {
            Route::get('/', TeacherIndex::class)->name('index');
            Route::get('/create', TeacherCreate::class)->name('create');
            Route::get('/{uuid}/edit', TeacherEdit::class)->name('edit');
        });
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', GalleryIndex::class)->name('index');
            Route::get('/create', GalleryCreate::class)->name('create');
            Route::get('/{uuid}/edit', GalleryEdit::class)->name('edit');
        });
        Route::prefix('gallery-images')->name('gallery.images.')->group(function () {
            Route::get('/', GalleryImagesIndex::class)->name('index');
            Route::get('/create', GalleryImagesCreate::class)->name('create');
            Route::get('/{uuid}/edit', GalleryImagesEdit::class)->name('edit');
        });
        Route::prefix('agenda')->name('agenda.')->group(function () {
            Route::get('/', AgendaIndex::class)->name('index');
            Route::get('/create', AgendaCreate::class)->name('create');
            Route::get('/{uuid}/edit', AgendaEdit::class)->name('edit');
        });
        Route::prefix('information')->name('information.')->group(function () {
            Route::get('/', InformationIndex::class)->name('index');
            Route::get('/create', InformationCreate::class)->name('create');
            Route::get('/{uuid}/edit', InformationEdit::class)->name('edit');
        });
        Route::get('/about-school', AboutSchool::class)->name('about.school');
    });
});
