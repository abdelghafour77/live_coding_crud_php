<?php
require_once 'database.php';

if (isset($_POST['save'])) addToDb();
if (isset($_POST['update'])) update();
if (isset($_GET['delete_id'])) deleteFromDb($_GET['delete_id']);


function addToDb()
{
  global $conn;
  extract($_POST);
  $sql = "INSERT INTO students (first_name,last_name,age) values ('$first_name','$last_name','$age')";
  mysqli_query($conn, $sql);

  header("location: index.php");
}

function update()
{
  global $conn;
  extract($_POST);
  $sql = "UPDATE students SET first_name ='$first_name',last_name='$last_name',age='$age' WHERE id=$id";
  mysqli_query($conn, $sql);

  header("location: index.php");
}

function selectFromDb()
{
  global $conn;
  $sql = "SELECT * from students";
  $res = mysqli_query($conn, $sql);
  return $res;
}

function getStudentFromDb($id)
{
  global $conn;
  $sql = "SELECT * from students where id= $id";
  $res = mysqli_query($conn, $sql);
  return $res;
}

function deleteFromDb($id)
{
  global $conn;
  $sql = "DELETE FROM students WHERE id=$id";
  mysqli_query($conn, $sql);
  header("location: index.php");
}
