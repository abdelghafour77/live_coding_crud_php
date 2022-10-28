<?php
$conn = mysqli_connect("localhost", "root", "", "live_coding");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
