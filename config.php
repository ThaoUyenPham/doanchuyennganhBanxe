<?php
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('SERVER_ROOT')) {
    define('SERVER_ROOT', __DIR__ . DS);
}
define('CONST_APPS_DIR', SERVER_ROOT . 'apps' . DS);
define('SITE_ROOT', '/');
define('SITE_ROOT_IMG', '/');
define('BLOCK_ROOT', SITE_ROOT . 'data/blocks/');
define('BLOCK_BACKEND_ROOT', BLOCK_ROOT . 'backend/');
define('BLOCK_FRONTEND_ROOT', BLOCK_ROOT . 'frontend/');
define('DANG_BAO_TRI', 0);
define('DEBUG_MODE', 1, true);
define('DATABASE_NAME_DECRYPT', 0);
define('ADODB_MESSAGE', 0);
define('SESSION_PREFIX', 'WebSession');

//Database
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '123456');
define('DATABASE_NAME', 'ql_banhang');
define('SERVICE_NAME', 'localhost');
define('DATABASE_TYPE', 'MYSQL'); // MSSQL or MYSQL

// //mail
// define('MAILHOST','smtp.gmail.com');//hướng dẫn PHP Mailer kết nối với máy chú thư SMTP do Gmail lưu trữ
//     //xác định tên người dùng của mình, đây là địa chỉ Mail mà Admin sử dụng
    define('USERNAME','thaouyenpham17@gmail.com');
//     //xác định mật khẩu ứng dụng 16 chữ số
    define('PASSWORD','Uyenpmt@!303');
//     // xác định địa chỉ gửi từ
    define('SEND_FROM','thaouyenpham17@gmail.com');
//     //xác định tên của admin
    define('SEND_FROM_NAME','thaouyenpham');
//     //xác định địa chỉ trả lời
//     define('REPLY_TO','thaouyenpham17@gmail.com');
//     // hằng số tên trả lời sử dụng tên của mình
//     define('REPLY_TO_NAME','thaouyenpham');  
    