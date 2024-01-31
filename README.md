<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## CRUD Restful API

-   Khi xây dựng API với Laravel làm việc với file routes/api.php

    -   URL sẽ có tiền tố api trước
    -   Bỏ qua CSRF token (Submit form(POST) sẽ ko cần @csrf)
    -   Middleware mặc định là api(cấu hình trong file Kernel.php)

-   CRUD API

    -   GET: /users => Lấy tất cả tài nguyên
    -   GET: /users/id => Lấy tài nguyên theo Id
    -   POST: /users => Thêm mới tài nguyên
    -   PUT: /users/id => Cập nhật tất cả các trường của một tài nguyên
    -   PATCH: /users/id => Cập nhật một vài trường của tài nguyên
    -   DELETE: /users/id => Xóa 1 tài nguyên

-   Eloquent Resource
    -   Xử lý dữ liệu từ controller trước khi trả về cho người dùng
    -   VD
        -   Khi gọi API lấy dữ liệu(người dùng) sẽ trả về đầy đủ bao gồm cả password
        -   Nếu chúng ta muốn không trả về password khi gửi cho người dùng có
            thể xử lý chúng bằng cách dùng vòng for để loại
        -   Hoặc là sử dụng Eloquent Resource (Thư viện Laravel cung cấp)
