<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//     // trả về view resources/views/welcome.blade.php
//     return view('home');
// });
// Route::get('/users/{id}/{name}', function ($userId, $username) {      
//     // trả về view resources/views/welcome.blade.php
//     dd($userId, $username);
// });

// Route::get('/users', function(Request $request){
//     // dd($request->all());
//     $requestData = $request->all();
//     $title = 'Danh sách người dùng';
//     $users = [
//         [
//             'name' => 'tuyenvcph14814',
//             'age' => 20,
//             'address' => 'HN',
//             'stutus' => 1,
//         ],
        
//         [
//             'name' => 'Khánh202',
//             'age' => 20,
//             'address' => 'HN',
//             'stutus' => 0,
//         ],

//     ];

//     return view('user-list',
//     [
//         'view_title' => $title,
//         'users_list' => $users,
//     ]
//     );
// });
// Route::get('/users/{id}/{name}', function ($userId, $username) {
//     // vị trí của tham số phải khớp với vị trí biến trong url
//     // không cần đặt tên giống nhau
//     dd($userId, $username);
// });

// Route::get('/register', function () {
//     // cần tạo 1 file register.blade.php và có form name, email, pw
//     return view('register');
// });
// Route::get('/register-success', function (Request $request) {
//     // Nhận dữ liệu và truyền sang cho view request-success.blade.php
//     $requestData = $request->all(); // ['name' => gtri, 'email' => gtr, 'password' => gtri]
//     return view('register-success', $requestData);
// })->name('regis-success');

// Route::post('/register-success', function (Request $request) {
//     // Nhận dữ liệu và truyền sang cho view request-success.blade.php
//     $requestData = $request->all(); // ['name' => gtri, 'email' => gtr, 'password' => gtri]
//     return view('register-success', $requestData);
// })->name('regis-success');

// //Products

// Route::get('/products', function (Request $request){
//     $requestData = $request->all() ; 
    
//     $product = [
//         [
//             'name' => 'xiaomi',
//             'sl' => 10,
//             'price' => '100000',
//             'stutus' => 1
//         ],
//         [
//             'name' => 'iphone',
//             'sl' => 20,
//             'price' => '100000',
//             'stutus' => 1
//         ]
//     ];

//     return view('product/list', [
      
//         'requestData' => $product
//     ]);
   
    
// })->name('pr-list');
// Route::get('/product-add', function () {
//     // cần tạo 1 file register.blade.php và có form name, email, pw
    
//     return view('product/add');
// });




Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('list');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');


});

