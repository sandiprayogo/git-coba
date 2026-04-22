<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$validUsername = 'admin';
$validPasswordHash = password_hash('password123', PASSWORD_DEFAULT);

if (isset($_POST['login'])) {
	if (validateCredentials($username, $validUsername, $password, $validPasswordHash)) {
		$_SESSION['user'] = $username;
		header('Location: dashboard.php');
		exit;
	} else {
		$error = 'Invalid username or password.';
	}
}

function validateCredentials($username, $validUsername, $password, $passwordHash)
{
	return $username === $validUsername && password_verify($password, $passwordHash);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
		<div class="card p-5" style="width: 100%; max-width: 400px;">
			<h3 class="text-center mb-4">Login</h3>

			<!-- error message -->

			<?php if (isset($error)) : ?>
				<div class="alert alert-danger">
					<?php echo htmlspecialchars($error); ?>
				</div>
			<?php endif; ?>

			<form action="" method="POST">
				<div class="mb-3">
					<label for="username" class="form-label">Username:</label>
					<input type="text" id="username" name="username" class="form-control" required>
				</div>

				<div class="mb-3">
					<label for="password" class="form-label">Password:</label>
					<input type="password" id="password" name="password" class="form-control" required>
				</div>

				<button type="submit" class="btn btn-primary w-100" name="login">Login</button>
			</form>
		</div>
	</div>
</body>

</html>