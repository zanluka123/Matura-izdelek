<?php
/* Zagon seje */
session_start();

/* Vkljucitev povezave na bazo */
include("connect.php");

/* Preverjanje, ce je uporabnik prijavljen */
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Pridobivanje podatkov o uporabniku
$user_id = $_SESSION['id'];
$email = $_SESSION['email'];

/* Fetch all archived tasks (completed tasks) for the logged-in user */
$tasks_query = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='$user_id' AND is_finished=1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>Arhiv opravljenih nalog</title>
</head>
<body>
    <div class="user">
        <h1>Pozdravljeni</h1>
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
            while ($row = mysqli_fetch_array($query)) {
                echo $row['firstName'] . ' ' . $row['lastName'];
            }
        }
        ?>
        <a href="homepage.php">Domov</a>
    </div>

    <div class="todo-container">
        <div class="todo-header">
            <h1>Arhiv opravljenih nalog</h1>
        </div>
        <ul class="todo-list" id="todo-list">
            <?php
            // Loop through tasks and display them
            while ($task = mysqli_fetch_assoc($tasks_query)) {
                echo '<li class="todo-item">';
                echo '<span>' . htmlspecialchars($task['description']) . '</span>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</body>
</html>
