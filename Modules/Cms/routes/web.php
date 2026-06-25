<?php

use Illuminate\Support\Facades\Route;
use Modules\Cms\Http\Controllers\PageController;
use Modules\Cms\Http\Controllers\SettingController;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin/cms')
    ->name('admin.cms.')
    ->group(function () {
        

        Route::get('pages', [PageController::class, 'index'])->name('pages.index');
        Route::get('pages/create', [PageController::class, 'create'])->name('pages.create');
        Route::post('pages', [PageController::class, 'store'])->name('pages.store');
        Route::get('pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
        Route::put('pages/{page}', [PageController::class, 'update'])->name('pages.update');
        Route::delete('pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

        Route::post('pages/{page}/sections', [PageController::class, 'addSection'])->name('sections.add');
        Route::delete('sections/{section}', [PageController::class, 'deleteSection'])->name('sections.destroy');

        Route::post('sections/{section}/items', [PageController::class, 'addItem'])->name('items.add');
        Route::delete('items/{item}', [PageController::class, 'deleteItem'])->name('items.delete');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });

    Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', '[A-Za-z0-9\-]+')
    ->name('public.page');