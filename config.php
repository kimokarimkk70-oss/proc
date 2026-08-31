<?php

$conn = mysqli_connect('localhost', 'root', '', 'users');

if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
