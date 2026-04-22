<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}
if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h1>Welcome to the Dashboard, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
    <form method="POST" action="">
      <button type="submit" class="btn btn-danger mt-3" name="logout">Logout</button>
    </form>
  </div>
</body>

</html>