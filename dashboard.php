<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="dashboard">

<div class="container">
    <div class="nav-container">
        <h2>Добро пожаловать, <?php echo $_SESSION['username']; ?>!</h2>
        <div class="nav-links">
            <a href="students.php" class="nav-button">Учёт студентов</a>
            <a href="logout.php" class="logout-button">Выйти</a>
        </div>
    </div>

    <!-- Основное содержимое страницы -->
    <div class="dashboard-content">
        <h3>Главное меню</h3>
        <p>Выберите раздел для работы с системой.</p>
    </div>
</div>

</body>
</html>
