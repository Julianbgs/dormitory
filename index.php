<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Общежитие — Главная</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="index">

<ul class="background-bubbles">
    <!-- пузыри как прежде -->
    <li></li><li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li><li></li>
</ul>

<nav class="navigation">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">Общежитие</a>
        <input type="checkbox" id="nav-toggle" class="nav-toggle">
        <label for="nav-toggle" class="nav-burger">&#9776;</label>
        <div class="nav-links">
            <a href="index.php">Главная</a>
            <a href="about.php">О нас</a>
            <a href="profile.php">Профиль</a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="logout.php" class="danger">Выход</a>
            <?php else: ?>
                <a href="login.php">Вход</a>
                <a href="register.php">Регистрация</a>
            <?php endif; ?>
        </div>
    </div>
</nav>


<div class="container">
    <h1>Система учёта студентов общежития</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <p class="welcome">Привет, <strong><?php echo $_SESSION['username']; ?></strong>!</p>
        <a class="btn primary" href="students.php">Учёт студентов</a>
    <?php else: ?>
        <p class="welcome">Добро пожаловать! Войдите или зарегистрируйтесь:</p>
        <div class="button-group">
            <a class="btn success" href="register.php">Регистрация</a>
            <a class="btn primary" href="login.php">Вход</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
