<?php
require_once __DIR__ . '/config/auth.php';

if (!empty($_SESSION['user_id'])) {
    $target = ($_SESSION['role'] ?? '') === 'admin' ? 'admin/dashboard.php' : 'student/dashboard.php';
    header('Location: ' . app_url($target));
    exit;
}

require __DIR__ . '/login.php';
