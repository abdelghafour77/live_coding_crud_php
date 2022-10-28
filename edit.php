<?php
include 'crud.php';
if (isset($_GET['get_id']) && !empty($_GET['get_id'])) {
  $student = getStudentFromDb($_GET['get_id']);
  $row = mysqli_fetch_array($student);
} else {
  echo "there is no ID";
  die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Live Coding</title>
</head>

<body>
  <div class="container">
    <form action="crud.php" method="post" class="m-4 p-4 ">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>">
        </div>
      </div>
      <button type="submit" class="btn btn-success" name="update">Update</button>

    </form>

  </div>
</body>

</html>