<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Общежитие — Главная</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="index">

<!-- Плавающий фон -->
<ul class="background-bubbles">
    <li></li><li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li><li></li>
</ul>

<div class="container">
    <h1>Система учёта студентов общежития</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <p class="welcome">Привет, <strong><?php echo $_SESSION['username']; ?></strong>!</p>
        <div class="button-group">
            <a class="btn primary" href="students.php">Учёт студентов</a>
            <a class="btn danger" href="logout.php">Выйти</a>
        </div>
    <?php else: ?>
        <div class="button-group">
            <a class="btn success" href="register.php">Регистрация</a>
            <a class="btn primary" href="login.php">Вход</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
