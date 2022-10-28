<?php
include 'crud.php';
$students = selectFromDb();
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
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="first_name">
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="last_name">
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="age">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="save">Add</button>

    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Age</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($students as $row) {
          echo "<tr>
          <th scope='row'>" . $row['id'] . "</th>
          <td>" . $row['first_name'] . "</td>
          <td>" . $row['last_name'] . "</td>
          <td>" . $row['age'] . "</td>
          <td>
          <a href='edit.php?get_id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
          <a href='crud.php?delete_id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
          </td>
        </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>