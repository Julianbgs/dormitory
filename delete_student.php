<?php
session_start(); // Добавляем старт сессии
include 'db.php';
global $conn;

// Проверка авторизации
if (!isset($_SESSION['username'])) {
    die('Ошибка авторизации');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Добавляем отладочный вывод
    error_log("Попытка удаления студента ID: $id");

    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    if (!$stmt) {
        error_log("Ошибка подготовки запроса: " . $conn->error);
        die('error');
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        error_log("Студент ID $id успешно удален");
        echo 'success';
    } else {
        error_log("Ошибка выполнения запроса: " . $stmt->error);
        echo 'error';
    }

    $stmt->close();
} else {
    error_log("Неверный запрос");
    echo 'error';
}
?>