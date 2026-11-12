<?php
declare(strict_types=1);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = '://tidbcloud.com';
$user = '2GgocvPUJFzaTaZ.root';
$pass = 'PASTE_YOUR_TIDB_PASSWORD_HERE';
$db   = 'student_attendance_db';
$port = 4000;

try {
    $conn = mysqli_init();
    $conn->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);
    $conn->ssl_set(null, null, '/etc/ssl/certs/ca-certificates.crt', null, null);
    $conn->real_connect($host, $user, $pass, $db, $port, null, MYSQLI_CLIENT_SSL);
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $exception) {
    error_log('Database connection error: ' . $exception->getMessage());
    http_response_code(500);
    exit('Unable to connect to the database: ' . $exception->getMessage());
}
