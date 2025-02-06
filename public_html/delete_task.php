<?php
session_start();
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];

    // Delete the task from the database
    // $sql = "DELETE FROM tasks WHERE id='$task_id'";
    # Instead of deleting the task directly, update is_finished to 1
    $sql = "UPDATE tasks SET is_finished=1 WHERE id='$task_id'";

    mysqli_query($conn, $sql);


}
?>