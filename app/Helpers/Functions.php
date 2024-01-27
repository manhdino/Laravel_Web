<?php

// Hàm kiểm tra xem tài khoản đã active hay chưa

use App\Models\Doctors;

function isDoctorActive($email)
{
    $count =  Doctors::where('email', $email)->where('isActive', 1)->count();
    return ($count > 0) ? true : false;
}
