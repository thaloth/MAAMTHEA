<?php
declare(strict_types=1);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_init();
    $conn->ssl_set(null, null, null, null, null);
    $conn->real_connect(
        '://tidbcloud.com',
        '2GgocvPUJFzaTaZ.root',
        'PASTE_YOUR_TIDB_PASSWORD_HERE',
        'student_attendance_db',
        4000,
        null,
        MYSQLI_CLIENT_SSL
    );
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $exception) {
    error_log('Database connection error: ' . $exception->getMessage());
    http_response_code(500);
    exit('Unable to connect to the database: ' . $exception->getMessage());
}
