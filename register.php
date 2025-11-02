<?php
require 'config/config.php';

if ($_POST) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($name) || empty($email) || empty($password)) {
    echo "<script>alert('Please complete the form');</script>";
  } else {
    // Check if email already exists
    $statement = $pdo->prepare("SELECT * FROM user WHERE Email = :email");
    $statement->bindValue(':email', $email);
    $statement->execute();
    $existingUser = $statement->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
      echo "<script>alert('Email already registered');</script>";
    } else {
      // Insert new user
      $hashedPassword = $password;
      $insertStmt = $pdo->prepare("INSERT INTO user (Name, Email, Password) VALUES (:name, :email, :password)");
      $insertStmt->bindValue(':name', $name);
      $insertStmt->bindValue(':email', $email);
      $insertStmt->bindValue(':password', $hashedPassword);
      $insertStmt->execute();

      echo "<script>alert('Registration successful! You can now log in.'); window.location.href = '/login.php';</script>";
    }
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register — MyBlog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="d-flex align-items-center" style="min-height:100vh">
  <main class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10 col-md-6 col-lg-5">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <h1 class="h4 mb-3">Create account</h1>

            <form id="registerForm" novalidate aria-live="polite" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Full name</label>
                <input id="name" name="name" type="text" class="form-control" required>
                <div class="invalid-feedback">Please enter your name.</div>
              </div>

              <div class="mb-3">
                <label for="emailR" class="form-label">Email</label>
                <input id="emailR" name="email" type="email" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid email.</div>
              </div>

              <div class="mb-3">
                <label for="passwordR" class="form-label">Password</label>
                <input id="passwordR" name="password" type="password" class="form-control" minlength="8" required>
                <div class="form-text">At least 8 characters.</div>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
              <div class="mt-3 small text-center">
                Already have an account? <a href="/Blog_System/login.php">Login</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </main>

  <div id="toasts-root" class="position-fixed bottom-0 end-0 p-3" style="z-index:1100"></div>

  <script type="module">
    import { initApp } from './assets/js/app.js';
    initApp({ page: 'register' });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
