<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project Authorizations

###

#### Danh sách Module

-   Quản lý người dùng
-   Quản lý nhóm người dùng
-   Quản lý bài viết

#### Phân quyền

-   Tạo 1 nhóm người dùng (Phân quyền cho nhóm)
-   Thêm user cho nhóm (user sẽ có quyền trong nhóm đó)
-   Các quyền
    -   Module bài viết
        -   Xem danh sách bài viết
        -   Thêm bài viết
        -   Sửa bài viết(bài viết của ai thì sửa của người đó)
        -   Xóa bài viết(bài viết của ai thì xóa của người đó)
    -   Module nhóm người dùng
        -   Xem danh sách nhóm
        -   Thêm,sửa,xóa nhóm
        -   Phân quyền nhóm
    -   Module người dùng
        -   Xem người dùng
        -   Thêm người dùng
        -   Sửa,Xóa người dùng
-   Gate(Controller): Cho phép tạo,thêm,sửa,xóa hay không
-   Policy(Model): Sau khi Gate cho phép sửa nhưng chỉ được sửa,xóa bài viết chính người dùng đang
    đăng nhập tạo ra
