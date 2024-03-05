<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleManagementController;


Route::middleware('auth')->controller(RoleManagementController::class)->prefix('/Role')->group(function(){
    Route::get('/role/management',  'role_manage')->name('role.manage');
    Route::post('/role/management/parmission',  'add_parmission')->name('add.parmission');
    Route::post('/role/management/add/role',  'add_role')->name('add.role');
    Route::post('/role/management/role/assign',  'assign_role')->name('assign.role');
    Route::get('/permition/edit/{user_id}',  'edit_permition')->name('edit.permition');
    Route::get('/permition/update',  'update_permition')->name('update.permission');
});
