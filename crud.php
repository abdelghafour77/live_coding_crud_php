<?php
require_once 'database.php';

// check if there is save in post variable then call function add to database().
// 'save' represent name of button that submit the form
if (isset($_POST['save'])) addToDb();

// check if there is update in post variable then call function update().
// 'update' represent name of button that submit the form.
if (isset($_POST['update'])) update();

// check if there is delete_id (id) in get variable then call function delete from database(id of student).
if (isset($_GET['delete_id'])) deleteFromDb($_GET['delete_id']);


function addToDb()
{
  global $conn;
  // extract is a function that creates variables with the same name of each row in array associative 
  // example 
  // $student = array("first_name"=>"mohamed", "last_name"=>"chkir", "age"=>"15");
  // instead of doing this 
  // $first_name=$student['first_name'];
  // $last_name=$student['last_name'];
  // $age=$student['age'];
  // we can do all this in one line using extract, like this.
  // extract($student);


  extract($_POST);

  // query of insert data to database 
  $sql = "INSERT INTO students (first_name,last_name,age) values ('$first_name','$last_name','$age')";

  // performs a query on the database
  mysqli_query($conn, $sql);

  // back to index page
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
