<?php

// website
Route::get('', 'Website\Home@index');
Route::get('test', 'Website\Home@test');

// admin general
Route::get('admin', 'Admin\Home@index');
Route::post('admin/initialize', 'Admin\Home@initialize');
Route::post('admin/login', 'Admin\Home@login');
Route::post('admin/logout', 'Admin\Home@logout');
Route::post('admin/test', 'Admin\Home@test');