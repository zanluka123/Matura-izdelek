<?php
session_start();
include("connect.php");

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
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
      <a href="logout.php">Odjavite se</a>
    
      
    </div>
    </div>
      <div class="todo-container">
      <div class="todo-header">
        <h1>Moja To-do lista</h1>
      </div>
      <div class="todo-input-container">
        <input type="text" id="todo-input" placeholder="Dodaj novo opravilo">
        <button id="add-button">Dodaj opravilo</button>
      </div>
      <ul class="todo-list" id="todo-list"></ul>
    </div>
  
    <script>
      const addButton = document.getElementById('add-button');
      const todoInput = document.getElementById('todo-input');
      const todoList = document.getElementById('todo-list');
  
      addButton.addEventListener('click', () => {
        const taskText = todoInput.value.trim();
        if (taskText !== '') {
          const listItem = document.createElement('li');
          listItem.className = 'todo-item';
  
          const taskSpan = document.createElement('span');
          taskSpan.textContent = taskText;
  
          const deleteButton = document.createElement('button');
          deleteButton.textContent = 'Izbriši opravilo';
          deleteButton.addEventListener('click', () => {
            todoList.removeChild(listItem);
          });
  
          listItem.appendChild(taskSpan);
          listItem.appendChild(deleteButton);
          todoList.appendChild(listItem);
  
          todoInput.value = '';
          todoInput.focus();
        }
      });
  
      todoInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
          addButton.click();
        }
      });
    </script> 
      
</body>
</html>