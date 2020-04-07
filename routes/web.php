<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

//membuat route untuk halaman awal dengan controller
Route::get('/', 'PageController@index');



// CRUD Kategori
//membuat route untuk halaman mahasiswa dengan controller
Route::get('/kategori', 'KategoriController@index');
//menampilkan form tambah data
Route::get('/kategori/create', 'KategoriController@create');
//membuat route untuk memproses tambah data
Route::post('/kategori', 'KategoriController@store');
//menampilkan data berdasarkan id
//Route::get('/kategori/{kategori}', 'KategoriController@show');
//untuk menghapus data
Route::delete('/kategori/{kategori}', 'KategoriController@destroy');
//utk edit data
Route::get('/kategori/{kategori}/edit', 'KategoriController@edit');
//utk proses edit data
Route::patch('/kategori/{kategori}', 'KategoriController@update');



// CRUD Ukuran
//membuat route untuk halaman mahasiswa dengan controller
Route::get('/ukuran', 'UkuranController@index');
//menampilkan form tambah data
Route::get('/ukuran/create', 'UkuranController@create');
//membuat route untuk memproses tambah data
Route::post('/ukuran', 'UkuranController@store');
//menampilkan data berdasarkan id
//Route::get('/ukuran/{ukuran}', 'UkuranController@show');
//untuk menghapus data
Route::delete('/ukuran/{ukuran}', 'UkuranController@destroy');
//utk edit data
Route::get('/ukuran/{ukuran}/edit', 'UkuranController@edit');
//utk proses edit data
Route::patch('/ukuran/{ukuran}', 'UkuranController@update');


// CRUD Warna
//membuat route untuk halaman mahasiswa dengan controller
Route::get('/warna', 'WarnaController@index');
//menampilkan form tambah data
Route::get('/warna/create', 'WarnaController@create');
//membuat route untuk memproses tambah data
Route::post('/warna', 'WarnaController@store');
//menampilkan data berdasarkan id
//Route::get('/warna/{Warna}', 'WarnaController@show');
//untuk menghapus data
Route::delete('/warna/{warna}', 'WarnaController@destroy');
//utk edit data
Route::get('/warna/{warna}/edit', 'WarnaController@edit');
//utk proses edit data
Route::patch('/warna/{warna}', 'WarnaController@update');



// CRUD Bahan
//membuat route untuk halaman mahasiswa dengan controller
Route::get('/bahan', 'BahanController@index');
//menampilkan form tambah data
Route::get('/bahan/create', 'BahanController@create');
//membuat route untuk memproses tambah data
Route::post('/bahan', 'BahanController@store');
//menampilkan data berdasarkan id
//Route::get('/Bahan/{Bahan}', 'BahanController@show');
//untuk menghapus data
Route::delete('/bahan/{bahan}', 'BahanController@destroy');
//utk edit data
Route::get('/bahan/{bahan}/edit', 'BahanController@edit');
//utk proses edit data
Route::patch('/bahan/{bahan}', 'BahanController@update');



// CRUD Supplier
//membuat route untuk halaman mahasiswa dengan controller
Route::get('/supplier', 'SupplierController@index');
//menampilkan form tambah data
Route::get('/supplier/create', 'SupplierController@create');
//membuat route untuk memproses tambah data
Route::post('/supplier', 'SupplierController@store');
//menampilkan data berdasarkan id
//Route::get('/Supplier/{supplier}', 'SupplierController@show');
//untuk menghapus data
Route::delete('/supplier/{supplier}', 'SupplierController@destroy');
//utk edit data
Route::get('/supplier/{supplier}/edit', 'SupplierController@edit');
//utk proses edit data
Route::patch('/supplier/{supplier}', 'SupplierController@update');
