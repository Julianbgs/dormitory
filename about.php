<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>О нас</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="index">

<ul class="background-bubbles">
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
    <h1>О нашей системе</h1>
    <div class="card">
        <p>Этот сайт предназначен для ведения учёта студентов, проживающих в общежитии.</p>
        <p>Вы можете регистрироваться, авторизовываться, управлять данными о студентах, а также пользоваться современным интерфейсом с поддержкой адаптивной вёрстки.</p>
        <p>Внутри реализованы: регистрация, авторизация, учёт студентов, работа с базой данных, AJAX, сессии и cookies.</p>
    </div>
</div>

</body>
</html>
