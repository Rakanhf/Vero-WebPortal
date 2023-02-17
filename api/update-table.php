<?php
session_start();

if (!isset($_SESSION['access_token'])) {
  // Redirect to login page if access token is not set
  header("Location: ../auth/login.php");
  exit();
}


// Check if access token has expired
$token_exp_time = $_SESSION['access_token_exp_time'];
$current_time = time();
if ($token_exp_time <= $current_time) {
  // Access token has expired, redirect to login page
  header("Location: ../auth/login.php");
  exit();
}

// Make GET request to API endpoint
$url = "https://api.baubuddy.de/dev/index.php/v1/tasks/select";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Authorization: Bearer ".$_SESSION['access_token']
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Parse response and update table
$tasks = json_decode($response, true);
foreach ($tasks as $task) {
  echo "<tr>";
  echo "<td>".$task['task']."</td>";
  echo "<td>".$task['title']."</td>";
  echo "<td>".$task['description']."</td>";
  echo "<td style='background-color:".$task['colorCode']."'>".$task['colorCode']."</td>";
  echo "</tr>";
}
?>
