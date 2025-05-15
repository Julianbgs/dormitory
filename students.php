<?php
session_start();
include 'db.php';
global $conn;

// проверка авторизации
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// получаем всех студентов
$students = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Общежитие — Учёт студентов</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="students-page">

<!-- Плавающий фон -->
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
    <div class="header-section">
        <h2>Учёт студентов в общежитии</h2>
        <a class="btn danger" href="logout.php" style="float: right;">Выйти</a>
    </div>

    <form method="POST" action="add_student.php" class="student-form">
        <input type="text" name="full_name" placeholder="ФИО студента" required>
        <input type="text" name="room_number" placeholder="Номер комнаты" required>
        <input type="date" name="move_in_date" placeholder="Дата заселения" required>
        <button type="submit" class="btn success">Добавить</button>
    </form>

    <div class="students-table-container">
        <h3>Список студентов</h3>
        <table class="students-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Комната</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($students)): ?>
                <tr id="student-<?php echo $row['id']; ?>">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['room_number']; ?></td>
                    <td><?php echo $row['move_in_date']; ?></td>
                    <td>
                        <button onclick="deleteStudent(<?php echo $row['id']; ?>)" class="btn danger small">Удалить</button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>

<script>
    function deleteStudent(id) {
        if (!confirm('Удалить студента?')) return;
        console.log('Удаляем студента с ID:', id); // Добавьте перед fetch
        fetch('delete_student.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + id
        })
            .then(response => {
                if (!response.ok) throw new Error('Network error');
                return response.text();
            })
            .then(data => {
                if (data === 'success') {
                    document.getElementById('student-' + id).remove();
                } else {
                    throw new Error(data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ошибка удаления: ' + error.message);
            });
    }
</script>

</body>
</html>