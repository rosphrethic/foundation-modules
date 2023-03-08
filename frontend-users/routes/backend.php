<?php

use App\Http\Controllers\Backend\FrontendUserController as BackendFrontendUserController;

Route::prefix('frontend-users')->name('frontend-users.')->group(function () {
				Route::get('/', [BackendFrontendUserController::class, 'index'])->name('index')->middleware('has.permission.to:list_frontend_users');
				Route::get('/create', [BackendFrontendUserController::class, 'create'])->name('create')->middleware('has.permission.to:create_frontend_users');
				Route::post('/store', [BackendFrontendUserController::class, 'store'])->name('store')->middleware('has.permission.to:create_frontend_users');
				Route::get('/{frontendUser}', [BackendFrontendUserController::class, 'show'])->name('show')->middleware('has.permission.to:view_frontend_users');
				Route::get('/{frontendUser}/edit', [BackendFrontendUserController::class, 'edit'])->name('edit')->middleware('has.permission.to:edit_frontend_users');
				Route::patch('/{frontendUser}/update', [BackendFrontendUserController::class, 'update'])->name('update')->middleware('has.permission.to:edit_frontend_users');
				Route::delete('/{frontendUser}/delete', [BackendFrontendUserController::class, 'delete'])->name('delete')->middleware('has.permission.to:delete_frontend_users');
});


