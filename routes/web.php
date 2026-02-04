<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Bài 2: Basic Routing & Views
// 1. Route /home
Route::get('/home', function () {
    return "Chào mừng đến với Laravel";
});

// 2. Route /about
Route::get('/about', function () {
    return "Họ tên: Nhữ Trung Hải <br> Lớp: D18CNPM2 <br> MSV: 23810310247";
});

// 3. View Contact
Route::get('/contact', function () {
    return view('contact');
});

// Bài 3: Dynamic Route & Calculation
// 1. Route tính tổng
Route::get('/tong/{a}/{b}', function ($a, $b) {
    return "Tổng của $a và $b là: " . ($a + $b);
})->whereNumber(['a', 'b']); // Optional: ensure a and b are numbers

// 2. Route thông tin sinh viên
Route::get('/sinh-vien/{name}/{age?}', function ($name, $age = 20) {
    return "Tên: $name <br> Tuổi: $age";
});

// Bài 4: Route Group & Validation
// 1. Group Admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Chào mừng Admin";
    });

    Route::get('/users', function () {
        return "Danh sách người dùng";
    });
});

// 2. Check Date with Validation
Route::get('/check-date/{day}/{month}/{year}', function ($day, $month, $year) {
    return "Ngày $day tháng $month năm $year là ngày hợp lệ theo định dạng.";
})->where([
    'day' => '0?[1-9]|[12][0-9]|3[01]',   // 1-31 (allows 01-09 or 1-9)
    'month' => '0?[1-9]|1[0-2]',          // 1-12
    'year' => '[0-9]{4}'                  // 4 digits
]);
