<?php
session_start();
include 'db.php';
global $conn;

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $room_number = trim($_POST['room_number']);
    $move_in_date = $_POST['move_in_date'];

    // Валидация даты
    if (!DateTime::createFromFormat('Y-m-d', $move_in_date)) {
        $_SESSION['error'] = 'Неверный формат даты (используйте ГГГГ-ММ-ДД)';
        header("Location: students.php");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO students (full_name, room_number, move_in_date) VALUES (?, ?, ?)");

    if ($stmt === false) {
        $_SESSION['error'] = 'Ошибка подготовки запроса: ' . $conn->error;
        header("Location: students.php");
        exit();
    }

    $stmt->bind_param("sss", $full_name, $room_number, $move_in_date);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Студент успешно добавлен!';
    } else {
        $_SESSION['error'] = 'Ошибка: ' . $stmt->error;
    }

    $stmt->close();
    header("Location: students.php");
    exit();
}
?>