<?php
/* Zagon seje */
session_start();

/* Vkljucitev povezave na bazo */
include("connect.php");

/* Preverjanje, ce je uporabnik prijavljen */
if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}

// Pridobivanje podatkov o uporabniku
$user_id = $_SESSION['id'];
$email = $_SESSION['email'];


/* Handle new task submission */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_description'])) {
  $task_description = mysqli_real_escape_string($conn, $_POST['task_description']);
  
  // Insert the task into the database
  $sql = "INSERT INTO tasks (user_id, description) VALUES ('$user_id', '$task_description')";
  mysqli_query($conn, $sql);
}

/* Fetch all tasks for the logged-in user */
$tasks_query = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='$user_id' AND is_finished=0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>Homepage</title>
</head>
<body>
  <div class="user">
    <h1>Pozdravljeni</h1>
      <?php 
      if(isset($_SESSION['email'])){
          $email = $_SESSION['email'];
          $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
          while($row = mysqli_fetch_array($query)){
              echo $row['firstName'] . ' ' . $row['lastName'];
          }
      }
      ?>
      <div class="links">
        <a href="archive.php">Arhiv</a>
        <a href="logout.php">Odjavite se</a>
      </div>
  </div>
  <div class="todo-container">
    <div class="todo-header">
        <h1>Moja To-do lista</h1>
    </div>
    <div class="todo-input-container">
        <form method="POST">
            <input type="text" id="todo-input" name="task_description" placeholder="Dodaj novo opravilo" required>
            <button type="submit" id="add-button">Dodaj opravilo</button>
        </form>
    </div>
    <ul class="todo-list" id="todo-list">
        <?php
        // Loop through tasks and display them
        while ($task = mysqli_fetch_assoc($tasks_query)) {
            echo '<li class="todo-item">';
            echo '<span>' . htmlspecialchars($task['description']) . '</span>';
            echo '<button class="delete-task" data-task-id="' . $task['id'] . '">Izbriši opravilo</button>';
            echo '</li>';
        }
        ?>
    </ul>
  </div>
  
  <script>
    // Delete task functionality
    const deleteButtons = document.querySelectorAll('.delete-task');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const taskId = e.target.getAttribute('data-task-id');

            // Use fetch or AJAX to delete the task from the database
            fetch('delete_task.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'task_id=' + taskId
            }).then(response => response.text())
              .then(() => {
                  // Remove the task from the list visually
                  e.target.closest('li').remove();
              });
        });
    });
</script>
      
</body>
</html>