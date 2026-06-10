<?php

require_once './vendor/autoload.php';
require_once './app/helpers/auth.php';

use App\config\Database;

// Handle logout action
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    logout();
}

if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch($page) {
        // Setup Route
        case 'setup':
            include 'pages/setup.php';
            break;
        
        // Admin Routes
        case 'admin/dashboard':
            include 'pages/admin/dashboard.php';
            break;
        case 'admin/attendance':
            include 'pages/admin/attendance.php';
            break;
        case 'admin/reports':
            include 'pages/admin/reports.php';
            break;
        case 'admin/students':
            include 'pages/admin/students.php';
            break;
        case 'admin/teachers':
            include 'pages/admin/teachers.php';
            break;
        case 'admin/sections':
            include 'pages/admin/sections.php';
            break;
        case 'admin/schedule':
            include 'pages/admin/schedule.php';
            break;
        case 'admin/courses':
            include 'pages/admin/courses.php';
            break;
        case 'admin/add_student':
            include 'pages/admin/add_student.php';
            break;
        case 'admin/add_teacher':
            include 'pages/admin/add_teacher.php';
            break;
        case 'admin/add_section':
            include 'pages/admin/add_section.php';
            break;
        case 'admin/edit_student':
            include 'pages/admin/edit_student.php';
            break;
        case 'admin/edit_teacher':
            include 'pages/admin/edit_teacher.php';
            break;
        case 'admin/edit_section':
            include 'pages/admin/edit_section.php';
            break;
        case 'admin/view_student':
            include 'pages/admin/view_student.php';
            break;
        case 'admin/view_teacher':
            include 'pages/admin/view_teacher.php';
            break;
        case 'admin/view_section':
            include 'pages/admin/view_section.php';
            break;
        case 'admin/change_password':
            include 'pages/admin/change_password.php';
            break;
            
        // Teacher Routes
        case 'teacher/dashboard':
            include 'pages/teacher/dashboard.php';
            break;
        case 'teacher/classes':
            include 'pages/teacher/classes.php';
            break;
        case 'teacher/sections':
            include 'pages/teacher/sections.php';
            break;
        case 'teacher/attendance':
            include 'pages/teacher/attendance.php';
            break;
        case 'teacher/schedule':
            include 'pages/teacher/schedule.php';
            break;
        case 'teacher/reports':
            include 'pages/teacher/reports.php';
            break;
        
        // Login Page
        case 'login':
            include 'pages/login.php';
            break;
            
        // Default - 404 Page
        default:
            header("HTTP/1.0 404 Not Found");
            include 'pages/404.php';
            break;
    }
} else {
    // Check if admin exists, if not redirect to setup
    $database = new Database();
    $db = $database->connect();
    $query = "SELECT COUNT(*) as count FROM admins WHERE role = 'admin'";
    $stmt = $db->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result['count'] == 0) {
        include 'pages/setup.php';
    } else {
        include 'pages/login.php';
    }
}